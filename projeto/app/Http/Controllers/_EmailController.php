<?php

namespace App\Http\Controllers;

use App\Mail\EnviadorDeEmail;
use App\Models\Contatos;
use App\Models\Log;
use App\Models\Producoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function testeEmail()
    {
        //https://www.cloudways.com/blog/send-email-in-laravel/
        //php artisan make:mail CloudHostingProduct
        //$teste = Mail::to('winifidelis@gmail.com')->send(new EnviadorDeEmail());

        //template
        //https://webdesign.tutsplus.com/pt/articles/build-an-html-email-template-from-scratch--webdesign-12770

        $to_name = 'Winição';
        $to_email = 'winifidelis@gmail.com';
        $data = array('name' => "Cloudways (sender_name)", "body" => "email de teste");

        Mail::send('emails.home', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Laravel teste');
            $message->from('nada@nada.com', 'robozinho da RIFA');
        });

        dd('email enviado');
    }

    public function envieEmail(Request $request)
    {
        $to_name = $request->get('to_nome');
        $to_email = $request->get('to_email');
        $titulo = $request->get('titulo');
        $conteudo = $request->get('conteudo');

        $enviadorDeEmail = new EnviadorDeEmail($titulo, $conteudo, $to_name, $to_email);
        $enviadorDeEmail->envieEmail();

        $json = 'ok';
        return response()->json($json);
    }

    public function testePelotao(Request $request)
    {
        //aqui eu estou colocando um limite infinito para a execução desse processo
        set_time_limit(0);

        $titulo = $request->get('titulo');
        $conteudo = $request->get('conteudo');

        $meusContato = Contatos::where('user_id', '=', Auth::user()->id)->get();
        for ($i = 0; $i < count($meusContato); $i++) {
            try {
                $enviadorDeEmail = new EnviadorDeEmail(
                    $titulo,
                    $conteudo,
                    $meusContato[$i]['nome'],
                    $meusContato[$i]['email']
                );
                $enviadorDeEmail->envieEmail();
                Log::gravarLog('Email enviado a ' . $meusContato[$i]['nome'] . ' - ' . $meusContato[$i]['email'] . ' com sucesso', 'EmailController@testePelotao');
            } catch (\Exception $e) {
                Log::gravarLog('ERRO ao enviar email ' . $meusContato[$i]['nome'] . ' - ' . $meusContato[$i]['email'] . '. ' . $e->getMessage(), 'EmailController@testePelotao');
            }
        }

        $json = 'ok';
        return response()->json($json);
    }

    public function enviarProducaoTeste(Request $request)
    {
        //aqui eu estou colocando um limite infinito para a execução desse processo
        set_time_limit(0);
        $producao = Producoes::find($request->get('id'));
        if (Auth::user()->id != $producao->user_id) {
            $json = 'erro' . $producao->conteudo;
            return response()->json($json);
        }

        $nomeComprador = Auth::user()->name;
        $emailComprador = Auth::user()->email;

        $data = array(
            "email" => $emailComprador,
            "nome" => $nomeComprador,

            'titulo' => $producao->titulo,
            'imagemtopo' => $producao->imagemtopo,
            'conteudo' => $producao->conteudo,
            'enviado' => $producao->enviado,
            'shownome' => $producao->shownome,
            'showtitulo' => $producao->showtitulo,
        );

        Mail::send('emails.templateEnviarProducao', $data, function ($message) use ($nomeComprador, $emailComprador) {
            $message->to($emailComprador, $nomeComprador)
                ->subject('Chegou email');
            $message->from("zigbe@zigbe.com.br", "Chegou email teste");
        });


        $json = 'ok' . $producao->conteudo;
        return response()->json($json);
    }

    public function enviarProducao(Request $request)
    {
        //aqui eu estou colocando um limite infinito para a execução desse processo
        set_time_limit(0);
        $producao = Producoes::find($request->get('id'));
        $producao->enviado = 1;
        $producao->update();
        Log::gravarLog('$producao->update(); - '.$producao->id, 'EmailController@enviarProducao');

        if (Auth::user()->id != $producao->user_id) {
            $json = 'erro' . $producao->conteudo;
            return response()->json($json);
        }

        $meusContato = Contatos::where('user_id', '=', Auth::user()->id)->get();
        for ($i = 0; $i < count($meusContato); $i++) {
            $nomeComprador = $meusContato[$i]['nome'];
            $emailComprador =$meusContato[$i]['email'];

            $data = array(
                "email" => $emailComprador,
                "nome" => $nomeComprador,

                'titulo' => $producao->titulo,
                'imagemtopo' => $producao->imagemtopo,
                'conteudo' => $producao->conteudo,
                'enviado' => $producao->enviado,
                'shownome' => $producao->shownome,
                'showtitulo' => $producao->showtitulo,
            );
            try {
                Mail::send('emails.templateEnviarProducao', $data, function ($message) use ($nomeComprador, $emailComprador) {
                    $message->to($emailComprador, $nomeComprador)
                        ->subject('Chegou email');
                    $message->from(Auth::user()->email, Auth::user()->name);
                });
                Log::gravarLog('Email enviado a ' . $meusContato[$i]['nome'] . ' - ' . $meusContato[$i]['email'] . ' com sucesso', 'EmailController@testePelotao');
            } catch (\Exception $e) {
                Log::gravarLog('ERRO ao enviar email ' . $meusContato[$i]['nome'] . ' - ' . $meusContato[$i]['email'] . '. ' . $e->getMessage(), 'EmailController@testePelotao');
            }
        }

        $json = 'ok' . $producao->conteudo;
        return response()->json($json);
    }

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
        //
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
