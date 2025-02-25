<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contas.css') }}">
    <title>Responsive Dashboard Design #1 | AsmrProg</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="{{ asset('bai.png') }}" alt="Logo">
                    <h2>Kwanza<span class="danger">Pay</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <!-- Link para o Dashboard -->
                <a href="{{ route('dashboard.home') }}" class="{{ Route::is('dashboard.home') ? 'active' : '' }}">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                
                <a href="{{ route('abertura.show') }}" 
                class="{{ Route::is('abertura.show') ? 'active' : '' }}">
                <span class="material-icons-sharp">insights</span>
                <h3>Abertura Conta</h3>
              <!-- Link para Listar Cartões -->
                <a href="{{ route('dashboard.listar.card') }}" class="{{ Route::is('dashboard.listar.card') ? 'active' : '' }}">
                    <span class="material-icons-sharp">credit_card</span>
                    <h3> Cartões</h3>
                </a>

               <!-- Link para Listar Clientes -->
                <a href="{{ route('dashboard.listar.cliente') }}"
                    class="{{ Route::is('dashboard.listar.cliente') ? 'active' : '' }}">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Clientes</h3>
                </a>

             <a href="{{ route('dashboard.home') }}" class="{{ Route::is('dashboard.home') ? 'active' : '' }}">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Perfil</h3>
                </a> 

                

              {{--   <a href="{{ route('visa.index') }}" class="{{ Route::is('visa.index') ? 'active' : '' }}">
                    <span class="material-icons-sharp">credit_card</span>
                    <h3>Visa</h3>
                </a>  --}}




               

         {{--        <a href="{{ route('solicitacao.list') }}" class="{{ Route::is('solicitacao.list') ? 'active' : '' }}"> --}}

  {{-- <a href="{{ route('dashboard.home') }}" class="{{ Route::is('dashboard.home') ? 'active' : '' }}">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Perfil</h3>
                </a> --}}


                <a href="{{ route('solicitacao.list') }}" class="{{ Route::is('solicitacao.list') ? 'active' : '' }}">

                    <span class="material-icons-sharp">settings</span>
                    <h3>Pedidos</h3>
                </a>

                <!-- Botão de Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Logout</h3>
                    </a>
                </form>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
      <!-- Modal -->
      <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- Conteúdo da modal -->
            <form action="{{ route('solicitar.store') }}" method="POST">
                <h1 style="text-align: center">Solicitar Cartão</h1>
                @csrf
                <input type="text" name="nome" placeholder="Digite seu nome" required>
                <input type="email" name="email" placeholder="Digite seu email" required>
                <div class="form-row">
                    <input type="text" name="telefone" placeholder="Digite seu telefone" required>
                    <input type="text" name="nif" placeholder="Digite seu NIF" required>
                </div>
                <div class="form-row">
                    <input type="text" name="pay" placeholder="Digite o valor da sua conta" required class="pay" id="valorConta">
                    <label>
                        <div class="inputBox">
                            <select name="valor" placeholder="Descrição" required disabled>
                                <option value="visa">Classic</option>
                                <option value="kamba">Platium</option>
                                <option value="gold">Gold</option>
                            </select>
                        </div>
                    </label>
                </div>
                <!-- Mensagem de aviso -->
                <div id="aviso" style="color: red; display: none;">
                    <p>Não tem valor suficiente para ter este cartão.</p>
                </div>
                <button type="submit">Solicitar</button>
            </form>
        </div>
    </div>



<!-- Cartões -->
<h1 style="text-align: center">CARTÕES</h1>
<div class="analyse">
    <div class="sales openModal" id="cardVisa">
        <img src="{{ asset('img/cartao bai.png') }}" alt="Cartão BAI">
        <div class="status">
            <div class="info">
                <h3>Saldo Total</h3>
                <h1>65,024 kz</h1>
            </div>
        </div>
    </div>
    <div class="visits openModal" id="cardKamba">
        <img src="{{ asset('img/cartao visa.png') }}" alt="Cartão Visa">
        <div class="status">
            <div class="info">
                <h3>Saldo Total</h3>
                <h1>20,981 USD</h1>
            </div>
        </div>
    </div>
    <div class="searches openModal" id="cardGold">
        <img src="{{ asset('img/cartao gold.png') }}" alt="Cartão Gold">
        <div class="status">
            <div class="info">
                <h3>Saldo Total</h3>
                <h1>14,147 kz</h1>
            </div>
        </div>
    </div>
</div>

            <!-- End of Analyses -->

            <!-- New Users Section -->





            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="#">Show All</a>
            </div>
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
                        <img src="images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="loo.png">
                    <h2>Finance Manager</h2>
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


<script>const modal = document.getElementById("myModal");
    const closeBtn = document.querySelector(".close");
    const selectElement = document.querySelector('select[name="valor"]');
    const valorConta = document.getElementById("valorConta");
    const aviso = document.getElementById("aviso");

    // Função para abrir a modal com a opção predefinida
    function openModalWithPredefinedValue(value) {
        selectElement.value = value; // Define o valor no select
        selectElement.disabled = true; // Desativa o select

        // Ajusta o valor mínimo e máximo de acordo com o cartão
        if (value === "classico") {
            valorConta.min = 20000;
            valorConta.max = 9999;
        } else if (value === "Platium") {
            valorConta.min = 100000;
            valorConta.max = 299999;
        } else if (value === "gold") {
            valorConta.min = 300000;
            valorConta.max = 10000000;
        }

        // Limpa a mensagem de aviso
        aviso.style.display = "none";

        modal.style.display = "block"; // Exibe a modal
    }

    // Adiciona eventos de clique para os cartões
    document.querySelectorAll(".openModal").forEach((card) => {
        card.addEventListener("click", (event) => {
            const cardId = event.currentTarget.id;

            if (cardId === "cardVisa") openModalWithPredefinedValue("visa");
            if (cardId === "cardKamba") openModalWithPredefinedValue("kamba");
            if (cardId === "cardGold") openModalWithPredefinedValue("gold");
        });
    });

    // Função para verificar se o valor inserido é válido
    function checkValue() {
        const value = parseFloat(valorConta.value);
        const min = parseFloat(valorConta.min);
        const max = parseFloat(valorConta.max);

        // Exibe o aviso apenas se o valor for menor que o mínimo ou maior que o máximo
        if (value < min) {
            aviso.style.display = "block";
            aviso.textContent = `O valor mínimo permitido para este cartão é ${min}.`;
        } else if (value > max) {
            aviso.style.display = "block";
            aviso.textContent = `O valor máximo permitido para este cartão é ${max}.`;
        } else {
            aviso.style.display = "none"; // Oculta o aviso para valores válidos
        }
    }

    // Valida o valor ao digitar
    valorConta.addEventListener("input", checkValue);

    // Evento de fechar a modal ao clicar no botão de fechar
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Fechar a modal ao clicar fora da área de conteúdo (no fundo da modal)
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    </script>



    <script src="dashboard.js"></script>
    <script src="dashboard2.js"></script>
</body>

</html>
