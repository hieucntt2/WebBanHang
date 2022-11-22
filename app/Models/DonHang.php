<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    public $table = 'donhang';
    public $primaryKey = 'MaDH';

    protected $fillable = ['MaDH'];

    public $timestamps = false;

}
