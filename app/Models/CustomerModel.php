<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $guarded = [];
    use HasFactory;

    public function faktur () {
        return $this->hasMany(FakturModel::class);
    }
}
