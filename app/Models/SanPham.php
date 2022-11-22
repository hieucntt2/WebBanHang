<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    public $table = 'sanpham';
    public $primaryKey = 'MaSP';
    public $timestamps = false;
}