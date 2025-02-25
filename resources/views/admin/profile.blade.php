@extends('layouts.admin')

@section('content')
<style>
    .conta {
        padding: 30px;
        background-color: #f4f6fb;
        min-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-container {
        max-width: 750px;
        background: #ffffff;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        padding: 25px;
        min-height: 430px; /* Altura mínima aumentada */
        overflow: hidden;
    }

    .user-profile {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #ddd;
    }

    .profile-photo img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #007bff;
        box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.4);
        transition: transform 0.3s ease;
    }

    .profile-photo img:hover {
        transform: scale(1.1);
    }

    .profile-info h2 {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 5px;
    }

    .profile-info p,
    .profile-info small {
        font-size: 1rem;
        color: #555;
        margin: 5px 0;
    }

    .profile-details {
        margin-top: 20px;
    }

    .profile-details h3 {
        font-size: 1.4rem;
        color: #444;
        margin-bottom: 15px;
        text-align: center;
    }

    .details-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .details-table th,
    .details-table td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .details-table th {
        background-color: #f4f4f4;
        font-weight: bold;
        color: #333;
    }

    .details-table td {
        font-size: 1rem;
        color: #666;
    }

    .details-table .icon {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
        }

        .card-container {
            padding: 20px;
        }

        .details-table th,
        .details-table td {
            padding: 10px;
            font-size: 0.9rem;
        }
    }
</style>

 <div class="conta">
        <div class="card-container">
            <center>
                <main>
                    <div class="user-profile">
                        <div class="profile-header">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('img/default-profile.png') }}"
                                    alt="Foto de Perfil">
                            </div>
                            <div class="profile-info">
                                <h2>{{ Auth::user()->name }}</h2>
                                <p>{{ Auth::user()->email }}</p>
                                <small>Nível de Acesso: {{ Auth::user()->accessId }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="profile-details">
                        <h3>Detalhes da Conta:</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="icon">🔹Nome</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th class="icon">✉ Email</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th class="icon">🕒 Última Modificação</th>
                                    <td>{{ Auth::user()->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="icon">📅 Data de Criação</th>
                                    <td>{{ Auth::user()->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Botões para editar ou outras ações -->
                    <div class="buttons">
                        <button>Editar Perfil</button>
                        <button>Alterar Senha</button>
                    </div>
                </main>
            </center>
        </div>
    </div>

<style>

</style>

@endsection
