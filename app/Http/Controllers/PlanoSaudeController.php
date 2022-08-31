<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanoSaudeRequest;
use App\Http\Requests\UpdatePlanoSaudeRequest;
use App\Models\PlanoSaude;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseSymfony;

class PlanoSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(PlanoSaude::all());
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
     * @param  \App\Http\Requests\StorePlanoSaudeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanoSaudeRequest $request)
    {
        $planoSaude = new PlanoSaude();
        $planoSaude->create(
            $request->plan_codig,
            $request->pano_descricao,
            $request->plano_telefone
        );

        $planoSaude->save();

        return new Response($planoSaude, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanoSaude  $planoSaude
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (!PlanoSaude::where('id', $id)->exists()) {
            return new Response(['message'=> "Plano not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $medico = PlanoSaude::find($id);

        return new Response($medico);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanoSaude  $planoSaude
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanoSaude $planoSaude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanoSaudeRequest  $request
     * @param  \App\Models\PlanoSaude  $planoSaude
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanoSaudeRequest $request, PlanoSaude $planoSaude)
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
        if (!PlanoSaude::where('id', $id)->exists()) {
            return new Response(['message'=> "Plano not found"], ResponseSymfony::HTTP_NOT_FOUND);
        }
        $planoSaude = PlanoSaude::find($id);
        $planoSaude->forceDelete();
        return new Response(['message'=> "Plano $planoSaude->pano_descricao to be deleted"]);
    }
}
