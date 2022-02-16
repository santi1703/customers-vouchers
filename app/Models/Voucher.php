<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Voucher extends Model
{
    use HasFactory;

    protected $hidden = ['customer_id', 'created_at', 'updated_at'];

    protected $dates = ['valid_through'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'valid_through' => 'datetime:Y-m-d h:i:s',
    ];

    public function getIsValidAttribute()
    {
        return Carbon::now()->lessThan($this->valid_through);
    }
}
