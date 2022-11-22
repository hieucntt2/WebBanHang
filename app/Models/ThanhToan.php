<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    use HasFactory;

    public $table = 'ttdh';
    public $primaryKey = 'MaTTDH';

    public $timestamps = false;
}
