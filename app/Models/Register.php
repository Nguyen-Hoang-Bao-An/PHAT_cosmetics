<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Register extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'registers';
    protected $fillable = ['name', 'email', 'address', 'password', 'confirmpassword', 'gender', 'national_id', 'birthday', 'phone'];

    public function login() {
        return $this->belongsTo(Register::class,'email','password');
    }
}
