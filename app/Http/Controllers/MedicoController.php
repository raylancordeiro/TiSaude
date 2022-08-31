<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Models\Medico;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseSymfony;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // ...
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(Medico::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicoRequest $request)
    {
        $medico = new Medico();
        $medico->create(
            $request->med_codigo,
            $request->med_CRM,
            $request->med_nome
        );

        $medico->save();

        return new Response($medico, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (!Medico::where('id', $id)->exists()) {
            return new Response(['message'=> "Medico not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $medico = Medico::find($id);

        return new Response($medico);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicoRequest  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        if (!Medico::where('id', $id)->exists()) {
            return new Response(['message'=> "Medico not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $medico = Medico::find($id);
        $medico->forceDelete();
        return new Response(['message'=> "Medico $medico->med_nome to be deleted"]);
    }
}
