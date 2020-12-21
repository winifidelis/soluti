<?php

namespace App\Http\Controllers;

use App\Models\Imagens;
use App\Models\Log;
use App\Models\Producoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProducoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producaoLista');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producaoCreate');
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

        if (isset($data['shownome']) && $data['shownome'] == "on") {
            $data['shownome'] = 1;
        } else {
            $data['shownome'] = 0;
        }
        if (isset($data['showtitulo']) && $data['showtitulo'] == "on") {
            $data['showtitulo'] = 1;
        } else {
            $data['showtitulo'] = 0;
        }

        $imagem = new Imagens();
        if (isset($data['imagemtopo'])) {
            //se eu trocar a imagem e ela não dor TopoPadrao eu tenho que excluir a imagem
            $file = $request->file('imagemtopo');
            $name = uniqid(date('HisYmd'));
            $extension = $file->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $file->storeAs('imagens_geral', $nameFile);
            $data['imagemtopo'] = $nameFile;
        } else {
            $data['imagemtopo'] = $imagem->getImagemTopoPadrao();
        }
        $data['enviado'] = 0;
        
        $producao = Producoes::create($data);

        Log::gravarLog('$producao->store() - ' . $producao->id, 'ProducoesController@store');
        return redirect()->route('producoes.index')->with('createProducao', 'Produção criada com sucesso!');
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
        $producao = Producoes::find($id);
        return view('emails.templateVerProducao', compact('producao'));
        //dd($producao);
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
        $producao = Producoes::find($id);
        return view('producaoEdit', compact('producao'));
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
        $data = $request->all();
        $producao = Producoes::find($id);

        if ($producao->user_id != Auth::user()->id) {
            return redirect()->route('producoes.index')->with('erroEditProducao', 'Você tentou editar uma produção que não pertence a você');
        }

        if (isset($data['shownome']) && $data['shownome'] == "on") {
            $data['shownome'] = 1;
        } else {
            $data['shownome'] = 0;
        }
        if (isset($data['showtitulo']) && $data['showtitulo'] == "on") {
            $data['showtitulo'] = 1;
        } else {
            $data['showtitulo'] = 0;
        }

        $imagem = new Imagens();
        if (isset($data['imagemtopo'])) {
            //se eu trocar a imagem e ela não dor TopoPadrao eu tenho que excluir a imagem
            if ($producao->imagemtopo != $imagem->getImagemTopoPadrao()) {
                if (file_exists(Storage::path('') . '/imagens_geral/' . $producao->imagemtopo)) {
                    $file = '/imagens_geral/' . $producao->imagemtopo;
                    Storage::copy($file, '/excluidos/' . $producao->imagemtopo);
                    Storage::delete($file);
                }
            }
            $file = $request->file('imagemtopo');
            $name = uniqid(date('HisYmd'));
            $extension = $file->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $file->storeAs('imagens_geral', $nameFile);
            $producao->imagemtopo = $nameFile;
        }

        $producao->titulo = $data['titulo'];
        $producao->conteudo = $data['conteudo'];
        $producao->shownome = $data['shownome'];
        $producao->showtitulo = $data['showtitulo'];

        $producao->update();

        Log::gravarLog('$producao->update() - ' . $producao->id, 'ProducoesController@update');
        return redirect()->route('producoes.edit', $id)->with('updateProducao', 'Produção atualizada com sucesso');
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
        $producao = Producoes::find($id);

        if ($producao->user_id != Auth::user()->id) {
            return redirect()->route('producoes.index')->with('erroEditProducao', 'Você tentou excluir uma produção que não pertence a você');
        }

        $producao->delete();

        Log::gravarLog('$contato->delete() - ' . $producao->id, 'ProducoesController@destroy');
        return redirect()->route('producoes.index')->with('deleteProducao', 'Produção excluída com sucesso');
    }
}
