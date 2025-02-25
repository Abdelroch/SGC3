<!DOCTYPE html>
<html>

<head>
    <title>Solicitações</title>
    <style>
        body{

           font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
         body { font-family: Arial, sans-serif; text-align: center; position: relative; height: 100vh; }
        .insignia { width: 100px; height: auto; margin-bottom: 10px; }
        .container { padding: 20px;  min-height: 90vh; position: relative; }
        .footer-text { position: absolute; bottom: 20px; width: 100%; text-align: center; font-size: 14px;  }
        
    </style>
</head>

<body>
   <img src="{{ public_path('img/insignia.png') }}" class="insignia" alt="Insígnia">
    <div class="text-center">MINISTÉRIO DAS TELECOMUNICAÇÕES TÉCNOLOGIAS 
        <br/> DA INFORMAÇÃO E COMUNICAÇÃO SOCIAL</div>
    <div class="text-center"> MINISTÉRIO DA EDUCAÇÃO </div>
    <div class="text-center">LISTA DE SOLICITAÇÕES</div>
    <h2>Pedidos de Abertura do Ano de {{ $ano }}</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>NIF</th>
                <th>Provincia</th>
                

            </tr>
        </thead>
        <tbody>
            @foreach ($abertura as $abertura)
                <tr>
                    <td>{{ $abertura->name }}</td>
                    <td>{{ $abertura->email }}</td>
                    <td>{{ $abertura->telefone }}</td>
                    <td>{{ $abertura->nif }}</td>
                    <td>{{ $abertura->provincia }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
  <footer class="text-center col-12" id="footer" 
    style="position: fixed; bottom: 0; left: 0; width: 100%; padding-top: 10px; background: white;">
    
    <div style="border-bottom: 2px solid #ccc; width: 100%;"></div> <!-- Borda separada -->

    <small class="text-left text-dark" style="display: block; margin-top: 5px;">
        Documento Processado por Computador. <br>
    </small>
</footer>


</html>
