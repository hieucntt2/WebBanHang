<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhSP extends Model
{
    use HasFactory;
    public $table = 'anhsp';
    public $primaryKey = 'MaAnh';

    public $timestamps = false;
}
