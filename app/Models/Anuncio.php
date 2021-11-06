<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pneu_id',
        'ordem',
    ];

    public function pneu()
    {
        return $this->belongsTo(Pneus::class);
    }
}
