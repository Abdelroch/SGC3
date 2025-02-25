<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/explore.css') }}">
    <title>Personal Portfolio #04 | AsmrProg</title>

   <script type="text/javascript">
        function googleTranslateInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'pt',
                includedLanguages: 'en,fr,es,de',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function loadGoogleTranslateScript() {
            if (!document.getElementById("google-translate-script")) {
                var script = document.createElement("script");
                script.id = "google-translate-script";
                script.type = "text/javascript";
                script.src = "//translate.google.com/translate_a/element.js?cb=googleTranslateInit";
                document.body.appendChild(script);
            }
        }

        function toggleLanguageMenu() {
            var menu = document.getElementById("language-menu");
            menu.classList.toggle("show");
        }

        function changeLanguage(lang) {
            var select = document.querySelector(".goog-te-combo");
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event("change"));
            }
        }
    </script>
</head>

<body>

    <div class="navbar">
        <h2>
            <a href="{{ route('home') }}">
                <img src="img/logo1-removebg-preview.png" alt="Kwanza Pay" style="height:350px;">
            </a>
        </h2>

        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#servicos">Serviços</a></li>
            <li><a href="#somos">Quem somos</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Sobre nós</a></li>
        </ul>
        <button class="hire-btn" onclick="loadGoogleTranslateScript()">Idioma</button>

    </div>
    <div id="google_translate_element" style="margin: 20px;"></div>

    <div class="main">
        <h4>Olá, Economistas <span>Kwanza Pay</span> 👋</h4>
        <p class="title">A sua Carteira Digital</p>
        <p class="subtitle">Uma boa gestão financeira não se resume a cortar gastos</p>
        <div class="image-container">
            <img src="img/capa2.webp" alt="Image">
            <img src="img/header.png" alt="Header">
        </div>

    </div>

    <div class="guarantee">
        <div class="item">
            <div class="icon">
                <i class='bx bx-check-shield'></i>
            </div>
            <div class="info">

                <h3>+10.000</h3>
                

                <p>Contas Abertas</p>
            </div>
            <i class='bx '></i>
        </div>
        <div class="item">
            <div class="icon">
                <i class='bx bx-check-circle'></i>
            </div>
            <div class="info">
                <h3>+100</h3>
                <p>Cartões entregues</p>


            </div>
            <i class='bx '></i>
        </div>
        <div class="item">
            <div class="icon">
                <i class='bx bx-laugh'></i>
            </div>
            <div class="info">
                <h3>+70</h3>
                <p>Clientes Satisfeitos</p>
            </div>
            <i class='bx '></i>
        </div>
    </div>

    <div id="servicos">
    <h5 class="seprator">Serviços</h5>
    <div class="servicos">

        <div class="right">
            <div class="service-cards">
                <div class="card">
                    <img src="img/image1.avif" alt="Serviço 1">
                    <h4>Consultoria Financeira</h4>
                    <p>Oferecemos suporte para gestão financeira e planejamento estratégico.</p>
                </div>
                <div class="card">
                    <img src="img/image2.webp" alt="Serviço 2">
                    <h4>Pagamentos Digitais</h4>
                    <p>Facilitamos transações online seguras e eficientes.</p>
                </div>
                <div class="card">
                    <img src="img/image3.jpg" alt="Serviço 3">
                    <h4>Gestão de Investimentos</h4>
                    <p>Auxiliamos no crescimento do seu patrimônio de forma segura.</p>
                </div>
                <div class="card">
                    <img src="img/image4.jpg" alt="Serviço 2">
                    <h4>Pagamentos Digitais</h4>
                    <p>Facilitamos transações online seguras e eficientes.</p>
                </div>
            </div>
        </div>
    </div>
   </div>

<div id="somos" >
    <h5 class="seprator">Quem somos</h5>

    <div class="about">
        <img src="img/image.png">
        <div class="info">
            <h3>Sobre Nós</h3>
            <p>"A vida é feita de escolhas e desafios. Cada dia nos oferece novas oportunidades para aprender, crescer e evoluir. Às vezes, enfrentamos dificuldades, mas são nesses momentos que descobrimos nossa verdadeira força. O importante é seguir em frente, mantendo a determinação e a esperança. Com esforço e dedicação, tudo pode ser conquistado. O caminho pode não ser fácil, mas cada passo nos aproxima dos nossos objetivos. No final, o que realmente importa é a jornada e as lições que aprendemos ao longo dela."
            </p>
            <button   onclick="window.location.href='{{ route('login') }}'" class="hire-btn">Saber Mais</button>
        </div>
    </div>
</div>

    <h5 class="seprator">Ferramentas</h5>

    <div class="skills">
        <div class="left">
            <div class="info">
                <h3>As nossas Ferramentas </h3>
                <p>
                    No mundo do desenvolvimento de software, a escolha das ferramentas certas pode fazer toda a diferença na produtividade, na escalabilidade e na experiência do usuário. Entre as tecnologias que utilizamos, destacam-se Laravel, React Native , cada uma desempenhando um papel crucial no ecossistema de desenvolvimento moderno.
                </p>
            </div>
            
        </div>

        <div class="right">
            <div class="item">
                <i class='bx bxl-html5'></i>
            </div>
            <div class="item">
                <i class='bx bxl-css3'></i>
            </div>
            <div class="item">
                <i class='bx bxl-typescript'></i>
            </div>
            <div class="item">
                <i class='bx bxl-git'></i>
            </div>
            <div class="item">
                <i class='bx bxl-bootstrap'></i>
            </div>
            <div class="item">
                <i class='bx bxl-php'></i>
            </div>
            <div class="item">
                <i class='bx bxl-sass'></i>
            </div>
            <div class="item">
                <i class='bx bxl-tailwind-css'></i>
            </div>
            <div class="item">
                <i class='bx bxl-mongodb'></i>
            </div>
            <div class="item">
                <i class='bx bxl-graphql'></i>
            </div>
            <div class="item">
                <i class='bx bxl-jquery'></i>
            </div>
            <div class="item">
                <i class='bx bxl-angular'></i>
            </div>
        </div>

    </div>

    <footer>
        <div class="start">
            <h3>Abrir uma conta</h3>
            <p>"Está interessado em ter uma conta Pay? Junte-se a nós hoje mesmo e aproveite todas as vantagens que temos para oferecer!" </p>
        <button onclick="window.location.href='{{ route('login') }}'" class="btn login">Vamos lá</button>

        </div>

        <div class="cols">
            <div class="about-col">
                <h3>KwanzaPay.</h3>
                <p>Carteira Digital</p>
            </div>

            <div class="links-col">
                <h4>Links Rapidos</h4>
                <a href="#">Incio</a>
                <a href="#">Serviços</a>
                <a href="#">Quem somos</a>
                <a href="#">Contacto</a>
                <a href="#">Sobre nós</a>
            </div>

            <div class="links-col">
                <h4>Redes Sociais</h4>
                <a href="https://www.facebook.com/infosi.nacional">Facebook</a>
                <a href="https://www.instagram.com/infosi_angola/">Instagram</a>
                <a href="https://ao.linkedin.com/company/infosinacional">LinkedIn</a>
                <a href="https://youtu.be/KuVgqmOqbrQ?si=CzIKUjintz-1Rxip">YouTube</a>
                <a href="https://github.com">GitHub</a>
            </div>

            <div class="news-col">
                <h4>NewsLetter</h4>
                <p>Enter your email and get notified about news, of.</p>

                <form>
                    <input type="email" placeholder="Your email address">
                    <button><i class='bx bxl-telegram'></i></button>
                </form>

            </div>

        </div>

    </footer>

</body>

</html>
