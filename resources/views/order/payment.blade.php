@extends('inc.app')
@section('content')
    @include('inc.order_topnav')
    <div class="container d-flex justify-content-center">
        <div class="card px-lg-5 py-lg-5 rounded-medium my-5 text-center">
            <p>Kode Invoice</p>
            <h4>INV lalala</h4>
            <div class="px-5 py-4 mt-3" style="background-color: #fbfbfb">
                <div class="px-5 py-3 my-3">
                    <p class="text-muted">Selamat! Pesananmu sudah terbuat. Segera lakukan pembayaran sebelum:</p>
                    <h4>22 Jam : 33 Menit : 19 Detik</h4>
                </div>
                <div class="px-5">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td style="text-align: left;">Total</td>
                            <td style="text-align: right; font-size: 16px; font-weight: 500;">Rp 409.000</td>
                        </tr>
                        <tr>

                            <td style="text-align: left;">Metode Pembayaran</td>
                            <td style="text-align: right;">BCA</td>
                        </tr>
                        <tr>

                            <td style="text-align: left;">Kode Virtual Account<br>
                                <h5>0213241241515815</h5>
                                <input type="text" value="0213241241515815" id="kodeVA" style="display: none;">
                            </td>
                            <td style="text-align: right;">
                                <button class="btn btn-light" onclick="copyCode()">Salin</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <a class="btn btn-primary py-3 px-4 mt-4 rounded" href="{{ route('order.payment.success') }}">Konfirmasi Pembayaran</a>
            </div>
        </div>
    </div>
@endsection
