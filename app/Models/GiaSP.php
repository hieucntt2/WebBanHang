<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaSP extends Model
{
    use HasFactory;
    public $table = 'giasp';
    public $primaryKey = 'MaGia';
    public $timestamps = false;
}
