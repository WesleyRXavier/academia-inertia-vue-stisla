<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio_Serie extends Model
{
    protected $table = 'exercicios_series';
    use HasFactory;
    protected $guarded = ['id'];
}
