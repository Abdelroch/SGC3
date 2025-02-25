<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/listar.css') }}">
    <title>Responsive Dashboard Design | KwanzaPay</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="bai.png" alt="Logo">
                    <h2>Kwanza<span class="danger">Pay</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="{{ route('user.perfile') }}"
                    class="{{ Route::is('user.perfile') ? 'active' : '' }}">
                    <span class="active">dashboard</span>
                </a>
                <a href="{{ route('contas.index') }}" class="{{ Route::is('contas.index') ? 'active' : '' }}">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Solicitar Cartão</h3>
                </a>
                
                <a href="{{ route('user.cartao') }}" class="{{ Route::is('user.cartao') ? 'active' : '' }}">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Listar Cartão</h3>
                </a>
                <a href="{{ route('user.perfile') }}" class="{{ Route::is('user.profile') ? 'active' : '' }}">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Perfil</h3>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn-outline-danger" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                </form>
            </div>
        </aside>

        <div class="conta">
            <div class="card-container">
                <main>
                    <!-- Mensagem de Sucesso -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Lista de Cartões -->
                    <div class="container mt-4">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover table-bordered">
                                <thead class="text-center table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Titular</th>
                                        <th>Número do Cartão</th>
                                        <th>Expiração</th>
                                        <th>Tipo</th>
                                        <th>Status</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cards as $card)
                                        <tr>
                                            <td class="text-center">{{ $card->id }}</td>
                                            <td>{{ $card->cardHolder }}</td>
                                            <td>{{ $card->cardNumber }}</td>
                                            <td>{{ $card->expirationMonth }}/{{ $card->expirationYear }}</td>
                                            <td>{{ $card->type }}</td>
                                            <td class="text-center">
                                                <span class="badge rounded-pill {{ $card->status === 'Ativo' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $card->status }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editCardModal{{ $card->id }}">
                                                                Editar
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('cards.destroy', $card->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Deletar</button>
                                                            </form>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- Right Section -->
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
                        <img src="public/img/th.jpeg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="loo.png">
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

        <!-- Dependências do Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

        <!-- Estilos Personalizados -->
        <style>
            /* Tabela Geral */
            .table th {
                border-radius: 10px;
                background-color: #b0b0b0;
                color: #000000;
                text-transform: uppercase;
            }

            .table th, .table td {
                padding: 12px;
                text-align: center;
                vertical-align: middle;
            }

            /* Botões */
            .btn {
                border-radius: 50px;
                padding: 6px 12px;
                font-weight: bold;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 5px;
                transition: all 0.3s ease;
            }

            .btn-outline-warning:hover {
                background-color: #ffc107;
                color: #fff;
            }

            .btn-outline-danger:hover {
                background-color: #dc3545;
                color: #fff;
            }

            .btn-outline-primary:hover {
                background-color: #0d6efd;
                color: #fff;
            }

            /* Hover na Tabela */
            .table-hover tbody tr:hover {
                background-color: #f8f9fa;
                transition: background-color 0.3s ease;
            }
        </style>

        <script>
            document.querySelector('.card-number-input').oninput = () => {
                document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
            }

            document.querySelector('.card-holder-input').oninput = () => {
                document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
            }

            document.querySelector('.month-input').oninput = () => {
                document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
            }

            document.querySelector('.year-input').oninput = () => {
                document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
            }

            document.querySelector('.cvv-input').onmouseenter = () => {
                document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
                document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
            }

            document.querySelector('.cvv-input').onmouseleave = () => {
                document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
                document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
            }

            document.querySelector('.cvv-input').oninput = () => {
                document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
            }
        </script>
    </div>
</body>

</html>
