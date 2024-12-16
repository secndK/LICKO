<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = ['email', 'token', 'created_at'];
    public $timestamps = false; // On utilise "created_at" manuellement
}
