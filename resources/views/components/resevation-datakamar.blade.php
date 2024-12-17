
    <!-- Pesan notifikasi statis -->
    <div class="alert alert-success">Kamar berhasil ditambahkan!</div>

    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKamarModal">Tambah Kamar</button>
    </div>

    <!-- Tabel Data Kamar (Statis) -->
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Status Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
    </table>
</div>

<!-- Modal untuk Menambah Kamar -->
<div class="modal fade" id="addKamarModal" tabindex="-1" aria-labelledby="addKamarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form statis tanpa action untuk saat ini -->
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKamarModalLabel">Tambah Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control" id="nomor_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_kamar" class="form-label">Status Kamar</label>
                        <select class="form-select" id="status_kamar" required>
                            <option>ON</option>
                            <option>OFF</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Tambah Kamar</button>
                </div>
            </div>
        </form>
    </div>
</div>