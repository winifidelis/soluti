<?php

namespace App\Http\Controllers;

use App\Models\Imagens;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('imagemLista');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->hasfile('imagens')) {

            foreach ($request->file('imagens') as $file) {

                $name = uniqid(date('HisYmd'));
                $extension = $file->extension();
                $nameFile = "{$name}.{$extension}";

                $upload = $file->storeAs('imagens_geral', $nameFile);

                //Storage::setVisibility($upload, 'public');
                //dd(Storage::getVisibility($upload));
                if ($upload) {
                    $imagem = new Imagens();
                    $imagem->url = $nameFile;
                    $imagem->user_id = Auth::user()->id;
                    $imagem->save();

                    Log::gravarLog('$imagem->save() - ' . $imagem->id, 'ImagensController@store');
                } else {
                    //dd('DEU RUIM');
                }
            }
            return redirect()->route('imagens.index')->with('updateImagem', 'Imagens cadastradas com sucesso');
        } else {
            return redirect()->route('imagens.index')->with('erroImagem', 'Você não selecionou nenhuma imagem');
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagem = Imagens::find($id);

        if (file_exists(Storage::path('') . '/imagens_geral/' . $imagem->url)) {
            $file = '/imagens_geral/' . $imagem->url;
            //dd($file);
            Storage::copy($file, '/excluidos/' . $imagem->url);
            Storage::delete($file);
            $imagem->delete();
            //dd('tchau');
        } else {
            //dd('n achei', $endereco, public_path());
            //dd(Storage::path(''));
            //dd(public_path() . '/uploads/imagens_geral/' . $imagem->url. '  -ué');
        }

        return redirect()->route('imagens.index')->with('deleteImagem', 'Imagens excluída com sucesso');
    }
}
