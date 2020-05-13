<?php

namespace App\Repositories;

use App\Models\Voucher;
use App\Repositories\BaseRepository;

/**
 * Class VoucherRepository
 * @package App\Repositories
 * @version May 12, 2020, 11:01 pm UTC
*/

class VoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'voucher',
        'courier_name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Voucher::class;
    }
}
