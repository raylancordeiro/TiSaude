<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;
use App\Models\Consulta;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseSymfony;

class ConsultaController extends Controller
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
        return Response(Consulta::all());
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
     * @param  \App\Http\Requests\StoreConsultaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultaRequest $request)
    {
        $consulta = new Consulta();
        $consulta->create(
            $request->cons_codigo,
            $request->data,
            $request->hora,
            $request->cons_med,
            $request->cons_proc,
            $request->cons_pac,
            $request->particular ?: false
        );
        $consulta->save();

        return new Response($consulta, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        if (empty($consulta)) {
            return new Response(['message'=> 'Consulta not found'], ResponseSymfony::HTTP_NOT_FOUND);
        }
        return new Response($consulta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsultaRequest  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultaRequest $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
