<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model {
    protected $fillable = [
        'titulo',
        'slug',
        'categoria',
        'resumo',
        'conteudo',
        'capa',
        'imagem_principal',
        'imagem_secundaria',
        'publicado'
    ];

    protected $casts = [
        'publicado' => 'boolean'
    ];
    
    protected static function booted(): void {
        static::saving(function (Post $p) {
            if (blank($p->slug)) $p->slug = Str::slug($p->titulo);
        });
    }
    /** URL pública a partir do NOME do arquivo salvo no banco (ou null) */
    public function img(string $campo): ?string {
        return $this->$campo ? asset('storage/posts/'.$this->$campo) : null;
    }
}