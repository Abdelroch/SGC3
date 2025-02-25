<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cartao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>Responsive Dashboard Design #1 | AsmrProg</title>

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
                    <h3>Cartões</h3>
                </a>
                <a href="{{ route('solicitar.index') }}" class="{{ Route::is('solicitar.index') ? 'active' : '' }}">
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

        <!-- End of Sidebar Section -->

        <!-- Main Content -->

        <div class="profile-section">
            <div class="profile-card">
                <!-- Foto de Perfil e Informações Básicas -->
                <div class="profile-header">
                    <div class="profile-photo">
                        <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('img/1.jpg') }}"
                            alt="Foto de Perfil">
                    </div>
                    <div class="profile-info">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                        <small class="text-muted">Nível de Acesso: {{ Auth::user()->accessId }}</small>
                    </div>
                </div>
        
                <!-- Detalhes da Conta -->
                <div class="profile-details">
                    <h3>Detalhes da Conta:</h3>
                    <table class="profile-table">
                        <tbody>
                            <tr>
                                <th>🔹 Nome</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>✉️ Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>🕒 Última Modificação</th>
                                <td>{{ Auth::user()->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>📅 Data de Criação</th>
                                <td>{{ Auth::user()->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        
                <!-- Botões -->
                <div class="profile-actions">
                    <button class="btn edit-btn">Editar Perfil</button>
                    <button class="btn password-btn">Alterar Senha</button>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button class="btn logout-btn" onclick="event.preventDefault(); this.closest('form').submit();">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
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







        <!-- End of Analyses -->

        <!-- New Users Section -->

        <!-- End of New Users Section -->

        <!-- Recent Orders Table -->


        <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->


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


    </div>

   

    <script src="{{ asset('js/cartao.js') }}"></script>
    <script src="{{ asset('js/cartao2.js') }}"></script>
</body>

</html>
