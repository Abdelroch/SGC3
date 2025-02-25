<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <!-- Província -->
            <div class="mt-4">
                <x-label for="provincia" value="Província" />
                <select id="provincia" name="provincia" class="block w-full mt-1">
                    <option value="">Selecione uma província</option>
                    <option value="Bengo">Bengo</option>
                    <option value="Benguela">Benguela</option>
                    <option value="Bié">Bié</option>
                    <option value="Cabinda">Cabinda</option>
                    <option value="Cuando-Cubango">Cuando-Cubango</option>
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

            <!-- Município -->
            <div class="mt-4">
                <x-label for="municipio" value="Município" />
                <select id="municipio" name="municipio" class="block w-full mt-1">
                    <option value="">Selecione um município</option>
                </select>
            </div>

            <!-- Senha -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirmação da senha -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Campo oculto para accessId -->
            <input type="hidden" name="accessId" value="2">

            <!-- Botão de Registro -->
            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $('#provincia').on('change', function() {
                var provincia = $(this).val(); // Pega a província selecionada
                var municipios = []; // Inicializa a lista de municípios

                if (provincia === "Bengo") {
                    municipios = ["Ambriz", "Bula Atumba", "Dande", "Dembos", "Nambuangongo", "Pango Aluquém"];
                } else if (provincia === "Benguela") {
                    municipios = ["Balombo", "Baía Farta", "Benguela", "Bocoio", "Caimbambo", "Catumbela", "Chongorói",
                        "Cubal", "Ganda", "Lobito"
                    ];
                } else if (provincia === "Bié") {
                    municipios = ["Andulo", "Camacupa", "Catabola", "Chinguar", "Chitembo", "Cuemba", "Cunhinga",
                        "Cuíto", "Nharea"
                    ];
                } else if (provincia === "Cabinda") {
                    municipios = ["Belize", "Buco-Zau", "Cabinda", "Cacongo"];
                } else if (provincia === "Cuando-Cubango") {
                    municipios = ["Calai", "Cuangar", "Cuchi", "Cuito Cuanavale", "Dirico", "Mavinga", "Menongue",
                        "Nancova", "Rivungo"
                    ];
                } else if (provincia === "Cuanza Norte") {
                    municipios = ["Ambaca", "Banga", "Bolongongo", "Cambambe", "Cazengo", "Golungo Alto", "Gonguembo",
                        "Lucala", "Quiculungo", "Samba Caju"
                    ];
                } else if (provincia === "Cuanza Sul") {
                    municipios = ["Amboim", "Cassongue", "Cela", "Conda", "Ebo", "Libolo", "Mussende", "Porto Amboim",
                        "Quibala", "Quilenda", "Seles", "Sumbe"
                    ];
                } else if (provincia === "Cunene") {
                    municipios = ["Cahama", "Cuanhama", "Curoca", "Cuvelai", "Namacunde", "Ombadja"];
                } else if (provincia === "Huambo") {
                    municipios = ["Bailundo", "Cachiungo", "Caála", "Ecunha", "Huambo", "Londuimbali", "Longonjo",
                        "Mungo", "Chicala-Choloanga", "Chinjenje", "Ucuma"
                    ];
                } else if (provincia === "Huíla") {
                    municipios = ["Caconda", "Cacula", "Caluquembe", "Chiange", "Chibia", "Chicomba", "Chipindo",
                        "Cuvango", "Humpata", "Jamba", "Lubango", "Matala", "Quilengues", "Quipungo"
                    ];
                } else if (provincia === "Luanda") {
                    municipios = ["Belas", "Cacuaco", "Cazenga", "Ícolo e Bengo", "Luanda", "Quilamba Quiaxi",
                        "Quissama", "Talatona", "Viana"
                    ];
                } else if (provincia === "Lunda Norte") {
                    municipios = ["Cambulo", "Capenda-Camulemba", "Caungula", "Chitato", "Cuango", "Cuílo", "Lóvua",
                        "Lubalo", "Lucapa", "Xá-Muteba"
                    ];
                } else if (provincia === "Lunda Sul") {
                    municipios = ["Cacolo", "Dala", "Muconda", "Saurimo"];
                } else if (provincia === "Malanje") {
                    municipios = ["Cacuso", "Calandula", "Cambundi-Catembo", "Cangandala", "Caombo", "Cuaba Nzoji",
                        "Cunda-Dia-Baze", "Luquembo", "Malanje", "Marimba", "Massango", "Mucari", "Quela", "Quirima"
                    ];
                } else if (provincia === "Moxico") {
                    municipios = ["Alto Zambeze", "Bundas", "Camanongue", "Léua", "Luau", "Luacano", "Luchazes",
                        "Cameia", "Moxico"
                    ];
                } else if (provincia === "Namibe") {
                    municipios = ["Bibala", "Camucuio", "Moçâmedes", "Tômbua", "Virei"];
                } else if (provincia === "Uíge") {
                    municipios = ["Alto Cauale", "Ambuíla", "Bembe", "Buengas", "Bungo", "Damba", "Milunga", "Mucaba",
                        "Negage", "Puri", "Quimbele", "Quitexe", "Sanza Pombo", "Songo", "Uíge", "Zombo"
                    ];
                } else if (provincia === "Zaire") {
                    municipios = ["Cuimba", "Mabanza Congo", "Nóqui", "Nezeto", "Soyo", "Tomboco"];
                } else {
                    municipios = [];
                }

                // Atualiza o select de municípios
                $('#municipio').empty(); // Limpa os municípios atuais
                $('#municipio').append('<option value="">Selecione um município</option>');

                municipios.forEach(function(municipio) {
                    $('#municipio').append('<option value="' + municipio + '">' + municipio + '</option>');
                });
            });
        </script>

    </x-authentication-card>
</x-guest-layout>
