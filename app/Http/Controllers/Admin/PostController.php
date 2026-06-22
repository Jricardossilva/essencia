<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private array $campos = ['capa','imagem_principal','imagem_secundaria'];

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
        foreach ($this->campos as $c) if ($post->$c) Storage::disk('public')->delete($post->$c);
        $post->delete();
        return back()->with('ok', 'Artigo removido.');
    }

    private function handleImages(Request $req, Post $post): void
    {
        $dirty = [];
        foreach ($this->campos as $campo) {
            // remover imagem marcada
            if ($req->boolean('remover_'.$campo) && $post->$campo) {
                Storage::disk('public')->delete($post->$campo);
                $dirty[$campo] = null;
            }
            // novo upload
            if ($req->hasFile($campo)) {
                if ($post->$campo) Storage::disk('public')->delete($post->$campo);
                $dirty[$campo] = $req->file($campo)->store('posts', 'public');
            }
        }
        if ($dirty) $post->update($dirty);
    }

    private function validated(Request $req): array
    {
        $req->validate([
            'titulo'            => ['required','string','max:160'],
            'categoria'         => ['nullable','string','max:60'],
            'resumo'            => ['nullable','string','max:255'],
            'conteudo'          => ['nullable','string'],
            'capa'              => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'imagem_principal'  => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'imagem_secundaria' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
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
