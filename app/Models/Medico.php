<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'med_codigo',
        'med_CRM',
        'med_nome'
    ];

    public function create(string $medCodigo, string $medCRM, string $medNome, string $med_espec): Medico
    {
        $this->med_codigo = $medCodigo;
        $this->med_CRM = $medCRM;
        $this->med_nome = $medNome;
        $this->med_espec = $med_espec;

        return $this;
    }

    public function especialidade()
    {
        return $this->hasOne(Especialidade::class, 'med_espec', 'med_codigo');
    }
}
