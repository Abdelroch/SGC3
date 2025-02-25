@extends('layouts.admin')

@section('content')

<style>
    /* Estilo geral para o layout */
    .form-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin: 20px auto;
        max-width: 900px;
        padding: 70px;
        border-radius: 15px;
        background: #ffffff;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
        font-family: 'Poppins', sans-serif;
    }

    .form-container .image-section {
        flex: 1;
        max-width: 300px;
        text-align: center;
    }

    .form-container .image-section img {
        width: 400px;
        margin-left: -30px;
        height: auto;
        border-radius: 10px;
    }

    .form-container form {
        flex: 2;
        max-width: 500px;
        width: 100%;
    }

    /* Estilo do formulário */
    form h1 {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    button {
        width: 100%;
        padding: 15px;
        background: #28a745;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        background: #a49751;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .form-container {
            flex-direction: column;
        }
    }
</style>



@section('profile', 'active')
<div class="form-container">
    <!-- Imagem ao lado -->
    <div class="image-section">
        <img src="{{ asset('img/images.png2.avif') }}" alt="Imagem Lateral" >

    </div>
    
    <!-- Formulário -->
    <form method="POST" action="{{ route('dashboard.register.user.store') }}">
        @csrf
        <h1>Criar Novo Usuário</h1>

         <!-- Nome -->
         <div class="mb-4">
            <label for="name" class="form-label"
                style="font-weight: bold; color: #333;">Nome</label>
            <input id="name" class="form-control" type="text" name="name"
                value="{{ old('name') }}" required autofocus
                style="border: 1px solid ; border-radius: 8px; padding: 10px;">
            @error('name')
                <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
            @enderror
        </div>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="form-label"
                style="font-weight: bold; color: #333;">Email</label>
            <input id="email" class="form-control" type="email" name="email"
                value="{{ old('email') }}" required
                style="border: 1px solid ; border-radius: 8px; padding: 10px;">
            @error('email')
                <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
            @enderror
        </div>

         <!-- Tipo de Acesso -->
         <div class="mb-4">
            <label for="accessId" class="form-label" style="font-weight: bold; color: #333;">Tipo de
                Acesso</label>
            <select id="accessId" name="accessId" class="form-select" required
                style="border: 1px solid ; border-radius: 8px; padding: 10px;">
                <option value="">Selecione o tipo de acesso</option>
                @foreach ($accessLevels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
            @error('accessId')
                <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
            @enderror
        </div>


        <div class="flexbox">
            <div class="mb-4">
                <label for="provincia" class="form-label"
                    style="font-weight: bold; color: #333;">Província</label>
                <select id="provincia" name="provincia" class="form-select" required
                    style="border: 1px solid ; border-radius: 8px; padding: 10px;">
                    <option value="">Selecione uma província</option>
                    <!-- Lista de províncias -->
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

            <div class="mb-4">
                <label for="municipio" class="form-label"
                    style="font-weight: bold; color: #333; margin-right: 10px;" >Município</label>
                <select id="municipio" name="municipio" class="form-select" required
                    style="border: 1px solid ; border-radius: 8px; padding: 10px; margin-right: 50px;" >
                    <option value="">Selecione um município</option>
                </select>
            </div>
        </div>
        <div class="flexbox"> 
       <!-- Senha -->
       <div class="mb-4">
        <label for="password" class="form-label"
            style="font-weight: bold; color: #333; margin-right: 50px;" >Senha</label>
        <input id="password" class="form-control" type="password" name="password" required
            style="border: 1px solid ; border-radius: 8px; padding: 10px;">
        @error('password')
            <div class="text-danger" style="font-size: 0.9rem;">{{ $message }}</div>
        @enderror
    </div>

         <!-- Confirmação da Senha -->
         <div class="mb-4">
            <label for="password_confirmation" class="form-label"
                style="font-weight: bold; color: #333; " >Confirme a Senha</label>
            <input id="password_confirmation" class="form-control" type="password"
                name="password_confirmation" required
                style="border: 1px solid ; border-radius: 8px; margin-right: 50px; padding: 10px;">
        </div>
    </div>
        <!-- Botão -->
        <button type="submit">Criar Usuário</button>
    </form>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var togglePasswordIcon = document.getElementById("toggle-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";  // Torna visível
            togglePasswordIcon.textContent = "🙈";  // Ícone de olho fechado
        } else {
            passwordField.type = "password";  // Torna oculto novamente
            togglePasswordIcon.textContent = "👁️";  // Ícone de olho aberto
        }
    }


    const municipiosPorProvincia = {
        "Bengo": ["Ambriz", "Bula Atumba", "Dande", "Dembos", "Nambuangongo", "Pango Aluquém"],
        "Benguela": ["Balombo", "Baía Farta", "Benguela", "Bocoio", "Caimbambo", "Catumbela", "Chongoroi", "Cubal",
            "Ganda", "Lobito"
        ],
        "Bié": ["Andulo", "Camacupa", "Catabola", "Chinguar", "Chitembo", "Cuemba", "Cunhinga", "Kuito"],
        "Cabinda": ["Belize", "Buco Zau", "Cabinda", "Cacongo"],
        "Cuando Cubango": ["Calai", "Cuangar", "Cuchi", "Cuito Cuanavale", "Dirico", "Mavinga", "Menongue",
            "Nancova", "Rivungo"
        ],
        "Cuanza Norte": ["Ambaca", "Banga", "Bolongongo", "Cambambe", "Cazengo", "Golungo Alto", "Gonguembo",
            "Lucala", "Quiculungo", "Samba Cajú"
        ],
        "Cuanza Sul": ["Amboim", "Cassongue", "Cela", "Conda", "Ebo", "Libolo", "Mussende", "Porto Amboim",
            "Quibala", "Quilenda", "Seles", "Sumbe"
        ],
        "Cunene": ["Cahama", "Cuanhama", "Curoca", "Cuvelai", "Namacunde", "Ombadja"],
        "Huambo": ["Bailundo", "Caála", "Catchiungo", "Ecunha", "Huambo", "Londuimbali", "Longonjo", "Mungo",
            "Tchicala Tcholohanga", "Ucuma"
        ],
        "Huíla": ["Caconda", "Caluquembe", "Chiange", "Chibia", "Chicomba", "Chipindo", "Cuvango", "Humpata",
            "Jamba", "Lubango", "Matala", "Quilengues", "Quipungo"
        ],
        "Luanda": ["Belas", "Cacuaco", "Cazenga", "Ícolo e Bengo", "Luanda", "Quilamba Quiaxi", "Quissama",
            "Talatona", "Viana"
        ],
        "Lunda Norte": ["Cambulo", "Capenda Camulemba", "Caungula", "Chitato", "Cuango", "Cuilo", "Lubalo",
            "Lucapa", "Shinjenje"
        ],
        "Lunda Sul": ["Cacolo", "Dala", "Muconda", "Saurimo"],
        "Malanje": ["Cacuso", "Calandula", "Cambundi-Catembo", "Cangandala", "Caombo", "Cuaba Nzogo",
            "Cunda-Dia-Baze", "Luquembo", "Malanje", "Marimba", "Massango", "Mucari", "Quela", "Quirima"
        ],
        "Moxico": ["Alto Zambeze", "Bundas", "Camanongue", "Léua", "Luau", "Luacano", "Luchazes", "Lumege",
            "Moxico"
        ],
        "Namibe": ["Bibala", "Camucuio", "Moçâmedes", "Tômbwa", "Virei"],
        "Uíge": ["Alto Cauale", "Ambuíla", "Bembe", "Buengas", "Damba", "Macocola", "Mucaba", "Negage", "Puri",
            "Quimbele", "Quitexe", "Sanza Pombo", "Songo", "Uíge", "Zombo"
        ],
        "Zaire": ["Cuimba", "M'banza Congo", "Nóqui", "Nzeto", "Soyo", "Tomboco"]
    };

    document.getElementById('provincia').addEventListener('change', function () {
        const provinciaSelecionada = this.value;
        const municipios = municipiosPorProvincia[provinciaSelecionada] || [];
        const municipioSelect = document.getElementById('municipio');

        municipioSelect.innerHTML = '<option value="">Selecione um município</option>';
        municipios.forEach(municipio => {
            municipioSelect.innerHTML += `<option value="${municipio}">${municipio}</option>`;
        });
    });
</script>

@endsection
