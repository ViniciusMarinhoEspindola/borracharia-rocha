<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;

// Models
use App\Models\DiasDaSemana;
use App\Models\Pneus;

class HomeController extends Controller
{
    public function index()
    {
        $dias_semana = DiasDaSemana::with('horarios_funcionamento')
                                    ->where('ic_funcionamento', 1)
                                    ->get();

        $produtos = Pneus::latest()
                        ->paginate(4);

        return view('site.home.index', compact('dias_semana', 'produtos'));
    }
}
