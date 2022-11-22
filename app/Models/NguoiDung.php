<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    public $table = 'NguoiDung';
    public $primaryKey = 'MaKH';
    public $timestamps = false;
    public function getAuthPassword() {
        return $this->MatKhau;
    }
    protected $fillable = [
        'Email',
        'MatKhau',
    ];

    protected $hidden = [
        'MatKhau',
    ];
}
