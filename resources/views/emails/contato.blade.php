<p>Abaixo Segue os dados recebidos através do formulário do website:</p>
<table>
    <tr>
        <td><b>Nome: </b>{{$contato->nome}}</td>
    </tr>
    <tr>
        <td>
            <b>E-mail: </b> {{$contato->email}}</td>
    </tr>
    <tr>
        <td>
            <b>Assunto: </b> {{$contato->assunto}}</td>
    </tr>
    <tr>
        <td>
            <b>Telefone: </b> {{$contato->telefone}}</td>
    </tr>
    <tr>
        <td>
            <b>Mensagem: </b><br>
            {{$contato->mensagem}}
        </td>
    </tr>
</table>