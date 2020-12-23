@extends('inc.app')
@section('content')
    <div class="container">
        <div class="card my-5 px-5 py-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6 col-sm-12 mb-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                                <!-- slides -->
                                <div class="carousel-inner">
                                    @for ($j = 0; $j < 5; $j++)
                                        @if ($j == 0)
                                            <div class="carousel-item active"> <img src="https://production.owlix-id.com/store_files/store_item_images/1608492100_image0.jpg" alt="Hills"> </div>
                                        @else
                                            <div class="carousel-item"> <img src="https://production.owlix-id.com/store_files/store_item_images/1608492100_image0.jpg" alt="Hills"> </div>
                                        @endif
                                    @endfor
                                </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                                <ol class="carousel-indicators list-inline">
                                    @for ($j = 0; $j < 5; $j++)
                                        @if ($j == 0)
                                            <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="https://production.owlix-id.com/store_files/store_item_images/1608492100_image0.jpg" class="img-fluid"> </a> </li>
                                        @else
                                            <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="https://production.owlix-id.com/store_files/store_item_images/1608492100_image0.jpg" class="img-fluid"> </a> </li>
                                        @endif
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12 mt-md-5 mt-lg-0">
                    <div class="product-name">
                        <h1>Product Name</h1>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="product-rate-star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="ml-4 text-muted">4.3K</span>
                        </div>
                        <div class="border-right ml-md-4 pr-4">
                            <a href="#">Lihat Semua</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle" style="color:#263A81;" aria-hidden="true"></i>
                            <span class="text-muted ml-1">10K Orders</span>
                        </div>

                    </div>
                    <div class="align-items-center justify-content-between mt-5" style="display: flex;">
                        <div class="priceInfo">
                            <h2>Rp {{ number_format(1000000, 0, ',', '.') }}</h2>
                            <del class="text-muted">Rp 125.000</del>
                        </div>
                        <div> <a><i class="fa fa-heart-o" style="font-size: 32px;" aria-hidden="false"></i></a></div>

                    </div>
                    <div class="d-flex align-items-center mt-5">
                        <div class="text-muted">Kuantitas</div>
                        <div class="d-flex ml-sm-3">
                            <input type="number" min="0" max="100" step="1" class="form-control" id="quantity"/>
                        </div>

                    </div>

                    <div class="d-flex align-items-center mt-4">
                        <button class="btn-primary rounded px-4 py-2 mr-md-4">Beli Sekarang</button>
                        <button class="btn-secondary rounded px-4 py-2 mr-md-4">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="card py-5 px-5">
            <div>
                <h3 class="mb-4">Deskripsi Produk</h3>
                <p class="text-muted">
                    Deskripsi Produk disini
                </p>
            </div>
            <div class="d-flex align-items-center mt-5">
                <div class="profilePicture" style="width: 100px; height: 100px; background-image: url(''); background-size: contain; border-radius: 40px"></div>
                <div class="ml-4">
                    <h3>Nama Toko</h3>
                    <a href="{{ route('home.store.detail', ['id' => 0]) }}" class="btn btn-light px-3 py-2">
                        <i class="fas fa-store mr-2"></i>
                        Kunjungi Toko
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="product-list-header px-sm-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h2>Produk Lain</h2></div>
                    <div><a href="http://">Lihat Semua</a></div>
                </div>
                <div class="row product-grid justify-content-between py-sm-4">
{{--                    @foreach ($data['data'] as $item)--}}
{{--                        @if($item['id'] != 1)--}}
{{--                            <div class="col-3 py-3">--}}
{{--                                <div class="card">--}}
{{--                                    <img class="card-img-top" style="height: 12rem;" src="{{$item['store_item_images'][0]['image_url']}}" alt="Card image cap">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <p class="card-text text-muted" style="font-size: 12px;">{{$item['store']['name']}}</p>--}}
{{--                                        <h4 class="card-title">{{$item['name']}}</h4>--}}
{{--                                        <div class="product-rate-star">--}}
{{--                                            <span class="fa fa-star checked"></span>--}}
{{--                                            <span class="fa fa-star checked"></span>--}}
{{--                                            <span class="fa fa-star checked"></span>--}}
{{--                                            <span class="fa fa-star"></span>--}}
{{--                                            <span class="fa fa-star"></span>--}}
{{--                                            <span class="ml-2">4.3K</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price pt-4 d-flex justify-content-between align-items-end">--}}
{{--                                            <h5>Rp{{ number_format($item['store_item_price'], 0, ',', '.') }}</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
                </div>
            </div>
        </div>
@endsection
