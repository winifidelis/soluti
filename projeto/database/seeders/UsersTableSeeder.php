<?php

namespace Database\Seeders;

use App\Models\Depoimentos;
use App\Models\Duvidasfrequentes;
use App\Models\Grupo;
use App\Models\Produto;
use App\Models\Site;
use App\Models\Sorteio;
use App\Models\User;
use App\Models\Usergrupo;
use Illuminate\Database\Seeder;

use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'id'          => 1,
            'name'        => 'user 1',
            'email'       => 'user1@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $user2 = User::create([
            'id'          => 2,
            'name'        => 'user 2',
            'email'       => 'user2@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $user3 = User::create([
            'id'          => 3,
            'name'        => 'user 3',
            'email'       => 'user3@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);

        $user4 = User::create([
            'id'          => 4,
            'name'        => 'user 4',
            'email'       => 'user4@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $user5 = User::create([
            'id'          => 5,
            'name'        => 'user 5',
            'email'       => 'user5@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $user6 = User::create([
            'id'          => 6,
            'name'        => 'user 6',
            'email'       => 'user6@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $user7 = User::create([
            'id'          => 7,
            'name'        => 'user 7',
            'email'       => 'user7@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $grupo1 = Grupo::create([
            'id'          => 1,
            'nome'        => 'Grupo 1',
        ]);
        $grupo2 = Grupo::create([
            'id'          => 2,
            'nome'        => 'Grupo 2',
        ]);
        $grupo3 = Grupo::create([
            'id'          => 3,
            'nome'        => 'Grupo 3',
        ]);
        $grupo4 = Grupo::create([
            'id'          => 4,
            'nome'        => 'Grupo 4',
        ]);
        $user8 = User::create([
            'id'          => 8,
            'name'        => 'Winicius Fidelis',
            'email'       => 'winifidelis@gmail.com',
            'password'    => bcrypt('123456789'),
        ]);
        $usergrupo = Usergrupo::create([
            'user_id' => $user8->id,
            'grupo_id' =>$grupo1->id,
        ]);






        /*
        $site = Site::create([
            'id'                                    => 1,

            'sliderprincipal1'                      => 'imagens_geral/sliderdefault1.jpg',
            'sliderprincipallink1'                  => 'http://zigbe.com.br/rifa/',
            'targetblank1'                          => 0,
            'sliderprincipal2'                      => 'imagens_geral/sliderdefault2.jpg',
            'sliderprincipallink2'                  => 'http://zigbe.com.br/rifa/',
            'targetblank2'                          => 0,
            'sliderprincipal3'                      => 'imagens_geral/sliderdefault3.jpg',
            'sliderprincipallink3'                  => 'http://zigbe.com.br/rifa/',
            'targetblank3'                          => 1,
            'sliderprincipal4'                      => 'imagens_geral/sliderdefault4.jpg',
            'sliderprincipallink4'                  => 'http://zigbe.com.br/rifa/',
            'targetblank4'                          => 0,
            'sliderprincipal5'                      => 'imagens_geral/sliderdefault5.jpg',
            'sliderprincipallink5'                  => 'http://zigbe.com.br/rifa/',
            'targetblank5'                          => 1,

            'cfimagem1'                             => 'imagens_geral/iconescolhaumprodutodefault.png',
            'cftitulo1'                             => 'Escolha um Sorteio',
            'cftexto1'                              => 'Muito fácil participar. Comece escolhendo um sorteio ativo.',
            'cfimagem2'                             => 'imagens_geral/iconselecioneosnumerosdefault.png',
            'cftitulo2'                             => 'Selecione os números',
            'cftexto2'                              => 'Escolha quantos quiser! Quanto mais, mais chances de ganhar.',
            'cfimagem3'                             => 'imagens_geral/iconfacaopagamentodefault.png',
            'cftitulo3'                             => 'Faça o pagamento',
            'cftexto3'                              => 'Escolha uma das formas de pagamento disponíveis.',
            'cfimagem4'                             => 'imagens_geral/iconaguardeosorteiodefault.png',
            'cftitulo4'                             => 'Aguarde o sorteio',
            'cftexto4'                              => 'Agora é aguardar o sorteio pela Loteria Federal e boa sorte!',

            'slidermenordefault1'                   => 'imagens_geral/slidermenordefault1.jpg',
            'slidermenorlink1'                      => 'http://zigbe.com.br/rifa/',
            'targetblankmenor1'                     => 0,
            'slidermenordefault2'                   => 'imagens_geral/slidermenordefault2.jpg',
            'slidermenorlink2'                      => 'http://zigbe.com.br/rifa/',
            'targetblankmenor2'                     => 0,
            'slidermenordefault3'                   => 'imagens_geral/slidermenordefault3.jpg',
            'slidermenorlink3'                      => 'http://zigbe.com.br/rifa/',
            'targetblankmenor3'                     => 0,
            'slidermenordefault4'                   => 'imagens_geral/slidermenordefault4.jpg',
            'slidermenorlink4'                      => 'http://zigbe.com.br/rifa/',
            'targetblankmenor4'                     => 0,
            'slidermenordefault5'                   => 'imagens_geral/slidermenordefault5.jpg',
            'slidermenorlink5'                      => 'http://zigbe.com.br/rifa/',
            'targetblankmenor5'                     => 0,

            'slidermenordireita1'                   => 'imagens_geral/imagemlateraldefault1.jpg',
            'slidermenordireitalink1'               => 'http://zigbe.com.br/rifa/',
            'targetblankmenordireita1'              => 0,
            'slidermenordireita2'                   => 'imagens_geral/imagemlateraldefault2.jpg',
            'slidermenordireitalink2'               => 'http://zigbe.com.br/rifa/',
            'targetblankmenordireita2'              => 0,

            'sobrenostexto'                         => 'Texto sobre o Sobre nós',
            'slidersobrenos1'                       => 'imagens_geral/sliderdefault1.jpg',
            'slidersobrenos2'                       => 'imagens_geral/sliderdefault2.jpg',
            'slidersobrenos3'                       => 'imagens_geral/sliderdefault3.jpg',
            'slidersobrenos4'                       => 'imagens_geral/sliderdefault4.jpg',
            'slidersobrenos5'                       => 'imagens_geral/sliderdefault5.jpg',
            'sobrenoslinkyoutube'                   => 'http://www.youtube.com/embed/bwj2s_5e12U',

            'detimpimagem1'                         => 'imagens_geral/detalhedefault2.png',
            'detimptitulo1'                         => 'COMPRA SEGURA',
            'detimptexto1'                          => 'Parcele suas compras em até 12 vezes',
            'detimpimagem2'                         => 'imagens_geral/detalhedefault3.png',
            'detimptitulo2'                         => 'ENTREGA GARANTIDA',
            'detimptexto2'                          => 'Enviamos para todo o país via Correios',
            'detimpimagem3'                         => 'imagens_geral/detalhedefault1.png',
            'detimptitulo3'                         => 'CENTRAL DE ATENDIMENTO',
            'detimptexto3'                          => '(62) 3224-4936',






            'textorodape'                           => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.',

            'linkinstagram'                         => 'https://www.instagram.com/',
            'linkfacebook'                          => 'https://www.facebook.com/',
            'linkyoutube'                           => 'https://www.youtube.com/',

            'txtquemsomos'                          => 'texto: quem somos',
            'txttermosecondicoes'                   => 'texto: termos e condições',
            'txtformasdeenvio'                      => 'texto: forma de envio',
            'txttrocasedevolucoes'                  => 'texto: trocas e devoluções',
            'txtformasdepagamento'                  => 'texto: formas de pagamento',

            'faleconoscoendereco'                   => 'Riviera State 32/106',
            'faleconoscotelefone'                   => '(62) 99999-9999',
            'faleconoscoemail'                      => 'email@email.com',
            'faleconoscohorariodeatendimento'       => 'Segunda – Sexta: 09:00 – 18:00',

            'textoinferior'                         => '© 2020 INTERSIS BRASIL PRODUÇÕES CULTURAIS LTDA. CNPJ: 03.996.438/0001-60. Todos os direitos reservados.',
        ]);

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $produto = Produto::create([
                'nome' => $faker->name,
                'descricaocurta' => $faker->text(100),
                'descricaolonga' => $faker->text,
                'quantidade' => rand(100, 500),
                'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 1000),
                'valordesconto' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 800),
                'status' => $faker->randomElement($array = array('aberto', 'finalizado', 'suspenso')),
                'datasorteio' => $faker->date,

                'imagemprincipal' => 'imagens_geral/default.jpeg',
                'imagem1' => '0',
                'imagem2' => '0',
                'imagem3' => '0',
                'imagem4' => '0',
                'imagem5' => '0',
                'imagem6' => '0',
                'imagem7' => '0',
                'imagem8' => '0',
                'imagem9' => '0',
                'imagem10' => '0',
            ]);
            $sorteio = Sorteio::create([
                'descricaocurta' => $faker->text(60),
                'premio' => $faker->name(),
                'descricaolonga' => $faker->text(1000),
                'quantidade' => $produto->quantidade,
                'imagem' => $faker->randomElement($array = array('imagens_geral/defaultSorteio1.jpg', 'imagens_geral/defaultSorteio2.jpg', 'imagens_geral/defaultSorteio3.jpg')),
                'produto_id' => $produto->id,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $depoimento = Depoimentos::create([
                'premio' => $faker->randomElement($array = array('Casa em condominio fechado', 'Toyota Corolla', 'Fuscão preto', 'Camiseta do Vila Nova', 'Camiseta do Brasil', 'Caixa de lapis de cor')),
                'datasorteio' => $faker->date,
                'nomeganhador' => $faker->name,
                'cidade' => $faker->city,
                'numerosorteado' => $faker->numberBetween(1, 1000),
                'linkyoutube' => 'http://www.youtube.com/embed/bwj2s_5e12U',
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            $duvidasfrequentes = Duvidasfrequentes::create([
                'descricaocurta' => $faker->text(60),
                'descricaolonga' => $faker->text(2000),
            ]);
        }
        */
    }
}
