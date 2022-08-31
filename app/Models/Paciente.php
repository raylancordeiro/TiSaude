<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'pac_codigo',
        'pac_telefones',
        'pac_dataNascimento',
        'pac_nome'
    ];

    public function create(
        string $pac_codigo,
        string $pac_nome,
        string $pac_telefones,
        \DateTime $pac_dataNascimento
    ): Paciente {
        $this->pac_codigo = $pac_codigo;
        $this->pac_nome = $pac_nome;
        $this->pac_telefones = $pac_telefones;
        $this->pac_dataNascimento = $pac_dataNascimento;

        return $this;
    }
}
