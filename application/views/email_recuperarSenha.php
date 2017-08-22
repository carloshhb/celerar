<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Enviando emails com a library nativa do CodeIgniter</title>

</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td class="navbar navbar-inverse" align="left">
            <!-- This setup makes the nav background stretch the whole width of the screen. -->
            <table width="650px" cellspacing="0" cellpadding="3" class="container">
                <tr class="navbar navbar-inverse">
                    <td colspan="4"><a class="brand" href="http://www.celerar.com">CELERAR.COM</a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" align="left" style="text-align: justify">
            <table width="650px" cellspacing="0" cellpadding="3" class="container">
                <tr>
                    <td>Parece que você solicitou uma nova senha do sistema CELERAR, caso seja verdade, siga os passos abaixo:</td>
                </tr>
                <tr>
                  <td>Clique no link a seguir para definir nova senha:
                     http://www.celerar.com/user/novo_pass/<?php echo $code ?>/>
                  </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" align="left">
            <table width="650px" cellspacing="0" cellpadding="3" class="container">
                <tr>
                    <td>
                        <hr>
                        <p>&copy; CELERAR - 2017</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
