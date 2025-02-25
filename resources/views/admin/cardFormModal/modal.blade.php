<div class="mb-3">
    <label for="cardNumber" class="form-label">Card Number</label>
    <input type="text" name="cardNumber" id="card_number" class="form-control" value="{{ $card->cardNumber ?? '' }}" required>
</div>
<div class="mb-3">
    <label for="cvv" class="form-label">CVV</label>
    <input type="number" name="cvv" id="cvv" class="form-control" value="{{ $card->cvv ?? '' }}" required>
</div>
<div class="mb-3">
    <label for="cardHolder" class="form-label">Card Holder</label>
    <input type="text" name="cardHolder" id="card_holder" class="form-control" value="{{ $card->cardHolder ?? '' }}" required>
</div>
<div class="mb-3">
    <label for="expirationMonth" class="form-label">Expiration Month</label>
    <input type="number" name="expirationMonth" id="expiration_month" class="form-control" value="{{ $card->expirationMonth ?? '' }}" required>
</div>
<div class="mb-3">
    <label for="expiration_year" class="form-label">Expiration Year</label>
    <input type="number" name="expirationYear" id="expiration_year" class="form-control" value="{{ $card->expirationYear ?? '' }}" required>
</div>
<div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="virtual" {{ $card && $card->type === 'virtual' ? 'selected' : '' }}>Virtual</option>
        <option value="physical" {{ $card && $card->type === 'physical' ? 'selected' : '' }}>Physical</option>
    </select>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="ativo" {{ $card && $card->status === 'ativo' ? 'selected' : '' }}>Active</option>
        <option value="inativo" {{ $card && $card->status === 'inativo' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
