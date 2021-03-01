@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
    <div class="container d-flex justify-content-center">
        <div class="card px-lg-5 py-lg-5 rounded-medium my-5 text-center" style="max-width: 800px">
            <div class="px-lg-5">
                <img src="{{ asset('img/Success Icon.svg') }}" alt="Payment Success Icon">
                <div class="mt-5">
                    <h3>Pesanan Diterima</h3>
                    <p class="text-muted mt-3">Pesananmu telah diterima oleh sistem. Kami telah mengirimkan email perihal info pembayaran. Segera lakukan pembayaran agar bisa diproses oleh toko.</p>
                </div>
            </div>
            <div>
                <a href="{{ route('customer.order') }}" class="btn btn-primary py-3 px-4 mt-4 text-white rounded">Cek Status Pesanan</a>
            </div>
        </div>
    </div>
@endsection
