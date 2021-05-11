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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dt_agendamento' => 'date',
        'hr_agendamento' => 'datetime',
    ];

    // Relationship
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
