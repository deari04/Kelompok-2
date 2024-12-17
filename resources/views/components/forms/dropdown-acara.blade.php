<select id="acara" class="form-control @error("penghuni_id") is-invalid @enderror" name="penghuni_id">
    <option value="">Select...</option>
    @foreach ($data as $item)
        <option @if (old('penghuni_id') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
<div class="invalid-feedback">
    Acara wajib dipilih
</div>
