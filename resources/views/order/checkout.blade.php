@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
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
                        </div>
                    </div>
                    @foreach($item_cities as $city)
                    <div class="card my-3 px-5 py-5 rounded-medium">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $city_items = $items->where('city_id', $city->city_id)
                            @endphp
                            @foreach($city_items as $id => $ci)
                            <tr>
                                <td>{{ $id+1 }}</td>
                                <td>{{ $ci->name }}</td>
                                <td>{{ $ci->quantity }}</td>
                                <td>Rp. {{ number_format($ci->price, 0, "", ".") }}</td>
                                <td>Rp. {{ number_format($ci->price * $ci->quantity, 0, "", ".") }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="width: 100%; height: 1px; background-color: rgb(229, 229, 229);"></div>
                        <table class="table" onload="javascript: ">
                            <thead>
                            <tr>
                                <td></td>
                                <td class="text-center">Nama Servis</td>
                                <td class="text-center">Harga Ongkos Kirim</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{!! Form::radio('cour', true, ['class'=>'radio-btn']) !!}</td>
                                <td class="text-center">JNE Reguler</td>
                                <td class="text-center">Rp. {{ number_format(8000, 0, "", ".") }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
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
