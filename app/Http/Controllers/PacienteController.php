<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseSymfony;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return new Response(Paciente::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePacienteRequest  $request
     * @return Response
     */
    public function store(StorePacienteRequest $request)
    {
        $planoSaude = new Paciente();
        $planoSaude->create(
            $request->pac_codigo,
            $request->pac_nome,
            $request->pac_telefones,
            new \DateTime($request->pac_dataNascimento)
        );

        $planoSaude->save();

        return new Response($planoSaude, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        if (!Paciente::where('id', $id)->exists()) {
            return new Response(['message'=> "Paciente not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $medico = Paciente::find($id);

        return new Response($medico);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacienteRequest  $request
     * @param  \App\Models\Paciente  $paciente
     * @return Response
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        if (!Paciente::where('id', $id)->exists()) {
            return new Response(['message'=> "Paciente not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $planoSaude = Paciente::find($id);
        $planoSaude->forceDelete();
        return new Response(['message'=> "Paciente $planoSaude->pac_nome to be deleted"]);
    }
}
