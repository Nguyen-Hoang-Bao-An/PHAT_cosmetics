<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    use HasFactory;

    protected $table = 'logins';
    protected $fillable = ['email', 'password'];

    public function register() {
        return $this->belongsTo(Login::class,'email','password');
    }
}
