<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Userarquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informação = '';

        if ($request->hasfile('arquivos')) {

            foreach ($request->file('arquivos') as $file) {

                if ($file->extension() == 'pdf') {
                    $name = uniqid(date('HisYmd'));
                    $extension = $file->extension();
                    $nameFile = "{$name}.{$extension}";

                    $upload = $file->storeAs('docs', $nameFile);

                    //Storage::setVisibility($upload, 'public');
                    //dd(Storage::getVisibility($upload));
                    if ($upload) {

                        $arquivo = new Arquivo();
                        $arquivo->url = $nameFile;
                        $arquivo->nome = $file->getClientOriginalName();
                        $arquivo->tamanho = filesize($file);
                        $arquivo->user_id = Auth::user()->id;
                        $arquivo->save();

                        $userarquivo = new Userarquivo();
                        $userarquivo->user_id = Auth::user()->id;
                        $userarquivo->arquivo_id = $arquivo->id;
                        $userarquivo->proprietario = 1;
                        $userarquivo->save();

                    } else {
                        //dd('DEU RUIM');
                    }
                }else{
                    $informação = 'Você tentou enviar arquivos diferentes de arquivos PDFs, eles não foram enviados.';
                }
            }
            return redirect()->route('home')->with('arquivoEnviados', 'Arquivos cadastrados com sucesso. '.$informação);
        } else {
            return redirect()->route('home')->with('arquivoErro', 'Erro ao enviar os arquivos');
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
        //
    }
}
