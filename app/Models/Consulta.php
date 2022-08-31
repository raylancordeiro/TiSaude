<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'cons_codigo',
        'data',
        'hora',
        'particular',
        'cons_med',
        'cons_proc',
        'cons_pac'
    ];

    public function create(
        string $cons_codigo,
        string $data,
        string $hora,
        string $cons_med,
        string $cons_proc,
        string $cons_pac,
        bool $particular = false
    ): Consulta {
        $this->cons_codigo = $cons_codigo;
        $this->data = $data;
        $this->hora = $hora;
        $this->particular = $particular;
        $this->cons_med = $cons_med;
        $this->cons_proc = $cons_proc;
        $this->cons_pac = $cons_pac;

        return $this;
    }
}
