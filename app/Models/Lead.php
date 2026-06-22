<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Lead extends Model {
    protected $fillable = ['calculadora','nome','email','telefone','pontuacao','classificacao','payload'];
    protected $casts = ['payload' => 'array'];
}
