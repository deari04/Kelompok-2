<select class="form-control @error("room_id") is-invalid @enderror" name="room_id">
    <option value="">Select...</option>
    @foreach ($data as $item)
        <option @if (old('room_id') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
<div class="invalid-feedback">
    Kamar wajib dipilih
</div>
