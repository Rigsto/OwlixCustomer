@extends('inc.app')
@section('content')
    @include('inc.filter')

    <div class="container">
        <div class="row my-5">
            <div class="col-md-3">
                <div class="card" id="kategori" style="width: 17rem">
                    <div class="card-header">
                        Kategori Produk
                    </div>
                    <ul class="list-group list-group-flush">
                        <form action="{{ url()->previous() }}" method="GET">
                            <button class="btn font-muted-dark text-left w-100 p-0" style="border:0px;">
                                <li class="@if(!isset($category_id)) bg-primary-alt @endif list-group-item border-bottom">Semua Produk</li>
                            </button>
                            <input type="hidden" name="product_name" value="{{ $search_query }}">
                            <input type="hidden" name="current_page" value="{{ $current_page }}">
                        </form>
                        @foreach($categories as $idx => $cat)
                            <form action="{{ url('products') }}" method="GET">
                                <button class="btn font-muted-dark text-left w-100 p-0" style="border:0px;">
                                    <li class="@isset($category_id) @if($category_id == $cat['id']) bg-primary-alt @endif @endisset list-group-item border-bottom">{{ $cat['name'] }}</li>
                                </button>
                                <input type="hidden" name="category_id" value="{{ $cat['id'] }}">
                                <input type="hidden" name="product_name" value="{{ $search_query }}">
                                <input type="hidden" name="current_page" value="{{ $current_page }}">
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="d-flex my-4 justify-content-between">
                    <h5 class="font-muted font-semiBold m-0">Hasil pencarian untuk <span class="font-primary">'{{ $search_query }}'</span></h5>
                    <div class="d-flex">
                        <h5 class="font-muted mr-3 mb-0">{{ $current_page }}/@if($total_page > 0){{ $total_page }}@else{{1}}@endif</h5>
                        <div class="d-flex">
                            <form class="mr-3" action="{{ url('products') }}" method="GET">
                                <button class="btn p-0" style="border: 0px; vertical-align: unset;" @if($current_page == 1) disabled @endif>
                                    <i class="fas fa-chevron-left" style="font-size: 17px"></i>
                                </button>
                                @isset($category_id)
                                    <input type="hidden" name="category_id" value="{{ $category_id}}">
                                @endisset
                                <input type="hidden" name="product_name" value="{{ $search_query }}">
                                <input type="hidden" name="current_page" value="{{ $current_page - 1 }}">
                            </form>

                            <form action="{{ url('products') }}" method="GET">
                                <button class="btn p-0" style="border: 0px; vertical-align: unset;" @if($current_page == $total_page || $total_page == 0) disabled @endif>
                                    <i class="fas fa-chevron-right" style="font-size: 17px"></i>
                                </button>
                                @isset($category_id)
                                    <input type="hidden" name="category_id" value="{{ $category_id}}">
                                @endisset
                                <input type="hidden" name="product_name" value="{{ $search_query }}">
                                <input type="hidden" name="current_page" value="{{ $current_page + 1 }}">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                        <div class="col-4 mb-4">
                            @include('items.item_product', [$product])
                        </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-muted">No product found.</p>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('scripts')
@endsection
