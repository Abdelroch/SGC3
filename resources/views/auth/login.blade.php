<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="Login.css">
    <title>Kwanza Pay</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <!-- Registro -->
            <form method="POST" action="{{ route('dashboard.register.user.store') }}">
                @csrf
                <h1>Criar Conta</h1>
                <div class="social-icons">
                    <a href="https://www.infosi.gov.ao" class="icon" target="_blank">
                     <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="https://www.facebook.com/infosi.nacional" class="icon" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://github.com" class="icon" target="_blank">
                    <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="https://ao.linkedin.com/company/infosinacional" class="icon" target="_blank">
                    <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
                <span>Ou use seu email para se registrar</span>
                <input type="text" id="name" name="name" placeholder="Nome" :value="old('name')" required autofocus>
                <input type="email" id="email" name="email" placeholder="Email" :value="old('email')" required>
                <input type="password" id="password" name="password" placeholder="Senha" required>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirmar Senha" required>
                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <!-- Login -->
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <h1>Fazer Login</h1>
                <div class="social-icons">
                     <a href="https://www.infosi.gov.ao" class="icon" target="_blank">
                     <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="https://www.facebook.com/infosi.nacional" class="icon" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://github.com" class="icon" target="_blank">
                    <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="https://ao.linkedin.com/company/infosinacional" class="icon" target="_blank">
                    <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
                <span>Ou use seu email e senha</span>

                <!-- Exibição de erros de validação -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                
                <!-- Campo de Email -->
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                    autofocus>
                <div id="emailError" class="error-message" style="color: red; display: none;">Por favor, insira um email
                    válido.</div>

                <!-- Campo de Senha -->
                <input type="password" id="password" name="password" placeholder="Senha" required minlength="8">
                <div id="passwordError" class="error-message" style="color: red; display: none;">A senha deve ter pelo
                    menos 8 caracteres.</div>

                <a href="{{ route('password.request') }}">Esqueceu sua Palavra Passe?</a>
                <button type="submit">Fazer Login</button>
            </form>

        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Olá, Financer!</h1>
                    <p>Insira seus dados pessoais para usar todos os recursos do site</p>
                    <button class="hidden" id="login">Fazer Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bem-vindo de Volta!</h1>
                    <p>Registre-se com seus dados pessoais para usar todos os recursos do site</p>
                    <!-- <button id="register">Cadastrar</button> -->

    
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Exemplo básico de estilo para alternar os formulários */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        .form-container {
            position: absolute;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.6s ease-in-out;
        }

        .container.right-panel-active .sign-up {
            transform: translateX(100%);
        }

        .container.right-panel-active .sign-in {
            transform: translateX(-100%);
        }

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .container p {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container span {
            font-size: 12px;
        }

        .container a {
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
        }


        button .h {
            color: #ffffff;
        }

        .container button {
            background-color: #FFB742;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }

        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }

        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background-color: #512da8;
            height: 100%;
            background: linear-gradient(to right, #5c6bc0, #512da8);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }
    </style>

    <script>
        const container = document.getElementById('container');
        const registerButton = document.getElementById('register');
        const loginButton = document.getElementById('login');

        registerButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        loginButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        document.getElementById('loginForm').addEventListener('submit', function (event) {
            let isValid = true;

            // Validação do Email
            const email = document.getElementById('email').value;
            const emailError = document.getElementById('emailError');
            if (!email || !email.includes('@')) {
                emailError.style.display = 'block';
                isValid = false;
            } else {
                emailError.style.display = 'none';
            }

            // Validação da Senha
            const password = document.getElementById('password').value;
            const passwordError = document.getElementById('passwordError');
            if (!password || password.length < 8) {
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Impede o envio do formulário se houver erros
            if (!isValid) {
                event.preventDefault();
            }
        });


    </script>
</body>

</html>
