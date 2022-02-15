<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
