<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solicitarUser.css') }}">
    <title>Responsive Dashboard Design | User Form</title>
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
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="{{ route('user.perfile') }}">
                    <span class="active">
                        dashboard
                    </span>

                </a>
                <a href="{{ route('contas.index') }}" class="
                {{ Route::is('contas.index') ? 'active' : '' }}">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Solicitar Cartão</h3>
                </a>
               

                

                <a href="{{ route('user.cartao') }}"
                    class="{{ Route::is('user.cartao') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>listar Cartão</h3>
                </a>
                



                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn-outline-danger"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Logout
                    </a>
                </form>
            </div>

        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
         <!-- Mensagem de sucesso -->
       <!-- Main Content -->
<div class="solicita">
    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Formulário -->
    <form action="{{ route('solicitar.store') }}" method="POST">
        <h1 style="text-align: center">Solicitar Cartão</h1>
            @csrf
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <input type="email" name="email" placeholder="Digite seu email" required>
        <div class="form-row">
        <input type="text" name="telefone" placeholder="Digite seu telefone" required >
        <input type="text" name="nif" placeholder="Digite seu NIF" required>
        </div>
        <button type="submit">Solicitar</button>
    </form>



    <!-- Dados cadastrados -->

</div>



        <style>
            .solicita {
                background-color: white;
                padding: 20px;
                margin-left: 190px;
                margin-top: 50px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                height: 350px;
                max-width: 700px;
            }

            h2 {
                text-align: center;
                color: #333;
            }

            form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            input[type="text"],
            input[type="email"] {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
                width: 100%;
            }
            .form-row {
      display: flex;
      gap: 10px; /* Espaçamento entre os inputs */
    }
            button {
                padding: 10px;
                background-color: #512da8;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #714ec2;
            }

            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }

            table th, table td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }

            table th {
                background-color: #f8f9fa;
            }

            .success-message {
                color: green;
                text-align: center;
                margin-bottom: 20px;
            }
        </style>
        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Reza</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="img/th.jpeg" alt="Profile">
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
    </div>

    <script src="cartao.js"></script>
</body>

</html>
