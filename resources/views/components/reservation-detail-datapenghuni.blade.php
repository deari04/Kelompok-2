<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Form Penghuni</h3>
        <a href="{{ route('dataPenghuni') }}" class="btn btn-secondary ml-auto">Data Penghuni</a>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <!-- Form Section -->
        <form>
            <!-- Acara Input -->
            <div class="form-group">
                <label for="acara" class="col-form-label">Acara</label>
                <input type="text" class="form-control" id="acara">
            </div>

            <!-- Check-in Input -->
            <div class="form-group">
                <label for="checkin" class="col-form-label">Tanggal</label>
                <input type="date" class="form-control" id="checkin">
            </div>

            <!-- Search Input and Buttons (Search, Import, Export) -->
           <div class="form-group">
    <label for="customFileInput" class="col-form-label">Upload file</label>
    <div class="input-group">
        <input type="file" id="customFileInput" class="form-control">
        <div class="input-group-append">
            <button type="button" class="btn btn-success" id="importBtn">Import</button>
        </div>
        </div>
            </div>

            <!-- Save Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>
    <div class="card">
    <div class="card-header d-flex justify-content-start align-items-center">
        <input type="text" id="customSearchBox" class="form-control" placeholder="Search..." style="width: 250px;">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- DataTable -->
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>

    <!-- /.card-body -->
</div>