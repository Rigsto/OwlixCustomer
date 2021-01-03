@extends('inc.app')
@section('content')
    <div class="container">
        <div class="card px-5 py-5 mx-5 my-5 rounded-medium">
            <ul class="nav nav-pills mb-3 justify-content-sm-between" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-belum-bayar-tab" data-toggle="pill" href="#pills-belum-bayar"
                       role="tab" aria-controls="pills-belum-bayar" aria-selected="true">Belum bayar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-diproses-tab" data-toggle="pill" href="#pills-diproses" role="tab"
                       aria-controls="pills-diproses" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-dikirim-tab" data-toggle="pill" href="#pills-dikirim" role="tab"
                       aria-controls="pills-dikirim" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-batal-tab" data-toggle="pill" href="#pills-batal" role="tab"
                       aria-controls="pills-batal" aria-selected="false">Ditolak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab"
                       aria-controls="pills-selesai" aria-selected="false">Selesai</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active my-4" id="pills-belum-bayar" role="tabpanel"
                     aria-labelledby="pills-belum-bayar-tab">
                    @foreach ($orders_new as $item)
                        <div class="card px-4 py-4 mb-4 rounded-medium">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <p id="OrderInvoiceNumber"
                                       class="font-weight-bold text-primary">{{ $item['external_id'] }}</p>
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item['created_at'])->toDateTimeString() }}</p>
                                    <p class="mt-1" style="font-weight: 500;">{{ count($item['order_items']) }} Barang | <span><a href="javascript: detail({{$item['id']}})">Lihat Barang</a></span></p>
                                    <button class="btn btn-primary py-3 px-4 mt-4 rounded">Konfirmasi Pembayaran</button>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td style="text-align: left;">Total</td>
                                            <td style="text-align: right; font-size: 16px; font-weight: 500;">
                                                Rp. {{ number_format($item['amount'] + $item['delivery_expense'], 0, "", ".")}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;">Metode Pembayaran</td>
                                            <td style="text-align: right;">BCA</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;">Kode Virtual Account<br>
                                                <h5>0213241241515815</h5>
                                                <input type="text" value="0213241241515815" id="kodeVA" style="display: none;">
                                            </td>
                                            <td style="text-align: right;">
                                                <button class="btn btn-light" onclick="copyCode()">Salin</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade my-4" id="pills-diproses" role="tabpanel" aria-labelledby="pills-diproses-tab">
                    @foreach($orders_paid as $item)
                        <div class="card px-4 py-4 mb-2 rounded-medium" id="Transaction_detail_PaymentProcessed">
                            <div class="d-flex align-items-center">
                                <div class="col-sm-6">
                                    <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">{{ $item['external_id'] }}</p>
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item['created_at'])->toDateTimeString() }}</p>
                                    <p class="mt-1" style="font-weight: 500;">{{ count($item['order_items']) }} Barang | <span><a href="javascript: detail({{$item['id']}})">Lihat Barang</a></span>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-right font-weight-bold " style="color: #e8af12;">SEDANG DIKONFIRMASI KE TOKO</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade my-4" id="pills-dikirim" role="tabpanel" aria-labelledby="pills-dikirim-tab">
                    @foreach($orders_ship as $item)
                        <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentShipped">
                            <div class="d-flex align-items-center">
                                <div class="col-sm-8">
                                    <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">{{ $item['external_id'] }}</p>
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item['created_at'])->toDateTimeString() }}</p>
                                    <p class="mt-1" style="font-weight: 500;">{{ count($item['order_items']) }} Barang | <span><a href="javascript: detail({{$item['id']}})">Lihat Barang</a></span>
                                </div>
                                <div class="col-sm-4">
                                    <p class="font-weight-bold " style="color:  #e8af12;"><i
                                            class="fas fa-shipping-fast mr-2"></i>SEDANG DIKIRIM</p>
                                    <p class="text-muted mb-0">{{ $item['courier_service'] }}</p>
                                    <p class="mt-1" style="font-weight: 500;"><span>Resi : 21415474523523</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade my-4" id="pills-batal" role="tabpanel" aria-labelledby="pills-batal-tab">
                    @foreach($orders_reject as $item)
                        <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentRejected">
                            <div class="d-flex align-items-center">
                                <div class="col-sm-8">
                                    <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">{{ $item['external_id'] }}</p>
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($item['created_at'])->toDateTimeString() }}</p>
                                    <p class="mt-1" style="font-weight: 500;">{{ count($item['order_items']) }} Barang | <span><a href="javascript: detail({{$item['id']}})">Lihat Barang</a></span>
                                </div>
                                <div class="col-sm-4">
                                    <p class="font-weight-bold text-danger"><i class="fas fa-times mr-2"></i>DITOLAK</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade my-4" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
                    <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_Reject">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-8">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">
                                    INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a
                                            href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="font-weight-bold text-success"><i class="fas fa-clipboard-check mr-2"></i>TERKIRIM</p>
                                <p class="text-muted mb-0">Diterima Pada:</p>
                                <p class="mt-1" style="font-weight: 500;"><span>09 Agustus 2020, 12:30</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="modalBody"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function detail(id_order){
            $.ajax({
                url: "{{route('customer.order.items')}}",
                method: "GET",
                data: {
                    id_order: id_order,
                },
                success: function (data) {
                    $('#modalBody').html(data.modal);
                    $('#modal').modal();
                },
                error: function (a, b, c) {
                    alert('Failed to get data');
                }
            })
        }
    </script>
@endsection
