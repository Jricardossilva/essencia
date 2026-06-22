<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model {
    protected $fillable = ['autor','estrelas','texto','publicado','ordem'];
    protected $casts = ['publicado' => 'boolean'];
}
