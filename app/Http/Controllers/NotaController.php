<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notas = Nota::latest()->where('excerpt', 'LIKE', "%$request->q%")->get();
        return Inertia::render('Notas/Index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Notas/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'excerpt' => 'required',
            'content' =>  'required'
        ]);

        $nota = Nota::create($request->all());

        return redirect()->route('notas.edit', $nota->id)->with('status', 'Nota creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        return Inertia::render('Notas/Show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        return Inertia::render('Notas/Edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'excerpt' => 'required',
            'content' =>  'required'
        ]);

        $nota->update($request->all());

        return redirect()->route('notas.index')->with('status', 'Nota actualizada');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {

        $nota->delete();
        return redirect()->route('notas.index')->with('status', 'Nota eliminada');
    }
}
