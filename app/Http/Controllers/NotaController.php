<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotaRequest;
use App\Http\Requests\EditNotaRequest;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$notas = Nota::paginate(1);
	return view('notas.index', compact('notas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	Nota::create ([
		'pchave' => $request->pchave,
		'descrição' => $request->descrição,
		'conteúdo' => $request->conteúdo
]);
	flash("Anotação realizada com sucesso!");
	return redirect()->route('notas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
	return view('notas.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
		return view('notas.edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(EditNotaRequest $request, Nota $nota)
    {
        //
$nota->update([
            'pchave' => $request->pchave,
            'descrição' => $request->descrição,
	    'conteúdo' => $request->conteúdo
        ]);
        flash("Anotação atualizada com sucesso!");
        return redirect()->route('notas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
	$nota->delete();
        flash("Anotação excluída!");
        return redirect()->back();
    }
}
