<div class="rounded p-4" style="background-color: #F0F0F0;">
    <form action="{{ route("pemesanan.save") }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row my-4">
                <div class="form-group my-2 d-flex col-lg-3">
                    <label for="nomer-kamar" class="col-form-label mr-3">Acara</label>
                    <x-forms.dropdown-acara/>
                </div>
                <div class="my-2 d-flex flex-lg-row flex-column col-lg-9 justify-content-end">
                    <div class="form-group mr-4 d-flex">
                        <label for="checkin" class="col-form-label mr-3 w-100">Check-in</label>
                        <div>
                            <input type="date" class="form-control @error('check_in') is-invalid @enderror" id="checkin" name="check_in" value="{{ old('check_in') }}">
                            <div class="invalid-feedback">
                                Check-In wajib diisi
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <label for="checkout" class="col-form-label mr-3 w-100">Check-out</label>
                        <div>
                            <input type="date" class="form-control @error('check_out') is-invalid @enderror" id="checkout" name="check_out" value="{{ old('check_out') }}">
                            <div class="invalid-feedback">
                                Check-Out wajib diisi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light rounded mb-4 py-3">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex mb-3">
                        <label for="nomer-kamar" class="col-form-label mr-3">Nomer Kamar</label>
                        <div class="w-50">
                            <x-forms.dropdown-room status="ON"/>
                        </div>
                    </div>
                    <div class="d-flex @error('reservation_gender') is-invalid @enderror">
                        <label class="col-form-label mr-3">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="reservation_gender" id="inlineRadio1" value="L" @if(old('reservation_gender') == "L") checked @endif>
                            <label class="form-check-label" for="inlineRadio1">L</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="reservation_gender" id="inlineRadio2" value="P" @if(old('reservation_gender') == "P") checked @endif>
                            <label class="form-check-label" for="inlineRadio2">P</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        Pilih jenis kelamin
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex detail-penghuni">
                        
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
            </div>
        </div>
    </form>
    <x-reservation.reservation-table />
</div>

{{-- <div class="card card-body">
    <form>
        <div class="form-row">
            <div class="form-group row col-md-5">
                <label for="acara" class="col-form-label">Acara</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="acara">
                </div>
            </div>
            <div class="form-group row col-md-7">
                <label for="checkin" class="col-form-label">Check-in</label>
                <div class="col-auto">
                    <input type="date" class="form-control" id="checkin">
                </div>
                <label for="checkout" class="col-form-label">Check-out</label>
                <div class="col-auto">
                    <input type="date" class="form-control" id="checkout">
                </div>
            </div>
        </div>
        <div class="col row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nomer_kamar" class="col-form-label">Nomer Kamar</label>
                    <div class="col-md-6">
                        <select class="form-control" id="nomer_kamar">
                            <option>Select...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-check form-check-inline">
                        <label class="col-form-label mr-3">Jenis Kelamin</label><br>
                        <input class="form-check-input" type="radio" name="gender" id="genderL" value="L" checked>
                        <label class="form-check-label mr-3" for="genderL">
                            L
                        </label>
                        <input class="form-check-input" type="radio" name="gender" id="genderP" value="P">
                        <label class="form-check-label" for="genderP">
                            P
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nomer_kamar" class="col-form-label">Nama</label>
                    <div class="col ml-4">
                        <div class="from-group row">
                            <label for="nomer_kamar" class="col-form-label">1</label>
                            <div class="col mb-2">
                                <select class="form-control" id="nomer_kamar">
                                    <option>Select...</option>
                                </select>
                            </div>
                        </div>
                        <div class="from-group row">
                            <label for="nomer_kamar" class="col-form-label">2</label>
                            <div class="col mb-2">
                                <select class="form-control" id="nomer_kamar">
                                    <option>Select...</option>
                                </select>
                            </div>
                        </div>
                        <div class="from-group row">
                            <label for="nomer_kamar" class="col-form-label">3</label>
                            <div class="col mb-2">
                                <select class="form-control" id="nomer_kamar">
                                    <option>Select...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col row">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div> --}}