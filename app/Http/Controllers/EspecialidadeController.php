<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEspecialidadeRequest;
use App\Http\Requests\UpdateEspecialidadeRequest;
use App\Models\Especialidade;
use \Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseSymfony;


class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(Especialidade::all());
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
     * @param  \App\Http\Requests\StoreEspecialidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEspecialidadeRequest $request)
    {
        $especialidade = new Especialidade();
        $especialidade->create(
            $request->espec_codigp,
            $request->espec_nome
        );
        $especialidade->save();

        return new Response($especialidade, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (!Especialidade::where(['id' => $id])->exists()) {
            return new Response(['message'=> "Especialidade not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $especialidade = Especialidade::find($id);

        return new Response($especialidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidade $especialidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEspecialidadeRequest  $request
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEspecialidadeRequest $request, Especialidade $especialidade)
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
        if (!Especialidade::where('id', $id)->exists()) {
            return new Response(['message'=> "Especialidade not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $especialidade = Especialidade::find($id);
        $especialidade->forceDelete();
        return new Response(['message'=> "Especialidade $especialidade->espec_nome to be deleted"]);
    }
}
