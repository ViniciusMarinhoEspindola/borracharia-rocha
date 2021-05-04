<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioFuncionamento extends Model
{
    use HasFactory;

    protected $table = 'horarios_funcionamento';

    protected $primaryKey = 'id';

    protected $fillable = [
        'hr_inicio',
        'hr_termino',
        'dias_semana_id'
    ];
}
