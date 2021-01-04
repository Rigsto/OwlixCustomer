@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
    <div class="container">
        <?php $total = 0;?>
        <div class="row my-3 px-5 py-3 checkoutDetail">
            <div class="col col-9 ">
                <div class="card my-5 px-3 py-3 rounded-medium">
                    @if(count($items) > 0)
                        <table class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Produk</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Kuantitas</th>
                                <th scope="col" class="text-center">Total</th>
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
                                                <h5 class="truncate"><a href="{{ route('home.item.detail', $item->store_item_id) }}">{{ $item->name }}</a></h5>
                                                <p class="text-muted">{{ $item->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp. {{ number_format($item->price, 0, "", ".") }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-center">Rp. {{ number_format(($item->quantity) * ($item->price), 0, "", ".") }}</td>
                                    @php $total += $item->quantity * $item->price; @endphp
                                    <td class="text-center">
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
                            <a href="{{ route('order.cart.remove.all') }}" class="mr-4 text-danger float-right" style="font-size: 16px;">
                                <i class="fa fa-trash mr-2" aria-hidden="true"></i>Kosongkan Keranjang
                            </a>
                        </div>
                    @else
                        <h5 class="text-center">Keranjang Belanja Kosong</h5>
                    @endif
                </div>
            </div>
            <div class="col col-3 ">
                <div class="card my-5 px-3 py-4 rounded-medium">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted">Subtotal :</p>
                        <p>Rp. {{ number_format($total, 0, "", ".") }}</p>
                        <p id="subtotal" class="d-none">{{ $total }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-muted">Diskon :</p>
                        <p style="color: #223b85;" id="discount_number_text">Rp. {{ number_format(0, 0, "", ".") }} (0%)</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                        <p class="text-muted">Kode Promo</p>
                        <a data-toggle="collapse" href="#kodePromo" role="button" aria-expanded="false" aria-controls="kodePromo" id="kode_promo_text">Masukkan Kode Promo</a>
                    </div>
                    <div class="promo-code mb-4 px-3 py-3 rounded collapse" style="background-color: rgb(244, 245, 255);" id="kodePromo">
                        <div class="form-inline row">
                            <div class="mb-2 col-lg-8">
                                <input type="text" class="form-control w-100" id="kode_promo" placeholder="Kode Promo" name="kode_promo">
                            </div>
                            <div class="mb-2 col-lg-4">
                                <button type="submit" class="btn btn-primary w-100 btn-sm" id="kode_click">Pakai</button>
                            </div>
                        </div>
                        <p class="text-primary" id="discount_percentage_text">
                            0% Discount
                        </p>
                    </div>

                    <div style="width: 100%; height: 1px; background-color: rgb(196, 196, 196);"></div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>Total</p>
                        <p id="total_text">Rp. {{ number_format($total, 0, "", ".") }}</p>
                    </div>
                    <div>
                        @if(count($items) > 0)
                            <form action="{{ route('order.cart.checkout') }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-primary rounded w-100 py-2 px-3 mt-3 h5">
                                    Checkout
                                </button>
                            </form>
                        @endif
                        <a href="" class="btn btn-light rounded w-100 py-2 px-3 mt-2 h5">
                            Lanjutkan Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
             $('#kode_click').click(function (){
                 const promo = $('#kode_promo').val();
                 const total = $('#subtotal').html();

                 $.ajax({
                     url: "{{ route('order.cart.promo') }}",
                     method: "GET",
                     data: {
                         code: promo,
                         total: total,
                     },
                     success: function (data){
                         const dis = data.discount * total / 100;

                         $('#kode_promo_text').html(promo);
                         $('#discount_percentage_text').html(data.discount + "% discount");
                         $('#discount_number_text').html("Rp. " + formatNumber(dis) + " (" + data.discount + "%)");
                         $('#total_text').html("Rp. " + formatNumber(total-dis));
                     }
                 });
             });
        });

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }
    </script>
@endsection
