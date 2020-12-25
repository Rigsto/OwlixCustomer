@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
    <div class="container">
        <?php $total = 0;?>
        <div class="row my-3 px-5 py-3 checkoutDetail">
            <div class="col col-9 ">
                <div class="card my-5 px-3 py-3 rounded-medium">
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data['data'] as $order)
                            @if ($order['id_customer'] == Session::get('user.data.id'))
                                @foreach ($order['order_items'] as $item)
                                    <?php
                                    $total = $total + ($item['quantity']*$item['store_item']['store_item_price']);
                                    $order_id = $order['id'];
                                    ?>
                                    @csrf
                                    {{-- {{ json_encode($item) }} --}}
                                    <tr class="my-5">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="productThumbnail">
                                                    <img src={{ $item['store_item']['store_item_images'][0]['image_url'] }} class="rounded" alt="">
                                                </div>
                                                <div class="ml-3">
                                                    <h5 class="truncate">{{ $item['store_item']['name'] }}</h5>
                                                    <p class="text-muted">{{ $item['store_item']['store_item_description'] }}</p>
                                                </div>
                                            </div></td>
                                        <td>Rp {{ $item['store_item']['store_item_price']}}</td>
                                        <td><input type="number" value="{{ $item['quantity']}}" min="0" max="1000" step="10"/></td>
                                        <td><p>Rp {{ $item['quantity']*$item['store_item']['store_item_price']}}</p></td>
                                        <td>
                                            <a href="" class="mr-4 text-muted" style="font-size: 20px;"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="" class="mr-4 text-danger" style="font-size: 20px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div style="width: 100%; height: 1px; background-color: rgb(196, 196, 196);"></div>
                    <div class="my-3">
                        <a href="" class="mr-4 text-danger float-right" style="font-size: 16px;"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Kosongkan Keranjang</a>
                    </div>
                </div>

            </div>
            <div class="col col-3 ">
                <div class="card my-5 px-3 py-4 rounded-medium">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">Subtotal :</p>
                        <p>Rp {{$total}}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-muted">Diskon :</p>
                        <p style="color: #223b85;">Rp 78.000 (-20%)</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                        <p class="text-muted">Promo</p>
                        <a href="">Masukkan Kode Promo</a>
                    </div>
                    <div class="promo-code mb-4 px-3 py-3 rounded" style="background-color: rgb(244, 245, 255);">
                        <form class="form-inline row">
                            <div class="mb-2 col-lg-8">
                                <input type="password" class="form-control w-100" id="inputPassword2" placeholder="Kode Promo">
                            </div>
                            <div class="mb-2 col-lg-4"><button type="submit" class="btn btn-primary w-100">Pakai</button></div>

                        </form>
                        <p class="text-primary">
                            20% Discount
                        </p>
                    </div>

                    <div style="width: 100%; height: 1px; background-color: rgb(196, 196, 196);"></div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>Total</p>
                        <p>Rp 390.000</p>
                    </div>
                    <div>
                        <button class="btn-primary rounded w-100 py-2 px-3 mt-5 h5" onclick="window.location.href='checkout'">
                            Checkout
                        </button>
                        <button class="btn btn-light rounded w-100 py-2 px-3 mt-2 h5">
                            Lanjutkan Belanja
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
