<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasDaSemana extends Model
{
    use HasFactory;

    protected $table = 'dias_semana';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nm_dia_semana',
        'ic_funcionamento'
    ];

    public function horario_funcionamento()
    {
        return $this->hasMany(HorarioFuncionamento::class, 'dias_semana_id', 'id');
    }
}
