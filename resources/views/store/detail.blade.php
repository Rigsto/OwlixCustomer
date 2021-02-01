@extends('inc.app')
@section('content')
    <div class="container" id="profileSections">
        <div class="card rounded-medium my-5"
             style="background-image: url('{{ asset('img/bgtoko.png') }}'); background-size: 100% 200px; background-repeat: no-repeat;">
            <div class="card px-5 py-5 mx-sm-5 rounded-medium" style="margin-top: 100px;">
                <div class="d-sm-flex justify-content-lg-between align-items-center">
                    <div class="d-sm-flex align-items-center">
                        <div style="background-image: url('{{ $store['image_url'] }}');" class="ProfilePicture"></div>
                        <div class="mx-3">
                            <h4 id="StoreName">{{ $store['name'] }}</h4>
                        </div>
                    </div>
                    <div class="d-lg-flex justify-content-lg-between">
                        <div class="mr-5">
                            <span class="mr-2 text-primary"><i class="fas fa-archive"></i></span><span
                                class="text-primary" style="font-weight: 500;">Total Produk di Toko</span>
                            <h4 class="mt-3">{{ count($products) }} Produk</h4>
                        </div>
                        <div>
                            <span class="mr-2 text-success"><i class="fas fa-truck-loading"></i></span><span
                                class="text-success" style="font-weight: 500;">Total Produk terjual</span>
                            <h4 class="mt-3">{{ $totalSold }} Produk</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card px-5 py-5 mx-5 mt-5 rounded-medium">
                <h2>Deskripsi Toko</h2>
                <p id="deskripsiToko">
                    {{ $store['description'] }}
                </p>
                <div>
                    <button class="btn btn-primary rounded float-right py-2 px-3 mt-4"><i
                            class="fas fa-share-alt mr-2"></i>Bagikan Toko
                    </button>
                </div>

            </div>
            <div class="px-5 py-4">
                <div class="product-list-header px-sm-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><h2>Produk Toko</h2></div>
                        <div><a href="http://">Lihat Semua</a></div>
                    </div>
                    <div class="row product-grid py-sm-4">
                        @foreach($products as $data)
                            <div class="col-4 px-3 py-3">
                                <a href="{{ route('home.item.detail', ['id' => $data['id']]) }}">
                                    <div class="card">
                                        <img class="card-img-top" style="height: 12rem;"
{{--                                             src="{{$data['store_item_images'][0]['image_url']}}"--}}
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text text-muted" style="font-size: 12px;">{{$store['name']}}</p>
                                            <h4 class="card-title">{{$data['name']}}</h4>
                                            <div class="product-rate-star">
                                                @include('inc.star_rating', ['star_count'=> floor($data['rating']) ?? 0, 'rating_count'=>$data['rating_count']])
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
@endsection
