<?php

namespace Modul\UserModul\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
protected $table ='yonetici';
    protected $fillable = [
        'name', 'email', 'sifre'
    ];


}
