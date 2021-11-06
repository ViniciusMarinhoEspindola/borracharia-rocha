<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;

// Models
use App\Models\DiasDaSemana;
use App\Models\Anuncio;
use App\Models\Pneus;
use App\Models\Contato;

class HomeController extends Controller
{
    public function index()
    {
        $dias_semana = DiasDaSemana::with('horarios_funcionamento')
                                    ->where('ic_funcionamento', 1)
                                    ->get();

        $produtos = Anuncio::orderBy('ordem')->get();

        return view('site.home.index', compact('dias_semana', 'produtos'));
    }

    public function enviaContato(ContatoRequest $request)
    {
        try {
            Contato::create($request->except('_token'));

            \Mail::send('email.contato', $request->except('_token'), function ($message) {
                $message->to('contato.borracharia.rocha@gmail.com')
                        ->subject('Novo contato enviado do site!');
            });

        } catch(\Exception $e) {
            \Log::error('Erro ao enviar o contato do site: ' . $e->getMessage());

            return back()->withInput()->withError('Ocorreu um erro ao tentar enviar o e-mail!');
        }

        return back()->withSuccess('Mensagem enviada com sucesso!');
    }
}
