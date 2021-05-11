<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;

// Models
use App\Models\DiasDaSemana;

class HomeController extends Controller
{
    public function index()
    {
        $dias_semana = DiasDaSemana::with('horarios_funcionamento')
                                    ->where('ic_funcionamento', 1)
                                    ->get();

        return view('site.home.index', compact('dias_semana'));
    }
}
