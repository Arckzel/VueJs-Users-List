<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'nome',
        'estado',
        'profissao',
        'idade',
        'ano',
        'salario'
    ];

    protected $hidden = [ //colunas que não serão enviadas pela api
        'salario',
        'created_at',
        'updated_at'
    ];

}
