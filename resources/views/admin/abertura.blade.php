<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person_add" />
    <link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solicitarUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Abertura.css') }}">



    <title>Abertura</title>
</head>


<body>
    <div class="container">
        <!-- Sidebar Section -->
        @include('admin.nav.header')
        <div class="form-container">
            <!-- Imagem ao lado -->
            <div class="image-section">
                <img src="{{ asset('img/png2.jpeg') }}" alt="Imagem Lateral">

            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Formulário -->
            <form method="POST" action="{{ route('aberturas.store') }}" enctype="multipart/form-data">
                @csrf
                <h1>Abertura de conta </h1>

                <!-- Nome -->
                <div class="mb-4">
                    <label for="name" class="form-label" style="font-weight: bold; color: #333;">Nome</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                        required autofocus style="border: 1px solid; border-radius: 8px; padding: 10px;">
                    @error('name')
                        <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label" style="font-weight: bold; color: #333;">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                        required style="border: 1px solid; border-radius: 8px; padding: 10px;">
                    @error('email')
                        <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- NIF -->
                <div class="mb-4">
                    <label for="nif" class="form-label" style="font-weight: bold; color: #333;">NIF</label>
                    <input type="text" id="nif" name="nif" maxlength="20" class="form-control"
                        style="border: 1px solid; border-radius: 8px; padding: 10px;" required>
                    @error('nif')
                        <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flexbox">
                    <!-- Campo para Tipo -->
                    <div class="mb-3" style="flex: 1;">
                        <label for="provincia" class="form-label">Província</label>
                        <select id="provincia" name="provincia" class="form-select"
                            style="border: 1px solid; border-radius: 8px; padding: 10px; width: 100%;" required>
                            <option value="" disabled selected>Selecione a Província</option>
                            <option value="Bengo">Bengo</option>
                            <option value="Benguela">Benguela</option>
                            <option value="Bié">Bié</option>
                            <option value="Cabinda">Cabinda</option>
                            <option value="Cuando Cubango">Cuando Cubango</option>
                            <option value="Cuanza Norte">Cuanza Norte</option>
                            <option value="Cuanza Sul">Cuanza Sul</option>
                            <option value="Cunene">Cunene</option>
                            <option value="Huambo">Huambo</option>
                            <option value="Huíla">Huíla</option>
                            <option value="Luanda">Luanda</option>
                            <option value="Lunda Norte">Lunda Norte</option>
                            <option value="Lunda Sul">Lunda Sul</option>
                            <option value="Malanje">Malanje</option>
                            <option value="Moxico">Moxico</option>
                            <option value="Namibe">Namibe</option>
                            <option value="Uíge">Uíge</option>
                            <option value="Zaire">Zaire</option>
                        </select>
                    </div>

                    <!-- Telefone -->
                    <div class="mb-4" style="flex: 1;">
                        <label for="telefone" class="form-label"
                            style="font-weight: bold; color: #333;">Telefone</label>
                        <input id="telefone" class="form-control" type="number" name="telefone" required
                            style="border: 1px solid; border-radius: 8px; padding: 10px; width: 100%;">
                    </div>
                </div>

                <!-- Upload de Arquivos -->
             <!--   <div class="mb-3 d-flex justify-content-between align-items-start" style="gap: 20px;">
                    <!-- Upload de Imagem 
                    <div style="flex: 1;">
                        <label for="imagem" class="upload">Imagem</label>
                        <input type="file" id="imagem" name="imagem" class="form-control file-input"
                            accept="image/*" required onchange="showFileName(this, 'file-name-imagem')">
                        <div id="file-name-imagem" class="file-name"></div>
                    </div> -->

                    <!-- Upload de Documento 
                    <div style="flex: 1;">
                        <label for="documento" class="upload">Documento</label>
                        <input type="file" id="documento" name="documento" class="form-control file-input"
                            accept=".pdf,.doc,.docx,.txt" required
                            onchange="showFileName(this, 'file-name-documento')">
                        <div id="file-name-documento" class="file-name"></div>
                    </div>
                </div>

                <!-- Botão -->
                <button type="submit" class="btn btn-primary">Criar conta</button>

            </form>



        </div>
        <div class="right-section">
            <div class="nav"><button id="menu-btn"><span class="material-icons-sharp">menu </span></button>
                <div class="dark-mode"><span class="material-icons-sharp active">light_mode </span><span
                        class="material-icons-sharp">dark_mode </span></div>
                <div class="profile">
                    <div class="info">
                        <p>Hey,
                            <b>Reza</b>
                        </p><small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo"><img src="{{ asset('img/th.jpeg') }}">
                    </div>
                </div>
            </div>

            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="{{ asset('loo.png') }}">
                    <h2>Kwanza Pay</h2>
                    <p>Fullstack Web Developer</p>
                </div>
            </div>
            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2><span class="material-icons-sharp">notifications_none </span>
                </div>
                <div class="notification">
                    <div class="icon"><span class="material-icons-sharp">volume_up </span></div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3><small class="text_muted">08:00 AM - 12:00 PM </small>
                        </div><span class="material-icons-sharp">more_vert </span>
                    </div>
                </div>
                <div class="notification deactive">
                    <div class="icon"><span class="material-icons-sharp">edit </span></div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3><small class="text_muted">08:00 AM - 12:00 PM </small>
                        </div><span class="material-icons-sharp">more_vert </span>
                    </div>
                </div>
                <div class="notification add-reminder">
                    <div><span class="material-icons-sharp">add </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/Abertura.js') }}"></script>
</body>

</html>
