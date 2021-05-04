<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'dt_agendamento',
        'hr_agendamento',
        'ic_status',
        'protocolo',
        'cliente_id',
        'servico_id'
    ];
}
