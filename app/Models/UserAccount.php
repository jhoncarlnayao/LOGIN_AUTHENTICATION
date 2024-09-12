<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserAccount extends Model
{
    protected $table = 'user_account';

    // Define fillable properties
    protected $fillable = ['username', 'password', 'role'];
}
