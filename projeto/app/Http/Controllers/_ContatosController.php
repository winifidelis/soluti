<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Contatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contatoLista');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatoCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['telefone'] == '(__) _____-____') {
            $data['telefone'] = null;
        }

        $contato = Contatos::create($data);

        Log::gravarLog('$contato->store() - ' . $contato->id, 'ContatosController@store');
        return redirect()->route('contatos.index')->with('createContato', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contato = Contatos::find($id);
        return view('contatoEdit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $contato = Contatos::find($id);

        if($contato->user_id != Auth::user()->id){
            return redirect()->route('contatos.index')->with('erroEditContato', 'Você tentou editar um contato que não pertence a você');
        }

        $contato->nome = $data['nome'];
        $contato->email = $data['email'];
        $contato->telefone = $data['telefone'];

        $contato->update();

        Log::gravarLog('$contato->update() - ' . $contato->id, 'ContatosController@update');
        return redirect()->route('contatos.index')->with('updateContato', 'Contato atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contato = Contatos::find($id);

        if($contato->user_id != Auth::user()->id){
            return redirect()->route('contatos.index')->with('erroEditContato', 'Você tentou excluir um contato que não pertence a você');
        }

        $contato->delete();

        Log::gravarLog('$contato->delete() - ' . $contato->id, 'ContatosController@destroy');
        return redirect()->route('contatos.index')->with('deleteContato', 'Contato excluído com sucesso');
    }
}
