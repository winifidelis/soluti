<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Chegou email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                    <td align="center" bgcolor="#FFFFFF" style="padding: 0px 0px 0px 0px;">
                        <?php
                        $imagem = new App\Models\Imagens();
                        ?>
                        @if($imagemtopo == $imagem->getImagemTopoPadrao())
                        <!-- <img src="{{$imagemtopo}}" alt="E-mail" width="300" height="230" style="display: block;">!-->
                        <img src="{{$imagemtopo}}" alt="E-mail" style="display: block;">
                        @else
                        <!-- <img src="{{'http://zigbe.com.br/chegouemail/uploads/imagens_geral/'.$imagemtopo }}" alt="E-mail" width="300" height="230" style="display: block;"> !-->
                        <img src="{{'http://zigbe.com.br/chegouemail/uploads/imagens_geral/'.$imagemtopo }}" alt="E-mail" style="display: block;">
                        @endif
                    </td>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px; border: 1px solid #cccccc;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                @if($showtitulo == 1)
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>
                                            <center>{{$titulo}}</center>
                                        </b>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        @if($shownome == 1)
                                        {{ Auth::user()->name }},
                                        <br />
                                        @endif
                                        <?php
                                        echo $conteudo;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#87CEFA" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
                                        <!-- &reg; Chegou email 2020<br /> !-->
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>