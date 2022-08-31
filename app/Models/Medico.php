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

    public function create(string $medCodigo, string $medCRM, string $medNome): Medico
    {
        $this->med_codigo = $medCodigo;
        $this->med_CRM = $medCRM;
        $this->med_nome = $medNome;

        return $this;
    }
}
