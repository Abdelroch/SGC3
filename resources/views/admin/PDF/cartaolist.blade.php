@php
    $logoPath = public_path('img/looo.png'); // Caminho da logo
    $imagePath = public_path('img/cartao bai.png'); // Caminho do cartão
    $logoData = base64_encode(file_get_contents($logoPath));
    $imageData = base64_encode(file_get_contents($imagePath));
    $logoSrc = 'data:image/png;base64,' . $logoData;
    $src = 'data:image/png;base64,' . $imageData;
@endphp

<!DOCTYPE html>
<html>

<head>
    <title>Cartão de Entrega</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            text-align: center;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-bottom: 2px solid #ccc;
        }

        .header img {
            height: 150px; /* Aumentei o tamanho do logotipo */
            margin-right: 15px;
        }

        .content {
            margin-top: 20px;
            text-align: left;
        }

        .card {
            width: 400px;
            height: 250px;
            background: url("{{ $src }}") no-repeat center center fixed;
            background-size: cover;
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .card-name {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-number {
            font-size: 24px;
            font-weight: bold;
            margin-top: 110px;
        }

        .expiration {
            position: absolute;
            bottom: 15px;
            right: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .name {
            position: absolute;
            bottom: 15px;
            left: 20px;
            font-size: 16px;
            color: white;
            font-weight: bold;
        }

        .qr-code {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .qr-code img {
            width: 60px;
            height: 60px;
        }

        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 2px solid #ccc;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
         body { font-family: Arial, sans-serif; text-align: center; position: relative; height: 100vh; }
        .insignia { width: 100px; height: auto; margin-bottom: 10px; }
        .container { padding: 20px;  min-height: 90vh; position: relative; }
        .footer-text { position: absolute; bottom: 20px; width: 100%; text-align: center; font-size: 14px;  }
        
    </style>
</head>

<body>

    <!-- Cabeçalho com logotipo -->
    <div class="header">
        <img src="{{ $logoSrc }}" alt="Logo da Empresa">
        <h1>Confirmação de Entrega de Cartão</h1>
    </div>
    @foreach ($cards as $card)
    <div class="content">
        <p>Prezado(a),<strong>{{ $card->cardHolder }}</p>
        <p>Temos o prazer de informar que o seu cartão foi emitido e está pronto para ser utilizado.</p>
        <p>Por favor, confira abaixo as informações do seu cartão e mantenha este documento para referência futura.</p>
    </div>
    @endforeach
    @foreach ($cards as $card)
        <div class="card">
            <div class="card-name">{{ $card->cardName }}</div>

            <div class="qr-code">
                <img src="data:image/png;base64,{{ $qrcodes[$card->id] }}">
            </div>

            <div class="card-number">{{ $card->cardNumber }}</div>

            <div class="expiration">Expira: {{ $card->expirationMonth }}/{{ $card->expirationYear }}</div>
            <div class="name">{{ $card->cardHolder }}</div>
        </div>
    @endforeach

    <div class="content">
        <p><strong>Data de Entrega:</strong> {{ date('d/m/Y') }}</p>
        <p>Agradecemos a sua confiança e estamos à disposição para qualquer dúvida ou suporte necessário.</p>
    </div>

    <div class="footer">
        <p><strong>Contato da Empresa:</strong></p>
        <p>Telefone: (+244) 941-051-108 | Email: sif.info3@gmail.com</p>
        <p>Endereço: Rua Exemplo, 123, Cidade, País</p>
    </div>

</body>
</html>

