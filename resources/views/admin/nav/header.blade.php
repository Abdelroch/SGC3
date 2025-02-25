<aside>
    <div class="toggle">
        <div class="logo">
            <img src="{{ asset('img\logo1-removebg-preview.png') }}" style="width:20vh; heigth:90vh;" alt="Logo">

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

        <!-- Link para Abertura de Conta -->
        <a href="{{ route('aberturas.index') }}" class="{{ Route::is('aberturas.index') ? 'active' : '' }}">
            <span class="material-icons-sharp">account_balance</span>
            <h3>Abertura Conta</h3>
        </a>

        <!-- Link para Solicitação -->
        <a href="{{ route('solicitacao.list') }}" class="{{ Route::is('solicitacao.list') ? 'active' : '' }}">
            <span class="material-icons-sharp">request_page</span>
            <h3>Solicitação</h3>
        </a>

        <!-- Link para Cartões -->
        <a href="{{ route('dashboard.listar.card') }}" class="{{ Route::is('dashboard.listar.card') ? 'active' : '' }}">
            <span class="material-icons-sharp">credit_card</span>
            <h3>Cartões</h3>
        </a>

        <!-- Link para Usuários -->
        <a href="{{ route('dashboard.listar.cliente') }}" class="{{ Route::is('dashboard.listar.cliente') ? 'active' : '' }}">
            <span class="material-icons-sharp">group</span>
            <h3>Usuários</h3>
        </a>

        <!-- Link para Visitantes -->
        <a href="#" class="#">
            <span class="material-icons-sharp">visibility</span>
            <h3>Visitantes</h3>
        </a>

        <!-- Link para Produtos -->
        <a href="#" class="#">
            <span class="material-icons-sharp">shopping_cart</span>
            <h3>Produtos</h3>
        </a>

        <!-- Link para Pagamentos -->
        <a href="#" class="#">
            <span class="material-icons-sharp">attach_money</span>
            <h3>Pagamentos</h3>
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
