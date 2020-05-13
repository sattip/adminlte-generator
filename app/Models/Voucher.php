<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Voucher
 * @package App\Models
 * @version May 12, 2020, 11:01 pm UTC
 *
 * @property string $voucher
 * @property string $courier_name
 */
class Voucher extends Model
{

    public $table = 'vouchers';
    



    public $fillable = [
        'voucher',
        'courier_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'voucher' => 'string',
        'courier_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
