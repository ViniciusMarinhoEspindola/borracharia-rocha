<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

// Models
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Agendamento;
use App\Models\DiasDaSemana;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $servicos = Servico::get();

        $dias_disponiveis = DiasDaSemana::where('ic_funcionamento', 1)->get();

        return view('site.cliente.servicos.index', compact('servicos', 'dias_disponiveis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = [
            'dt_agendamento' => $request->dt_agendamento,
            'hr_agendamento' => $request->hr_agendamento,
            'ic_status' => 1,
            'protocolo' => rand(100, 99999),
            'cliente_id' => \Auth::guard('cliente')->user()->id,
            'servico_id' => $request->servico
        ];

        if(Agendamento::create($create)) {
            return redirect()->route('cliente.index')->withSuccess('Serviço agendado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar agendar o seu serviço! Tente novamente.');
    }

    public function horariosDisponiveis(string $date)
    {
        $date = date('Y-m-d', strtotime($date));
        $cd_dia_semana = date("w", strtotime($date)) + 1;

        $diaSemana = DiasDaSemana::find($cd_dia_semana);

        $agendamentos = Agendamento::where('dt_agendamento', 'LIKE', "%{$date}%")
                                ->where('ic_status', 0)
                                ->orderBy('dt_agendamento')
                                ->get();

        $horariosDisponiveis = $this->getHorariosDisponiveis($diaSemana, $agendamentos, $date);

        return response()->json([
            'horariosDisponiveis' => $horariosDisponiveis
        ]);
    }

    private function getHorariosDisponiveis($diaSemana, $agendamentos, $date) {
        $horariosDisponiveis = array();
        if ($diaSemana->horarios_funcionamento->count()) {
            foreach($diaSemana->horarios_funcionamento as $horario) {
                $start = strtotime($horario->hr_inicio);
                $end = strtotime($horario->hr_termino);

                while($start < $end) {
                    if ($date === date('Y-m-d')) {
                        if (date('H:i:s', $start) > date('H:i:s')) {
                            if (!$agendamentos->some('hr_agendamento', date('H:i:s', $start)) ) {
                                $horariosDisponiveis[] = date('H:i', $start);
                            }
                        }
                    } else {
                        if (!$agendamentos->some('hr_agendamento', date('H:i:s', $start))) {
                            $horariosDisponiveis[] = date('H:i', $start);
                        }
                    }

                    $start += 3000;
                }
            }
        }

        return $horariosDisponiveis;
    }
}
