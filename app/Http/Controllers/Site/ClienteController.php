<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

// Models
use App\Models\Cliente;
use App\Models\Agendamento;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agendamentos = Agendamento::when(isset($request->s), function($query) use ($request) {
                                        return $query->where(function($subquery) use ($request) {
                                            return $subquery->whereHas('cliente', function($subquery) use ($request) {
                                                                return $subquery->where('name', 'LIKE', "%{$request->s}%");
                                                            })
                                                            ->orWhereHas('servico', function($subquery) use ($request) {
                                                                return $subquery->where('title', 'LIKE', "%{$request->s}%");
                                                            })
                                                            ->orWhere('protocolo', 'LIKE', "%{$request->s}%");
                                        });
                                    })
                                    // ->where('cliente_id', \Auth::guard('cliente')->user()->id)
                                    ->orderByRaw("CASE WHEN ic_status = 0 THEN 1 when ic_status = 2 then 2 when ic_status = 1 then 3 ELSE created_at END DESC")
                                    ->orderBy('dt_agendamento', 'ASC')
                                    ->orderBy('hr_agendamento', 'ASC')
                                    ->paginate(10);

        $filters = $request->all();

        $status = [
            0 => 'Cancelado',
            1 => 'Aguardando',
            2 => 'Finalizado'
        ];

        return view('site.cliente.index', compact('agendamentos', 'filters', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.login.signUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $create = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => \Hash::make($request->password)
        ];

        if(Cliente::create($create)) {
            return redirect()->route('login')->withSuccess('Cadastrado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar fazer o cadastro! Tente novamente.');
    }
}
