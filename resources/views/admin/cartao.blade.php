<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cartao.css') }}">
    <title>Responsive Dashboard Design #1 | AsmrProg</title>
</head>

<body>

    <div class="container">

        <!-- Sidebar Section -->
        @include('admin.nav.header')
        <!-- End of Sidebar Section -->

        <!-- Main Content -->


        <div class="conta">

            <div class="card-container">

                <div class="front">
                    <div class="image">
                        <img src="{{ asset('img/loo.png') }}">
                        <img src="{{ asset('img/visa.png') }}">
                    </div>
                    <div class="card-number-box">################</div>
                    <div class="flexbox">
                        <div class="box">
                            <span>card holder</span>
                            <div class="card-holder-name">full name</div>
                        </div>
                        <div class="box">
                            <span>expires</span>
                            <div class="expiration">
                                <span class="exp-month">mm</span>
                                <span class="exp-year">yy</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"></div>
                        <img src="img/visa.png" alt="">
                    </div>
                </div>

            </div>



            <form class="mt-" action="{{ route('dashboard.store') }}" method="POST">
                @csrf
                <div class="mb-3 inputBox">
                    <span>Card Number</span>
                    <input type="text" maxlength="16" name="cardNumber" class="card-number-input" required>
                </div>
                <div class="inputBox">
                    <span>Selecionar o usuário:</span>
                    <select type="text" name="cardHolder" class="card-holder-input" required>
                        <option value="" disabled selected>Escolha um usuário</option>
                        @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flexbox">
                    <div class="inputBox">
                        <span>Expiration MM</span>
                        <select type="text" name="expirationMonth" class="month-input" required>
                            <option value="" disabled selected>Month</option>
                            @for ($i = 1; $i <= 12; $i++) <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d',
                                $i) }}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Expiration YY</span>
                        <select type="number" name="expirationYear" class="year-input" required>
                            <option value="" disabled selected>Year</option>
                            @for ($i = now()->year; $i <= now()->year + 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>CVV</span>
                        <input type="number" id="numberInput" maxlength="4" name="cvv" class="cvv-input" required>

                        <script>
                            const input = document.getElementById('numberInput');
                            input.addEventListener('input', function () {
                                if (this.value.length > 4) {
                                    this.value = this.value.slice(0, 4); // Limita a 5 dígitos
                                }
                            });
                        </script>

                    </div>
                </div>
                <div class="inputBox">
                    <span>Tipo</span>
                    <select type="text" name="type" required>
                        <option value="virtual">Virtual</option>
                        <option value="physical">Fisico</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Status</span>
                    <select type="text" name="status" required>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <input type="submit" value="Criar Cartão" class="submit-btn">
            </form>


        </div>














        <!-- End of Analyses -->

        <!-- New Users Section -->

        <!-- End of New Users Section -->

        <!-- Recent Orders Table -->


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
                    <img src="loo.png">
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

        document.querySelector('.card-number-input').oninput = () => {
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
        }

        document.querySelector('.card-holder-input').oninput = () => {
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
        }

        document.querySelector('.month-input').oninput = () => {
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
        }

        document.querySelector('.year-input').oninput = () => {
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        }

        document.querySelector('.cvv-input').onmouseenter = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        }

        document.querySelector('.cvv-input').onmouseleave = () => {
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        }

        document.querySelector('.cvv-input').oninput = () => {
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
        }

    </script>
    <script src="{{ asset('js/cartao.js') }}"></script>
    <script src="{{ asset('js/cartao2.js') }}"></script>
</body>

</html>
