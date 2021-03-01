@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
    @php
    $total = 0;
    $total_ongkir = 0;
    @endphp
    <div class="container">
        <form action="{{ route('order.checkout.payment') }}" method="POST">
            @csrf
            <div class="row my-3 px-5 py-5 checkoutAfterDetail">
                <div class="col col-7">
                    <div class="card mt-5 px-5 py-5 rounded-medium">
                        <div>
                            <h4>Detail Pengiriman</h4>
                        </div>
                        <div class="my-2">
                            <p class="d-none" id="withAddress">@if($address != null) {{ count($datas) }} @else 0 @endif</p>
                            @if($address != null)
                                @php
                                    $city = \App\Models\AddressCity::find($address['city_id']);
                                    $province = \App\Models\AddressProvince::find($address['province_id']);
                                @endphp
                                <div class="row detailAlamatPenerimaShow mb-3">
                                    <div class="col-lg-6 col-md-12">
                                        <p class="text-muted">Alamat Pengiriman</p>
                                        <p>{{ $address['address'] }}, {{ $city->name }} {{ $address['postal_code'] }}, {{ $province->name }}</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="text-muted">Penerima</p>
                                        <p>{{ $address['fullname'] }}</p>
                                        <p>{{ $address['phone_number'] }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <a class="font-primary font-bold" href="" style="color: #223b85;">Ubah Alamat</a>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <a href="" style="color: #223b85;">Tambah Alamat</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @foreach($datas as $data)
                    <div class="card my-3 px-5 py-5 rounded-medium">
                        <div>
                            <h5 class="truncate"><a href="{{ route('home.store.detail', ['id' => $data['store']['id']]) }}">{{ $data['store']['name'] }}</a></h5>
                            <p class="text-muted">{{ \App\Models\AddressCity::find($data['store']['city_id'])->name }}</p>
                        </div>
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-right">Harga Satuan</th>
                                <th class="text-right">Harga Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['items'] as $id => $item)
                                <tr>
                                    <td>{{ $id+1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td class="text-center">{{ $item['quantity'] }}</td>
                                    <td class="text-right">Rp. {{ number_format($item['price'], 0, "", ".") }}</td>
                                    <td class="text-right">Rp. {{ number_format($item['price'] * $item['quantity'], 0, "", ".") }}</td>
                                    @php
                                    $total += $item['price'] * $item['quantity'];
                                    @endphp
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="width: 100%; height: 1px; background-color: rgb(229, 229, 229);" class="my-2"></div>
                        <p class="small">Cara Pembayaran</p>
                        <table class="table">
                            <thead>
                            <tr>
                                <td></td>
                                <td>Nama Servis</td>
                                <td class="text-center">Waktu (Hari)</td>
                                <td class="text-right">Harga Ongkos Kirim</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['ongkir'] as $ongkir)
                                <tr>
                                    <td class="text-center">{!! Form::radio('cour'.$data['store']['id'], $ongkir['id']."-".$ongkir['price'], false, ['class'=>'radio-btn']) !!}</td>
                                    <td>{{ $ongkir['name'] }}</td>
                                    <td class="text-center">{{ $ongkir['est'] }}</td>
                                    <td class="text-right">Rp. {{ number_format($ongkir['price'], 0, "", ".") }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="width: 100%; height: 1px; background-color: rgb(229, 229, 229);" class="my-2"></div>
                        <p class="small mb-2">Note</p>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('note'.$data['store']['id'], null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col col-5">
                    <div class="card mt-5 px-3 py-3 rounded-medium checkoutAfterDetail">
                        <div class="d-flex px-3 pb-3 font-weight-normal">
                            <a href="{{ route('order.cart') }}" class="text-primary float-right" style="font-size: 14px;">Edit Keranjang</a>
                        </div>
                        <div style="width: 100%; height: 1px; background-color: rgb(225, 225, 225);" ></div>
                        <div class="amountDetail px-3 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">Subtotal :</p>
                                <p class="d-none" id="totalHarga">{{ $total }}</p>
                                <p>Rp {{ number_format($total, 0, "", ".") }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="text-muted">Diskon :</p>
                                <p style="color: #223b85;">Rp 0 (0%)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="text-muted">Biaya Pengiriman :</p>
                                <p id="totalOngkir">Rp {{ number_format($total_ongkir, 0, "", ".") }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <p class="font-weight-medium">Total :</p>
                                <p class="h4" id="totalSemua">Rp {{ number_format($total + $total_ongkir, 0, "", ".") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 px-4 py-4 rounded-medium checkoutAfterDetail">
                        <div>
                            <h5>Informasi Pembayaran</h5>
                            <p>Informasi Pembayaran akan dikirim ke email Anda. Silahkan cek email Anda setelah menekan tombol di bawah ini.</p>
                        </div>
                        <div class="my-3 mt-4 w-100">
                            <button type="submit" class="btn btn-primary py-2 px-3" id="btn-submit">Konfirmasi & Bayar Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            document.getElementById('btn-submit').disabled = true;

            $('input[type=radio]').change(function (){
                reloadData();
                checkData();
            });
        });

        function reloadData(){
            let subTotal = parseInt(document.getElementById("totalHarga").innerHTML);
            const checkBoxes = document.getElementsByClassName("radio-btn");
            const totalOngkir = document.getElementById('totalOngkir');
            const total = document.getElementById('totalSemua');

            let totOngkir = 0;
            let tot = subTotal;

            for (let i=0; i<checkBoxes.length; i++){
                if (checkBoxes[i].checked){
                    totOngkir += parseInt(checkBoxes[i].value.split("-")[1], 0);
                }
            }

            tot += totOngkir;

            totalOngkir.innerHTML = "Rp " + totOngkir.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            total.innerHTML = "Rp " + tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function checkData(){
            let withAddress = parseInt(document.getElementById('withAddress').innerHTML, 0);
            if (withAddress > 0){
                const checkBoxes = document.getElementsByClassName("radio-btn");
                let count = 0;

                for (let i=0; i<checkBoxes.length; i++){
                    if (checkBoxes[i].checked){
                        count++;
                    }
                }

                if (count.toString() === withAddress.toString()){
                    $('#btn-submit').prop('disabled', false);
                } else {
                    $('#btn-submit').prop('disabled', true);
                }
            } else {
                $('#btn-submit').prop('disabled', false);
            }
        }
    </script>
@endsection
