<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemPneu extends Model
{
    use HasFactory;

    protected $table = 'imagem_pneus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'img',
        'ordem',
        'pneu_id'
    ];

    public function pneu()
    {
        return $this->belongsTo(Pneu::class);
    }
}
