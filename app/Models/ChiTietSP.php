<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSP extends Model
{
    use HasFactory;
    public $table = 'chitietsp';
    public $primaryKey = 'MaCTSp';

    public $timestamps = false;
}
