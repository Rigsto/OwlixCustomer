@extends('inc.app')
@section('content')
    @include('inc.filter')
    <div class="container">
        <div class="product-list-header px-sm-3">
            <div class="d-flex justify-content-between align-items center">
                <h2>Wishlist</h2>
            </div>
            <div class="row product-grid py-sm-4">
                @foreach($datas as $data)
                    <div class="col-3 px-3 py-3">
                        <a href="{{ route('home.item.detail', $data['id_store_item']) }}">
                            <div class="card">
                                <img class="card-img-top" src="{{ $data['store_item_image'][0]['image_url'] }}" alt="Card image cap" style="height: 12rem;">
                                <div class="card-body">
                                    <p class="card-text text-muted" style="font-size: 12px">{{ $data['store_item']['id_store'] }}</p>
                                    <h4 class="card-title">{{ $data['store_item']['name'] }}</h4>
                                    <div class="product-rate-star">
                                        @include('inc.star_rating', ['star_count'=>random_int(1,5), 'rating_count'=>random_int(0, 10000)])
                                    </div>
                                    <div
                                        class="product-price pt-4 d-flex justify-content-between align-items-end">
                                        <h5>
                                            Rp {{ number_format($data['store_item']['store_item_price'], 0, ',', '.') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
