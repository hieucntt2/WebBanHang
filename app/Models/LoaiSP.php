<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    use HasFactory;
    public $table = 'loaisp';
    public $primaryKey = 'maloai';

    public $timestamps = false;
}
