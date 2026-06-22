<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index() { return view('admin.testimonials.index', ['itens' => Testimonial::orderBy('ordem')->get()]); }
    public function create() { return view('admin.testimonials.form', ['item' => new Testimonial()]); }

    public function store(Request $req)
    {
        Testimonial::create($this->validated($req));
        return redirect()->route('admin.testimonials.index')->with('ok', 'Depoimento adicionado.');
    }

    public function edit(Testimonial $testimonial) { return view('admin.testimonials.form', ['item' => $testimonial]); }

    public function update(Request $req, Testimonial $testimonial)
    {
        $testimonial->update($this->validated($req));
        return redirect()->route('admin.testimonials.index')->with('ok', 'Depoimento atualizado.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('ok', 'Depoimento removido.');
    }

    private function validated(Request $req): array
    {
        return $req->validate([
            'autor'    => ['required','string','max:120'],
            'estrelas' => ['required','integer','min:1','max:5'],
            'texto'    => ['required','string','max:500'],
            'ordem'    => ['nullable','integer'],
            'publicado'=> ['nullable'],
        ]) + ['publicado' => $req->boolean('publicado'), 'ordem' => (int)$req->input('ordem', 0)];
    }
}
