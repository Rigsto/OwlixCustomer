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
                        @php
                        $total = 0;
                        @endphp
                        @foreach($items as $id => $item)
                            <tr class="my-5">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="productThumbnail">
                                            <img src="{{ asset('img/accountlogo.png') }}" alt="{{ $item->name }} picture">
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="truncate">{{ $item->name }}</h5>
                                            <p class="text-muted">{{ $item->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Rp. {{ number_format(0, 0, "", ".") }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format(($item->quantity) * 0, 0, "", ".") }}</td>
                                @php $total += $item->quantity * 0; @endphp
                                <td>
                                    <a href="{{ route('order.cart.favorite', $item->id) }}" class="mr-4 text-muted" style="font-size: 20px;">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('order.cart.remove', $item->id) }}" class="mr-4 text-danger" style="font-size: 20px;">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
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
                        <p>Rp. {{ number_format($total, 0, "", ".") }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-muted">Diskon :</p>
                        <p style="color: #223b85;">Rp. {{ number_format(50000, 0, "", ".") }} (-20%)</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                        <p class="text-muted">Promo</p>
                        <a data-toggle="collapse" href="#kodePromo" role="button" aria-expanded="false" aria-controls="kodePromo">Masukkan Kode Promo</a>
                    </div>
                    <div class="promo-code mb-4 px-3 py-3 rounded collapse" style="background-color: rgb(244, 245, 255);" id="kodePromo">
                        <form class="form-inline row">
                            <div class="mb-2 col-lg-8">
                                <input type="text" class="form-control w-100" id="kode_promo" placeholder="Kode Promo" name="kode_promo">
                            </div>
                            <div class="mb-2 col-lg-4"><button type="submit" class="btn btn-primary w-100 btn-sm">Pakai</button></div>
                        </form>
                        <p class="text-primary">
                            20% Discount
                        </p>
                    </div>

                    <div style="width: 100%; height: 1px; background-color: rgb(196, 196, 196);"></div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>Total</p>
                        <p>Rp. {{ number_format(123456, 0, "", ".") }}</p>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary rounded w-100 py-2 px-3 mt-3 h5">
                            Checkout
                        </a>
                        <a href="" class="btn btn-light rounded w-100 py-2 px-3 mt-2 h5">
                            Lanjutkan Belanja
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
