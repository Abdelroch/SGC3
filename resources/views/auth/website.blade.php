<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website.css') }}">
    <title>Carteira Digital K-Pay</title>
</head>
<body>
    <div class="container">
        <nav>
             <ul class="nav__links nav__left">
                <li><a href="#" class="logo"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
            <ul class="nav__links nav__right">

                <li><a href="{{ route('login') }}">Login/Register</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </nav>
        <span class="letter-s">KP</span>
        <img src="{{ asset('img/CAR.png') }}" alt="cabeçalho">
        <h4 class="text__left"></h4>
        <h4 class="text__right">PAY</h4>
       <a href="{{ route('explore') }}" class="btn explore">Site Official</a>


        <footer class="footer">
            <p>Copyright © 2024 Web Design Mastery. Todos os direitos reservados.</p>
            <div class="footer__links">
                <li><a href="https://www.facebook.com/infosi.nacional">Facebook</a></li>
                <li><a href="https://www.instagram.com/infosi_angola/">Instagram</a></li>
                <li><a href="https://ao.linkedin.com/company/infosinacional">LinkedIn</a></li>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('website.js') }}"></script>

</body>
</html>
