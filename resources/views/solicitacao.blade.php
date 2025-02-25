<!DOCTYPE html>
<html>
<head>
    <title>Recebemos a sua solicitação!</title>
</head>
<body>
    <h1> Prezado(a), {{ $dados['nome'] }}!</h1>
    <p>Temos o prazer de informar que recebemos a sua solicitação. Aguarde para mais informações.</p>
    <p><strong>Detalhes fornecidos:</strong></p>
    <ul>
        <li>Email: {{ $dados['email'] }}</li>
        <li>Telefone: {{ $dados['telefone'] }}</li>
        <li>NIF: {{ $dados['nif'] }}</li>
    </ul>
    <p>Obrigado!</p>
</body>
</html>
