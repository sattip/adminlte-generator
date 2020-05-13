<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class SyncOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public static function getDataFromKey($data, $key) {
        $collection = collect($data);
        $filtered = $collection->where('key', $key);
        $value = $filtered->first()["value"];
        if ($key == '_billing_timologio') {
            if ($value == "Y") {
                return 1;
            } else {
                return 0;
            }
        } else {
            return $value;
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = Carbon::today()->subMonth()->format(\DateTime::ISO8601);
        $today = explode("+", $today)[0];
        $this->info($today);

        $params = [
            "per_page" => 10,
            "page" => 1,
            'after' => $today,
            "status" => "send-to-acs"
        ];


        $page = 1;
        $orders = \Woocommerce::get('orders', $params);
        //$headers = \Woocommerce::getResponse();
        $this->info(\Woocommerce::hasNextPage());
       
        while (\Woocommerce::hasNextPage()) {
            $orders = \Woocommerce::get('orders', $params);
            $page++;
            
            $json_order = json_encode($orders);
            $this->info($json_order);
            foreach ($orders as $order) {
                //find order
                $found = Order::where('order_id', $order["id"])->exists();
                if ($found) {
                    continue;
                }

                $new_order = new Order();
                $new_order->order_id = $order["id"];
                $new_order->firstname = $order["billing"]["first_name"];
                $new_order->lastname = $order["billing"]["last_name"];
                $new_order->streetaddress = $order["billing"]["address_1"];
                $new_order->streetaddress = $order["billing"]["address_1"];
                $new_order->zipcode = $order["billing"]["postcode"];
                $new_order->city = $order["billing"]["city"];
                $new_order->phonenumber = $order["billing"]["phone"];
                $new_order->datecreated = $order["date_created"];
                $acs_voucher = self::getDataFromKey($order["meta_data"], '_appsbyb_acs_courier_gr_no_pod');

                $elta_voucher = self::getDataFromKey($order["meta_data"], 'vg_code');

                if ($acs_voucher) {
                    $new_order->couriername = "ACS Courier";
                    $new_order->voucher = $acs_voucher;
                }
                if ($elta_voucher) {
                    $new_order->couriername = "ELTA Courier";
                    $new_order->voucher = $elta_voucher;
                }

                if (!$acs_voucher && !$elta_voucher) {
                    continue;
                }
               
                $new_order->status = $order["status"];
                $new_order->orderprice = $order["total"];
                $new_order->synced = 0;
                $new_order->save();
                $json_order = json_encode($order);
                $this->info($json_order);
                //die();
               
            }
            $this->info("Completed:". $page * 10);
            $params["page"] = $page;
        }
    }
}
