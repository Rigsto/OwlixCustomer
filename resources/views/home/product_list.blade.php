@extends('inc.app')
@section('content')
    <div class="container">
        <div class="row py-md-5">
            <div class="col-md-3">
                <div class="card" id="kategori" style="width: 17rem">
                    <div class="card-header">
                        Kategori Produk
                    </div>
                    <ul class="list-group list-group-flush">
                        <form action="{{ url()->previous() }}" method="GET">
                            <button class="btn font-muted-dark text-left w-100 p-0" style="border:0px;">
                                <li class="list-group-item border-bottom">Semua Produk</li>
                            </button>
                            <input type="hidden" name="current_page" value="1">
                        </form>
                        @foreach($categories as $idx => $cat)
                            <form action="{{ url('products') }}" method="GET">
                                <button class="btn font-muted-dark text-left w-100 p-0" style="border:0px;">
                                    <li class="list-group-item border-bottom">{{ $cat['name'] }}</li>
                                </button>
                                <input type="hidden" name="category_id" value="{{ $cat['id'] }}">
                                <input type="hidden" name="current_page" value="1">
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @if($is_home)
                    <div class="row mb-3 px-3">
                        <div class="col-4">
                            <a href="" class="kategori-btn">
                                <img src="{{ asset('img/KebutuhanRT.svg') }}" alt="" class="rounded-images mw-100">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="" class="kategori-btn">
                                <img src="{{ asset('img/Pakaian.svg') }}" alt="" class="rounded-images mw-100">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="" class="kategori-btn">
                                <img src="{{ asset('img/KebutuhanSekolah.svg') }}" alt="" class="rounded-images mw-100">
                            </a>
                        </div>
                    </div>
                @endif
                <div class="product-list-header px-sm-3">
                    <div class="d-flex justify-content-between align-items center">
                        <h2 class="font-bold mb-0">Best Sellers</h2>
                        <a class="my-auto font-primary font-bold" href="">Lihat Semua</a>
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
                                                @include('inc.star_rating', ['star_count'=> floor($data['rating']) ?? 0, 'rating_count'=>$data['rating_count']])
                                            </div>
                                            <div
                                                class="product-price pt-3 d-flex justify-content-between align-items-end">
                                                <h5 class="font-bold">Rp {{ number_format($data['store_item_price'], 0, ',', '.') }}</h5>
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
