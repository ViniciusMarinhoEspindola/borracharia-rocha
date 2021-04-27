<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type',
        'estimated_time',
        'description',
        'pneu_id'
    ];

    public function pneu()
    {
        return $this->bolongsTo(Pneu::class);
    }
}
