@extends('inc.app')
@section('content')
    @include('inc.filter')
    <div class="container">
        <div class="row py-md-4">
            <div class="col-md-3">
                <div class="card" id="kategori" style="width: 17rem">
                    <div class="card-header">
                        Kategori Produk
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $cat)
                            <a href="" class="py-1">
                                <li class="list-group-item border-bottom">{{ $cat['name'] }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex">
                    <div class="ml-sm-3">
                        <a href="" class="kategori-btn">
                            <img src="{{ asset('img/KebutuhanRT.svg') }}" alt="" class="rounded-images mw-100">
                        </a>
                        <a href="" class="kategori-btn">
                            <img src="{{ asset('img/Pakaian.svg') }}" alt="" class="rounded-images mw-100">
                        </a>
                        <a href="" class="kategori-btn">
                            <img src="{{ asset('img/KebutuhanSekolah.svg') }}" alt="" class="rounded-images mw-100">
                        </a>
                    </div>
                </div>
                <div class="product-list-header px-sm-3">
                    <div class="d-flex justify-content-between align-items center">
                        <h2>Terlaris</h2>
                        <a href="">Lihat Semua</a>
                    </div>
                    <div class="row product-grid py-sm-4">
                        @foreach($datas as $data)
                            <div class="col-4 px-3 py-3">
                                <a href="{{ route('home.item.detail', ['id' => $data['id']]) }}">
                                    <div class="card">
                                        <img class="card-img-top" style="height: 12rem;"
                                             src="{{$data['store_item_images'][0]['image_url']}}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text text-muted" style="font-size: 12px;">{{$data['store']['name']}}</p>
                                            <h4 class="card-title">{{$data['name']}}</h4>
                                            <div class="product-rate-star">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="ml-2">4.3K</span>
                                            </div>
                                            <div
                                                class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                <h5>
                                                    Rp {{ number_format($data['store_item_price'], 0, ',', '.') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.bottomnav')
@endsection
