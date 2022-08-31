<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'proc_codigo',
        'proc_nome',
        'proc_valor'
    ];

    public function create(string $proc_codigo, string $proc_nome, float $proc_valor): Procedimento
    {
        $this->proc_codigo = $proc_codigo;
        $this->proc_nome = $proc_nome;
        $this->proc_valor = $proc_valor;

        return $this;
    }
}
