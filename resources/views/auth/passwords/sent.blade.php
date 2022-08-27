<!DOCTYPE html>
<html>
<head>
    <title>Seja Bem Vindo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, Helvetica, sans-serif">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tbody>
    <tr>
        <td width="100%" valign="top" bgcolor="#fff" style="padding-top: 20px;">
            <table width="70%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td>
                        <!--Inserindo logo-->
                        <table width="345px" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                            <tr>
                                <td>
                                    <img alt="logo" src="http://institutocientifico.com.br/img/logo-azul.png" width="250"
                                         style="margin: 20px;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="80%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td>
                        <table>
                            <tbody>
                            <tr>
                                <td style="color: #000">
                                    <h3>Olá!</h3>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table style="max-width: 4000px;" border="0" cellpadding="0" cellspacing="0"
                                           align="center">
                                        <tr>
                                            <td style="color:#1976D2 ">
                                                <h1>Deseja Recuperar sua Senha?</h1>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <p>Recebemos uma solicitação de recuperação de senha.<br>
                                        Caso tenha sido você quem solicitou, por favor, clique no link abaixo para recuperar sua senha,
                                        caso contrário ignore este email.
                                    </p>
                                    <p>Qualquer Dúvida ficamos a disposição<br>
                                        <b>Equipe Instituto Científico</b>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="max-width: 245px; margin-bottom: 40px; margin-top: 20px;" border="0"
                               cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                            <tr>
                                <td>
                                    <a style="font:bold 24px Helvetica;
                                                                    font-style:normal;
                                                                    color:#1976D2;
                                                                    cursor:pointer;
                                                                    margin:0 auto;
                                                                    text-decoration: none;
                                                                    " href="{{ url('password/reset/'.$token) }}"
                                       target="_blank">Recuperar Senha</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>