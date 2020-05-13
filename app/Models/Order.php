<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Order
 * @package App\Models
 * @version May 10, 2020, 8:37 pm UTC
 *
 * @property integer $order_id
 * @property string $voucher
 * @property string $couriername
 * @property string $firstname
 * @property string $lastname
 * @property string $streetaddress
 * @property integer $zipcode
 * @property string $city
 * @property integer $phonenumber
 * @property string $datecreated
 * @property string $orderprice
 * @property string $status
 * @property boolean $synced
 */
class Order extends Model
{

    public $table = 'orders';
    public $timestamps = false;
    



    public $fillable = [
        'order_id',
        'voucher',
        'couriername',
        'firstname',
        'lastname',
        'streetaddress',
        'zipcode',
        'city',
        'phonenumber',
        'datecreated',
        'orderprice',
        'status',
        'synced'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'voucher' => 'string',
        'couriername' => 'string',
        'firstname' => 'string',
        'lastname' => 'string',
        'streetaddress' => 'string',
        'zipcode' => 'integer',
        'city' => 'string',
        'phonenumber' => 'integer',
        'datecreated' => 'date',
        'orderprice' => 'string',
        'status' => 'string',
        'synced' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    protected $appends = [
        'is_paid'
    ];

    public function getIsPaidAttribute()
    {
        if ($this->vouchers()->first()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function vouchers() {
        return $this->belongsTo(\App\Models\Voucher::class, 'voucher', 'voucher');
    }
    
}
