<div class="modal-header">
    <h4 class="modal-title">Detail Pesanan</h4>
    <button class="close" type="button" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body text-left">
    <div class="row no-gutters py-3">
        <div class="col-md-6">
            <div class="font-weight-bold mb-1">Tanggal</div>
            <div class="h5 mb-0 text-gray-800">{{ \Carbon\Carbon::parse($data['created_at'])->toDateTimeString() }}</div>
        </div>
        <div class="col-md-6">
            <div class="font-weight-bold mb-1">Nomor Invoice</div>
            <div class="h5 mb-0 text-gray-800">{{ $data['external_id'] }}</div>
        </div>
    </div>
    <div class="row no-gutters py-3">
        <div class="col-md-6">
            <div class="font-weight-bold mb-1">Total Harga</div>
            <div class="h5 mb-0 text-gray-800">Rp. {{ number_format($data['amount'], 0, "", ".") }}</div>
        </div>
        <div class="col-md-6">
            <div class="font-weight-bold mb-1">Ongkos Kirim</div>
            <div class="h5 mb-0 text-gray-800">Rp. {{ number_format($data['delivery_expense'], 0, "", ".") }}</div>
        </div>
    </div>
    <div class="row no-gutters py-3">
        <div class="col-md-6">
            <div class="font-weight-bold mb-1">Kurir</div>
            <div class="h5 mb-0 text-gray-800">{{ $data['courier_service'] }}</div>
        </div>
        <div class="col-md-6">
            <div class="font-weight-bold mb-1">Status</div>
            <div class="h5 mb-0 text-gray-800">{{$data['status']}}</div>
        </div>
    </div>
    <div class="row no-gutters py-3">
        <table class="table table-light table-bordered table-striped">
            <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Nama</th>
                <th class="text-center">Jumlah</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['order_items'] as $id => $item)
            <tr>
                <td class="text-center">{{ $id+1 }}</td>
                <td>{{ $item['store_item']['name'] }}</td>
                <td class="text-center">{{ $item['quantity'] }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
</div>
