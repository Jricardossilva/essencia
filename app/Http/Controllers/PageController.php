<?php
namespace App\Http\Controllers;
use App\Models\{Post, Testimonial};
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'testimonials' => Testimonial::where('publicado', true)->orderBy('ordem')->get(),
            'posts'        => Post::where('publicado', true)->latest()->take(3)->get(),
        ]);
    }

    public function quemSomos() { return view('pages.quem-somos'); }
    public function servicos()  { return view('pages.servicos'); }
    public function mulher()    { return view('pages.mulher'); }
    public function sexualidade(){ return view('pages.sexualidade'); }

    public function topico(Request $request)
    {
        $slug = trim($request->path(), '/');
        abort_unless($t = config("site.topicos.$slug"), 404);
        return view('pages.topico', ['slug' => $slug, 't' => $t]);
    }

    public function blog()
    {
        return view('pages.blog', ['posts' => Post::where('publicado', true)->latest()->paginate(9)]);
    }

    public function post(Post $post)
    {
        abort_unless($post->publicado, 404);
        return view('pages.post', ['post' => $post]);
    }

    public function contato() { return view('pages.contato'); }
}
