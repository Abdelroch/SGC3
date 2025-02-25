<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person_add" />
    <link rel="stylesheet" href="{{ asset('css/contas.css') }}">
    <title>Responsive Dashboard Design #1 | AsmrProg</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        @include('admin.nav.header')
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="{{ route('solicitar.store') }}" method="POST" onsubmit="return validateForm()">
                        <h1 style="text-align: center">Solicitar Cartão</h1>
                        @csrf
                        <input type="text" name="nome" placeholder="Digite seu nome" required>
                        <input type="email" name="email" placeholder="Digite seu email" required>
                        <div class="form-row">
                            <input type="text" name="telefone" placeholder="Digite seu telefone" required>
                            <input type="text" name="nif" placeholder="Digite seu NIF" required>
                        </div>
                        <div class="form-row">
                            <input type="number" name="pay" placeholder="Digite o valor da sua conta" required
                                class="pay" id="valorConta" min="0">
                            <label>
                                <div class="inputBox">
                                    <select name="valor" id="selectValor" placeholder="Descrição" required>
                                        <option value="visa">Visa</option>
                                        <option value="kamba">Kamba</option>
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
                            <h1>10,000 kz</h1>
                        </div>
                    </div>
                </div>
                <div class="visits openModal" id="cardKamba">
                    <img src="{{ asset('img/cartao visa.png') }}" alt="Cartão Visa">
                    <div class="status">
                        <div class="info">
                            <h3>Saldo Total</h3>
                            <h1>20,000 Kz</h1>
                        </div>
                    </div>
                </div>
                <div class="searches openModal" id="cardGold">
                    <img src="{{ asset('img/cartao gold.png') }}" alt="Cartão Gold">
                    <div class="status">
                        <div class="info">
                            <h3>Saldo Total</h3>
                            <h1>30,000 kz</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of Analyses -->

            <!-- New Users Section -->





            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Recente</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Numero</th>
                            <th>Pagamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

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


    </div>


    <script>
        const modal = document.getElementById("myModal");
        const closeBtn = document.querySelector(".close");
        const selectElement = document.getElementById("selectValor");
        const valorConta = document.getElementById("valorConta");
        const aviso = document.getElementById("aviso");

        // Função para abrir a modal com a opção predefinida
        function openModalWithPredefinedValue(value) {
            selectElement.value = value; // Define o valor no select
            selectElement.disabled = true; // Desativa o select

            // Ajusta o valor mínimo e máximo de acordo com o cartão
            if (value === "visa") {
                valorConta.min = 10000;
                valorConta.max = 49000;
            } else if (value === "kamba") {
                valorConta.min = 50000;
                valorConta.max = 199999;
            } else if (value === "gold") {
                valorConta.min = 200000;
                valorConta.max = 300000;
            }

            aviso.style.display = "none"; // Oculta o aviso
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

        // Função para habilitar o select antes de enviar o formulário
        function validateForm() {
            selectElement.disabled = false; // Habilita o select para que ele seja enviado
            checkValue(); // Valida o valor inserido

            if (aviso.style.display === "block") {
                return false; // Impede o envio se houver um aviso
            }

            return true; // Permite o envio
        }
    </script>



    <script src="dashboard.js"></script>
    <script src="dashboard2.js"></script>
</body>

</html>
