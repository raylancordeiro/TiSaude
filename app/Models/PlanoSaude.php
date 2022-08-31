<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoSaude extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'plan_codig',
        'pano_descricao',
        'plano_telefone'
    ];

    public function create(string $plan_codig, string $pano_descricao, string $plano_telefone): PlanoSaude
    {
        $this->plan_codig = $plan_codig;
        $this->pano_descricao = $pano_descricao;
        $this->plano_telefone = $plano_telefone;

        return $this;
    }
}
