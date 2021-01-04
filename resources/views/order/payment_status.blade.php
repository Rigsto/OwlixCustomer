@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
    <div class="container d-flex justify-content-center">
        <div class="card px-lg-5 py-lg-5 rounded-medium my-5 text-center">
            <div class="px-lg-5">
                <img src="{{ asset('img/Success Icon.svg') }}" class="w-75" alt="Payment Success Icon">
                <div class="mt-5">
                    <h3>Pembayaran Diterima</h3>
                    <p class="text-muted mt-3">Pesananmu sedang diproses oleh toko.</p>
                </div>
            </div>
            <div>
                <a href="{{ route('customer.order') }}" class="btn btn-primary py-3 px-4 mt-4 rounded">Cek Status Pesanan</a>
            </div>
        </div>
    </div>
@endsection
