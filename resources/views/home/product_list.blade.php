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
                        <a href="{{ route('home.search.category', ['cat' => 0]) }}" class="py-1">
                            <li class="list-group-item border-bottom">Semua Produk</li>
                        </a>
                        @foreach($categories as $cat)
                            <a href="{{ route('home.search.category', ['cat' => $cat['id']]) }}" class="py-1">
                                <li class="list-group-item border-bottom">{{ $cat['name'] }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @if($is_home)
                    <div class="d-flex" style="padding-bottom: 2em">
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
                @endif
                <div class="product-list-header px-sm-3">
                    <div class="d-flex justify-content-between align-items center">
                        <h2>{{ $title }}</h2>
                        <a href="">Lihat Semua</a>
                    </div>
                    <div class="row product-grid py-sm-4">
                        @foreach($items as $data)
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
                                                @include('inc.star_rating', ['star_count'=>random_int(1, 5), 'rating_count'=>random_int(0, 10000)])
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
    @if($is_home)
        @include('inc.bottomnav')
    @endif
@endsection
