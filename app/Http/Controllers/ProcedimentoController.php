<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcedimentoRequest;
use App\Http\Requests\UpdateProcedimentoRequest;
use App\Models\Procedimento;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseSymfony;

class ProcedimentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(Procedimento::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProcedimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcedimentoRequest $request)
    {
        $procedimento = new Procedimento();

        $procedimento->create(
            $request->proc_codigo,
            $request->proc_nome,
            $request->proc_valor
        );
        $procedimento->save();

        return new Response($procedimento, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): Response
    {
        if (!Procedimento::where('id', $id)->exists()) {
            return new Response(['message'=> "Procedimento not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $medico = Procedimento::find($id);

        return new Response($medico);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimento $procedimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProcedimentoRequest  $request
     * @param  \App\Models\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProcedimentoRequest $request, Procedimento $procedimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if (!Procedimento::where('id', $id)->exists()) {
            return new Response(['message'=> "Procedimento not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $procedimento = Procedimento::find($id);
        $procedimento->forceDelete();
        return new Response(['message'=> "Procedimento $procedimento->proc_nome to be deleted"]);
    }
}
