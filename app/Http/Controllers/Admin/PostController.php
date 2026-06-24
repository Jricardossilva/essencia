<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /** campo => [largura máx, altura máx] da imagem tratada */
    private array $specs = [
        'capa'              => [1200, 675],
        'imagem_principal'  => [1600, 900],
        'imagem_secundaria' => [1200, 900],
    ];

    public function index() { return view('admin.posts.index', ['posts' => Post::latest()->get()]); }
    public function create() { return view('admin.posts.form', ['post' => new Post()]); }

    public function store(Request $req)
    {
        $post = Post::create($this->validated($req));
        $this->handleImages($req, $post);
        return redirect()->route('admin.posts.index')->with('ok', 'Artigo publicado.');
    }

    public function edit(Post $post) { return view('admin.posts.form', ['post' => $post]); }

    public function update(Request $req, Post $post)
    {
        $post->update($this->validated($req));
        $this->handleImages($req, $post);
        return redirect()->route('admin.posts.index')->with('ok', 'Artigo atualizado.');
    }

    public function destroy(Post $post)
    {
        foreach (array_keys($this->specs) as $c) {
            if ($post->$c) Storage::disk('public')->delete('posts/'.$post->$c);
        }
        $post->delete();
        return back()->with('ok', 'Artigo removido.');
    }

    /** Recebe o recorte (base64 do Croppie), trata com GD e grava só o NOME no banco. */
    private function handleImages(Request $req, Post $post): void
    {
        $dirty = [];
        foreach ($this->specs as $campo => [$w, $h]) {
            if ($req->boolean('remover_'.$campo) && $post->$campo) {
                Storage::disk('public')->delete('posts/'.$post->$campo);
                $dirty[$campo] = null;
            }
            $data = (string) $req->input($campo.'_data');
            if (str_starts_with($data, 'data:image')) {
                if ($post->$campo) Storage::disk('public')->delete('posts/'.$post->$campo);
                $dirty[$campo] = $this->salvarImagem($data, $w, $h);
            }
        }
        if ($dirty) $post->update($dirty);
    }

    /** Decodifica o base64, redimensiona/comprime (GD) e salva em storage/app/public/posts. Retorna o nome do arquivo. */
    private function salvarImagem(string $base64, int $maxW, int $maxH): string
    {
        $raw  = base64_decode(substr($base64, strpos($base64, ',') + 1));
        $name = 'img_'.uniqid().'.jpg';
        Storage::disk('public')->makeDirectory('posts');
        $dest = Storage::disk('public')->path('posts/'.$name);

        if (function_exists('imagecreatefromstring') && ($src = @imagecreatefromstring($raw))) {
            $w = imagesx($src); $h = imagesy($src);
            $scale = min(1, $maxW / $w, $maxH / $h);
            if ($scale < 1) {
                $nw = (int) round($w * $scale); $nh = (int) round($h * $scale);
                $dst = imagecreatetruecolor($nw, $nh);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);
                imagedestroy($src); $src = $dst;
            }
            imagejpeg($src, $dest, 82);
            imagedestroy($src);
        } else {
            // fallback sem GD: o Croppie já entregou no tamanho/qualidade alvo
            Storage::disk('public')->put('posts/'.$name, $raw);
        }
        return $name;
    }

    private function validated(Request $req): array
    {
        $req->validate([
            'titulo'    => ['required','string','max:160'],
            'categoria' => ['nullable','string','max:60'],
            'resumo'    => ['nullable','string','max:255'],
            'conteudo'  => ['nullable','string'],
        ]);
        return [
            'titulo'    => $req->titulo,
            'categoria' => $req->categoria,
            'resumo'    => $req->resumo,
            'conteudo'  => $req->conteudo,
            'publicado' => $req->boolean('publicado'),
        ];
    }
}