@extends('inc.app')
@section('content')
    <div class="container" id="profileSections">
        <div class="card rounded-medium my-5"
             style="background-image: url('{{ asset('img/bgtoko.png') }}'); background-size: 100% 200px; background-repeat: no-repeat;">
            <div class="card px-5 py-5 mx-sm-5 rounded-medium" style="margin-top: 100px;">
                <div class="d-sm-flex justify-content-lg-between align-items-center">
                    <div class="d-sm-flex align-items-center">
{{--                        {{ $store }}--}}
                        <div style="background-image: url('');" class="ProfilePicture"></div>
                        <div class="mx-3">
                            <h4 id="StoreName"></h4>
                            <div class="product-rate-star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="ml-2" style="font-weight: 500; color: #e8af12;">4/5</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-flex justify-content-lg-between">
                        <div class="mr-5">
                            <span class="mr-2 text-primary"><i class="fas fa-archive"></i></span><span
                                class="text-primary" style="font-weight: 500;">Total Produk di Toko</span>
                            <h4 class="mt-3">100 Produk</h4>
                        </div>
                        <div>
                            <span class="mr-2 text-success"><i class="fas fa-truck-loading"></i></span><span
                                class="text-success" style="font-weight: 500;">Total Produk terjual</span>
                            <h4 class="mt-3">290 Produk</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card px-5 py-5 mx-5 mt-5 rounded-medium">
                <h2>Deskripsi Toko</h2>
                <p id="deskripsiToko">
                    Hendy Shop adalah toko baru yang sedang merintis di dunia bisnis online . Layanan ini dikelola
                    pribadi dan memiliki kepentingan
                    membantu sesama dengan memberi sekian persen penjualan untuk donasi dan membantu sesama

                    Selamat berbelanja di toko kami!
                    .

                    “Hendy Shop the best store :) “
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
                        @for($i=0; $i<10; $i++)
                            <div class="col-3 px-3 py-3">
                                <a href="{{ route('home.item.detail', ['id' => 0]) }}">
                                    <div class="card mr-sm-2">
                                        <img class="card-img-top" style="height: 12rem;"
                                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQN5k6SAtvgfbU5pqiRdNSUH6xzpymJbX5F7A&usqp=CAU"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                            <h4 class="card-title">Product name</h4>
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
                                                <p class="text-muted">
                                                    <del> Rp 29.000</del>
                                                </p>
                                                <h5>Rp 20.000</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
