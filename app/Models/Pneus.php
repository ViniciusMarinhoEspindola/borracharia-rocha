<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pneus extends Model
{
    use HasFactory;

    protected $table = 'pneus';

    protected $fillable = [
        'modelo',
        'largura',
        'perfil',
        'aro',
        'valor',
        'quantidade',
        'descricao'
    ];

    public function imagens()
    {
        return $this->hasMany(ImagemPneu::class, 'pneu_id', 'id')->orderBy('ordem');
    }
}
