@extends('inc.app')
@section('content')
    @include('inc.category_topnav')
    <div class="container">
        <div class="card my-5 px-5 py-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg-5 col-sm-12 mb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="custCarousel" class="carousel slide mb-3" data-ride="carousel">
                                <!-- slides -->
                                <div class="carousel-inner">
                                    @for ($j = 0; $j < count($data->store_item_images); $j++)
                                        @if ($j == 0)
                                            <div class="carousel-item active">
                                                <div class="square-image">
                                                    <img src="{{ $data->store_item_images[$j]->image_url }}" alt="{{ $data->name }} photo" style="border-radius: 6px;">
                                                </div>
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img src="{{ $data->store_item_images[$j]->image_url }}" alt="{{ $data->name }} photo" style="border-radius: 6px;">
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <button class="btn btn-primary w-100 h-100">
                                        <div class="d-flex h-100">
                                            <i class="fas fa-chevron-left m-auto"></i>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-8 px-0">
                                    <div class="w-100" style="white-space: nowrap; overflow-x: scroll; overflow-y:hidden; line-height:0">
                                        @for ($i = 0; $i < ceil(count($data->store_item_images)/4); $i++)
                                        <div class="d-inline-block w-100" style="">
                                            <div class="row m-0" style="">
                                                @foreach ($data->store_item_images as $image)
                                                    <div class="col-3 px-1">
                                                        <div class="square-image">
                                                            <img src="{{ asset($image->image_url) }}" alt="" style="border-radius: 6px;">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> 
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary w-100 h-100" style="">
                                        <div class="d-flex h-100">
                                            <i class="fas fa-chevron-right m-auto"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-7 col-sm-12 mt-md-5 mt-lg-0 pl-md-5">
                    <div class="product-name">
                        <h1>{{ $data->name }}</h1>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="product-rate-star">
                            @include('inc.star_rating', ['star_count'=>floor($data->rating) ?? 0, 'rating_count'=>$data->rating_count])
                        </div>
                        <div class="border-right ml-md-4 pr-4">
                            <a class="font-primary" href="#">Lihat Semua</a>
                        </div>
                        <div class="d-flex align-items-center ml-3">
                            <i class="fa fa-check-circle" style="color:#263A81;" aria-hidden="true"></i>
                            <span class="text-muted ml-1">{{ $data->sold }} Orders</span>
                        </div>

                    </div>
                    <div class="align-items-center justify-content-between mt-4" style="display: flex;">
                        <div class="priceInfo">
                            <h2 class="font-bold">Rp {{ number_format($data->store_item_price, 0, ',', '.') }}</h2>
                        </div>
                        <div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if($wishlist)
                                    <a href="{{ route('customer.wishlist.delete', ['id'=>$data->id, 'from'=>'d']) }}"><i class="fa fa-heart text-danger" style="font-size: 32px" aria-hidden="false"></i></a>
                                @else
                                    <a href="{{ route('customer.wishlist.add', ['id'=>$data->id, 'from'=>'d']) }}"><i class="fa fa-heart text-muted" style="font-size: 32px" aria-hidden="false"></i></a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('order.buy') }}" method="POST">
                        @csrf
                        @include('inc.alert')
                        {!! Form::hidden('id_store_item', $data->id) !!}
                        {!! Form::hidden('id_store', $data->store->id) !!}
                        <div class="d-flex align-items-center mt-4">
                            <div class="text-muted">Kuantitas</div>
                            <div class="d-flex ml-sm-3">
                                {!! Form::number('quantity', 1, ['class'=>'form-control', 'id'=>'quantity', 'min'=>1, 'max'=>100, 'step'=>1, 'required']) !!}
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <button class="btn-primary rounded px-4 py-2 mr-md-4" type="submit" value="buynow" name="submit">Beli Sekarang</button>
                            <button class="btn-secondary rounded px-4 py-2 mr-md-4" type="submit" value="cart" name="submit">Tambahkan ke Keranjang</button>
                            <a href=""></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card py-5 px-5 mb-5">
            <div>
                <h3 class="mb-4">Deskripsi Produk</h3>
                <p class="text-muted">
                    {{ $data->store_item_description }}
                </p>
            </div>
            <div class="d-flex align-items-center mt-5">
                <div class="profilePicture" style="width: 100px; height: 100px; background-image: url('{{ $data->store->image_url }}'); background-size: contain; border-radius: 40px"></div>
                <div class="ml-4">
                    <h3>{{ $data->store->name }}</h3>
                    <a href="{{ route('home.store.detail', ['id' => $data->store->id]) }}" class="btn btn-light px-3 py-2">
                        <i class="fas fa-store mr-2"></i>
                        Kunjungi Toko
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card p-4 p-md-5 mb-5">
            <h4 class="font-semiBold mb-4 mb-md-4">Review Product</h4>
            <div class="" style="overflow: scroll; max-height: 400px">
                @if (count($reviews) > 0)
                    @foreach ($reviews as $review)
                        <div class="p-4 mb-4" style="border: 1px solid rgba(219, 219, 219, 1); border-radius: 4px;">
                            <div class="product-rate-star mb-2">
                                @for ($i = 0; $i < $review->rate; $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                                @for ($i = 0; $i < (5 - $review->rate); $i++)
                                    <span class="fa fa-star"></span>
                                @endfor
                                <span class="ml-2">{{ $review->rate }}</span>
                            </div>
                            <p class="mb-2">"{{ $review->description }}"</p>
                            <h4 class="font-bold font-primary">{{ $review->customer->name }}</h4>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted mb-0">No review yet.</p>
                @endif
                
            </div>
        </div>
    </div>

    <div class="container">
        <div>
            <div class="product-list-header px-sm-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h2>Produk Lainnya</h2></div>
                    <a class="font-primary font-bold" href="http://">Lihat Semua</a>
                </div>
                
                    <div class="row product-grid">
                        @foreach ($related_products as $idx => $related_product)
                             @if($idx == 3)
                                 @break
                             @else
                                 <div class="col-6 col-md-3 py-3">
                                     <a href="{{ url('item/'.$related_product->id.'/detail') }}">
                                        <div class="card">
                                            <div class="p-2">
                                                <div class="square-image">
                                                    <img src="{{ $related_product->store_item_images[0]->image_url }}" alt="">
                                                </div>
                                            </div>
                                            
                                            <div class="card-body">
                                                <p class="card-text text-muted" style="font-size: 12px;">{{ $related_product->store->name }}</p>
                                                <h4 class="card-title mb-2">{{ $related_product->name }}</h4>
                                                <div class="product-rate-star mb-2">
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="ml-2">{{ $related_product->rating_count }}</span>
                                                </div>
                                                <div class="product-price d-flex justify-content-between align-items-end">
                                                    <h5 class="font-bold">Rp{{ number_format($related_product->store_item_price, 0, ',', '.') }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                     </a>
                                 </div>
                             @endif                           
                        @endforeach
                     </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
    <script>
        $(document).ready(function (){
            $('#quantity').inputSpinner();
        });
    </script>
@endsection
