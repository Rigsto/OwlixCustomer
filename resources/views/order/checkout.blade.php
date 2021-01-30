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
                        <div class="my-4">
                            @if($address != null)
                                @php
                                    $city = \App\Models\AddressCity::find($address['city_id']);
                                    $province = \App\Models\AddressProvince::find($address['province_id']);
                                @endphp
                                <div class="row detailAlamatPenerimaShow mb-2">
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
                                        <a href="" style="color: #223b85;">Ubah Alamat</a>
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
                            <p class="text-muted">{{ \App\Models\AddressCity::find($store['city_id'])->name }}</p>
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
{{--                                    <td class="text-center">{{ $item[''] }}</td>--}}
{{--                                    <td class="text-right">Rp. {{ number_format($siitem['store_item_price'], 0, "", ".") }}</td>--}}
{{--                                    <td class="text-right">Rp. {{ number_format($siitem['store_item_price'] * $si->quantity, 0, "", ".") }}</td>--}}
{{--                                    @php--}}
{{--                                    $total += $siitem['store_item_price'] * $si->quantity;--}}
{{--                                    @endphp--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        <div style="width: 100%; height: 1px; background-color: rgb(229, 229, 229);" class="my-2"></div>--}}
{{--                        <p>Cara Pembayaran</p>--}}
{{--                        {{  }}--}}
{{--                        <table class="table" onload="javascript: ">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <td></td>--}}
{{--                                <td class="text-center">Nama Servis</td>--}}
{{--                                <td class="text-center">Harga Ongkos Kirim</td>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>{!! Form::radio('cour', true, ['class'=>'radio-btn']) !!}</td>--}}
{{--                                <td class="text-center">JNE Reguler</td>--}}
{{--                                <td class="text-center">Rp. {{ number_format(8000, 0, "", ".") }}</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                    @endforeach
                </div>
                <div class="col col-5">
                    <div class="card mt-5 px-3 py-3 rounded-medium checkoutAfterDetail">
                        <div class="d-flex justify-content-between align-items-center px-2 pb-3 font-weight-normal">
                            <a href="" class="text-primary float-right" style="font-size: 14px;">Tambahkan Catatan</a>
                            <a href="" class="text-primary float-right" style="font-size: 14px;">Edit Keranjang</a>
                        </div>
                        <div style="width: 100%; height: 1px; background-color: rgb(225, 225, 225);" ></div>
                        <div class="amountDetail px-3 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">Subtotal :</p>
                                <p>Rp {{ number_format($total, 0, "". ".") }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="text-muted">Diskon :</p>
                                <p style="color: #223b85;">Rp 0 (0%)</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="text-muted">Biaya Pengiriman :</p>
                                <p>Rp {{ number_format($total_ongkir, 0, "", ".") }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <p class="font-weight-medium">Total :</p>
                                <p class="h4">Rp {{ number_format($total + $total_ongkir, 0, "", ".") }}</p>
                            </div>
                        </div>
                    </div>
{{--                    <div class="card mt-3 px-4 py-4 rounded-medium checkoutAfterDetail">--}}
{{--                        <div><h5>--}}
{{--                                Metode Pembayaran--}}
{{--                            </h5></div>--}}
{{--                        <div class="my-3">--}}
{{--                            <div class="form-row align-items-center">--}}
{{--                                <div class="col-3">--}}
{{--                                    <img src="{{ asset('img/bcaLogo.svg') }}" alt="" class="w-100" style="max-width: 90px;">--}}
{{--                                </div>--}}
{{--                                <div class="col-9">--}}
{{--                                    <select id="inputState" class="custom-select">--}}
{{--                                        <option selected>BCA</option>--}}
{{--                                        <option>Mandiri</option>--}}
{{--                                        <option>BNI</option>--}}
{{--                                        <option>BRI</option>--}}
{{--                                        <div class="dropdown-divider"></div>--}}
{{--                                        <option>GOPAY</option>--}}
{{--                                        <option>OVO</option>--}}
{{--                                        <option>DANA</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="my-3">--}}
{{--                                <p class="text-muted" style="font-size: 14px;">Transfer Melalui Rekening bank BCA</p>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 w-100 ">--}}
{{--                                <button type="submit" class="btn btn-primary float-right py-2 px-3">Konfirmasi & Bayar Pesanan</button>--}}
{{--                                <a href="" class="btn btn-primary float-right py-2 px-3">Konfirmasi & Bayar Pesanan</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        function loadKurir(from, to, weight, )
    </script>
@endsection
