<form action="{{ route('imobilisables.update', $imobilisable->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="exit_quantity">Exit Quantity:</label>
    <input type="number" name="exit_quantity" id="exit_quantity" required>
    <button type="submit">Exit</button>
</form>
