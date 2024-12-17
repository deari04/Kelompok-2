<label class="col-form-label mr-3">Nama</label>
<div class="w-100" id="repeater-form">
    <div data-repeater-list="penghuni_detail_id">
        <div class="d-flex mb-3 detail-penghuni" data-repeater-item>
            <!-- <select class="form-control" id="nama1">
                <option>Select...</option>
                <option>2</option>
                <option>3</option>
            </select> -->
            <select class="form-control repeater-value @error("penghuni_detail_id") is-invalid @enderror" name="penghuni_detail_id">
                <option value="">Select...</option>
                @foreach ($penghuni ?? [] as $item)
                    <option @if (old('penghuni_detail_id') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Penghuni wajib dipilih
            </div>
            
            <button type="button" class="btn btn-danger ml-3" data-repeater-delete><i class="bi bi-trash"></i></button>
        </div>
    </div>
    <button type="button" class="w-100 btn btn-outline-success" data-repeater-create><i class="bi bi-plus"></i> Tambah</button>
</div>
