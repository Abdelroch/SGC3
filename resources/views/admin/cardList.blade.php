<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person_add" />
    <link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solicitarUser.css') }}">
    <title>Listar todos os cartões</title>
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        @include('admin.nav.header')
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <div class="solicita">
                <h2>Lista de Cartões</h2>

                <!-- Botão de cadastro -->
                <div style="text-align: right; margin-bottom: 10px;">
                    <a href="{{ route('dashboard.index') }}" class="btn-cadastro">Criar Cartão</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Nome do Titular</th>
                            <th>Número do Cartão</th>
                            <th>Expiração</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cards as $card)
                            <tr>
                                <td>{{ $card->cardHolder }}</td>
                                <td>{{ $card->cardNumber }}</td>
                                <td>{{ $card->expirationMonth }}/{{ $card->expirationYear }}</td>
                                <td>{{ $card->type }}</td>
                                <td>{{ $card->status }}</td>
                                <td>
                                    <!-- Botão com Ícone de Olho -->
                                    <div class="dropdown" style="position: relative;">
                                        <!-- Ícone de olho -->
                                        <button class="dropdown-toggle"
                                            style="background: none; border: none; cursor: pointer; font-size: 24px; color: #333;"
                                            onclick="toggleDropdown(this)">
                                            <span class="material-icons-sharp">visibility</span>
                                        </button>

                                        <!-- Menu com os botões -->
                                        <div class="dropdown-menu"
                                            style="display: none; position: absolute; background-color: #f9f9f9; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1); z-index: 1; right: 0; top: 30px; min-width: 150px; border-radius: 8px;">

                                            <!-- Botão Editar (Azul) -->
                                            <button class="dropdown-item" onclick="editar({{ $card->id }})"
                                                style="padding: 6px 12px; cursor: pointer; text-align: center; background-color: #007bff; color: #fff; font-size: 12px; border-radius: 15px; border: none; margin-bottom: 8px;"
                                                onmouseover="this.style.backgroundColor='#0056b3'"
                                                onmouseout="this.style.backgroundColor='#007bff'">
                                                Editar
                                            </button>

                                            <!-- Botão Excluir (Vermelho) -->
                                            <form action="{{ route('cliente.destroy', $card->id) }}" method="POST"
                                                style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    style="padding: 6px 12px; cursor: pointer; text-align: center; background-color: #007bff; color: #fff; font-size: 12px; border-radius: 15px; border: none; margin-bottom: 8px;"
                                                    onmouseover="this.style.backgroundColor='#0056b3'"
                                                    onmouseout="this.style.backgroundColor='#007bff'">
                                                    Excluir
                                                </button>
                                            </form>


                                            <!-- Botão Imprimir (Amarelo) -->
                                            <!-- Formulário para selecionar o ano -->
                                            <form action="{{ route('cartao.PDF') }}" method="GET">
                                                <label for="ano">Selecione o Ano:</label>
                                                <select name="ano" id="ano">
                                                    @for ($i = date('Y'); $i >= 2000; $i--)
                                                        <!-- Populando os anos de 2000 até o ano atual -->
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                <button type="submit"
                                                    style="padding: 10px; cursor: pointer; text-align: left; width: 100%; border-radius: 4px;">
                                                    Gerar PDF
                                                </button>
                                            </form>
                                            <form action="{{ route('cartaolist.PDF') }}" method="GET">
                                                <input type="hidden" name="card_id" value="{{ $card->id }}">
                                                <button type="submit"
                                                    style="padding: 10px; cursor: pointer; text-align: left; width: 100%; border-radius: 4px;">
                                                    Baixar Cartão
                                                </button>
                                            </form>



                                            <!-- Script JavaScript para alternar a visibilidade do menu -->
                                            <script>
                                                function toggleDropdown(button) {
                                                    const dropdownMenu = button.nextElementSibling; // Seleciona o menu dropdown
                                                    const isVisible = dropdownMenu.style.display === 'block'; // Verifica se já está visível
                                                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                                                        menu.style.display = 'none'; // Fecha todos os outros dropdowns
                                                    });
                                                    dropdownMenu.style.display = isVisible ? 'none' : 'block'; // Alterna a visibilidade
                                                }

                                                // Fecha o menu ao clicar fora dele
                                                document.addEventListener('click', function(event) {
                                                    const isClickInside = event.target.closest('.dropdown');
                                                    if (!isClickInside) {
                                                        document.querySelectorAll('.dropdown-menu').forEach(menu => {
                                                            menu.style.display = 'none';
                                                        });
                                                    }
                                                });
                                            </script>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        <!-- End of Main Content -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Reza</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="{{asset('img/th.jpeg')}}">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="{{asset('loo.png')}}">
                    <h2>Kwanza Pay</h2>
                    <p>Fullstack Web Developer</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>

        <style>
            .btn-cadastro {
                background-color: #28a745;
                color: white;
                padding: 8px 12px;
                /* Diminuído para tamanho médio */
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                font-size: 0.9rem;
                /* Reduzido para um tamanho mais proporcional */
                transition: background-color 0.3s ease;
            }

            .btn-cadastro:hover {
                background-color: #218838;
            }

            .solicita {
                background-color: white;
                padding: 20px;
                margin: 50px auto;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 90%;
                max-width: 800px;
            }

            h2 {
                text-align: center;
                color: #333;
            }

            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }

            table th,
            table td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }

            table th {
                background-color: #f8f9fa;
            }

            .btn-delete {
                background-color: #dc3545;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 5px;
            }

            .btn-delete:hover {
                background-color: #c82333;
            }

            /* Dropdown */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-toggle {
                background: none;
                border: none;
                cursor: pointer;
                font-size: 24px;
            }

            .dropdown-menu {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
                z-index: 1;
                right: 0;
                min-width: 150px;
            }

            .dropdown-item {
                padding: 10px;
                cursor: pointer;
                text-align: left;
                width: 100%;
                border-bottom: 1px solid #ddd;
            }

            .dropdown-item:hover {
                background-color: #f1f1f1;
            }

            .dropdown:hover .dropdown-menu {
                display: block;
            }

            /* Modal */
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: white;
                margin: 15% auto;
                padding: 20px;
                width: 50%;
                border-radius: 8px;
            }

            .success-message {
                color: green;
                text-align: center;
                margin-bottom: 20px;
            }

            /* Ajustes para botões e navegação */
            .toggle,
            .close {
                cursor: pointer;
            }
        </style>
    </div>
</body>

</html>
