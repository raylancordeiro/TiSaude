<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'espec_nome',
        'espec_codigp'
    ];

    public function create(int $espec_codigp, string $espec_nome): Especialidade
    {
        $this->espec_codigp = $espec_codigp;
        $this->espec_nome = $espec_nome;

        return $this;
    }
}
