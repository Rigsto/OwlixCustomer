<form action="{{ route('customer.order.rating.give') }}" method="POST">
    @csrf
    <input type="hidden" name="orderId" value="{{$data['id']}}">
    <div class="modal-header">
        <h4 class="modal-title">Ulas Pesanan</h4>
        <button class="close" type="button" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="row no-gutters">
            <div class="col-md-12">
                <p>Berikan nilai dan ulasan untuk kualitas pelayanan dan barang yang kamu terima</p>
            </div>
            <div class="row no-gutters py-3">
                @foreach($data['order_items'] as $item)
                    <div class="card mb-2 rounded-medium px-2 py-2">
                        <div class="d-flex align-items-center">
                            <div class="col-md-4">
                                <p class="font-weight-bold text-primary mb-0">{{ $item['store_item']['name'] }}</p>
                                <p class="text-muted mb-1">Rp {{ number_format($item['store_item']['store_item_price'], 0, "", ".") }}</p>
                                <p class="text-muted mb-0">Quantity : {{ $item['quantity'] }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted text-center">Nilai</p>
                                <input type="number" name="rating{{$item['id']}}" class="form-control" min="1" max="5" step="1" value="3">
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted text-center">Ulasan</p>
                                <input type="text" name="desc{{$item['id']}}" class="form-control">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
    </div>
</form>
