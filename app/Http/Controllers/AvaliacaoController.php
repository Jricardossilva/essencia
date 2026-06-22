<?php
namespace App\Http\Controllers;
use App\Models\Lead;
use App\Services\AvaliacaoService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AvaliacaoController extends Controller
{
    public function store(Request $req, AvaliacaoService $svc)
    {
        $data = $req->validate([
            'calculadora' => ['required', Rule::in(['queda','ciclo'])],
            'nome'        => ['required','string','max:120'],
            'email'       => ['required','email','max:160'],
            'telefone'    => ['nullable','string','max:40'],
            'respostas'   => ['required','array','min:1'],
            'respostas.*' => ['integer','min:0','max:4'],
        ]);

        // TRAVA: um cálculo por e-mail por calculadora
        if (Lead::where('calculadora',$data['calculadora'])->where('email',$data['email'])->exists()) {
            return response()->json(['erro' => 'Este e-mail já realizou esta avaliação.'], 409);
        }

        $res = $svc->{$data['calculadora']}($data['respostas']);

        Lead::create([
            'calculadora'   => $data['calculadora'],
            'nome'          => $data['nome'],
            'email'         => $data['email'],
            'telefone'      => $data['telefone'] ?? null,
            'pontuacao'     => $res['pontuacao'] ?? null,
            'classificacao' => $res['classificacao'] ?? null,
            'payload'       => $res,
        ]);

        return response()->json($res, 201);
    }
}
