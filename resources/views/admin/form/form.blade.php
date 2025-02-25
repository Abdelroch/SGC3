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
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
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
                            this.value = this.value.slice(0,4); // Limita a 5 dígitos
                        }
                    });
                </script>

            </div>
        </div>
        <div class="inputBox">
            <span>Type</span>
            <select type="text" name="type" required>
                <option value="virtual">Virtual</option>
                <option value="physical">Physical</option>
            </select>
        </div>
        <div class="inputBox">
            <span>Status</span>
            <select type="text" name="status" required>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
    </form>


</div>



