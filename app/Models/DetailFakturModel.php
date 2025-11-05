<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DetailFakturModel extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'detail';
    protected $guarded = [];
    

    public function barang() {
        return $this->belongsTo(barang::class);
    }   

    public function faktur() {
        return $this->belongsTo(FakturModel::class, 'faktur_id');
    }

}
