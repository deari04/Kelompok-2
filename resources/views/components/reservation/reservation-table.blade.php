<div class="card">
    <div class="card-header">
        <h3 class="card-title">Informasi Kamar</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomer Kamar</th>
                    <th>nama penghuni</th>
                    <th>jumlah penghuni</th>
                    <th>Check in </th>
                    <th> Check out </th>
                </tr>
            </thead>
            <tbody>
               @foreach ($data as $key => $item)
                <!-- Data lainnya -->
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item?->room?->nomor_kamar}}</td>
                    <td>{{$item->details?->implode("nama", ", ")}}</td>
                    <td>{{$item->details?->count()}}</td>
                    <td>{{$item-> check_in}}</td>
                    <td>{{$item-> check_out}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-2">
            {{ $data->links() }}
        </div>
    </div>
</div>
