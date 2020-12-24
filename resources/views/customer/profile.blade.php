@extends('inc.app')
@section('content')
    <div class="container" id="profileSections">
        <div class="card px-5 py-5 mx-5 mt-5 rounded-medium">
            <div class="d-flex justify-content-lg-between">
                <div class="d-flex">
                    <div style="background-image: url('{{ asset("img/shopOwner.png") }}');" class="ProfilePicture"></div>
                    <div class="mx-3">
                        <h4 id="UserProfileName">{{ $profile['name'] }}</h4>
                        <p class="text-primary my-0">{{ $profile['email'] }}</p>
                        <p>{{ $profile['phone_number'] }}</p>
                    </div>
                </div>
                <div style="max-width: 138px;">
                    <div>
                        <a href="{{ route('customer.profile.edit') }}" class="small-btn-primary px-3 py-2 w-100">
                            <i class="fas fa-pen mr-2"></i>
                            Edit Profil
                        </a>
                    </div>
                    <div class="mt-3">
                        <button class="small-btn-secondary px-3 py-2 w-100"><i class="fas fa-comment-dots mr-2"></i>Bantuan
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <div class="card px-5 py-5 mx-5 my-5 rounded-medium">
            <ul class="nav nav-pills mb-3 justify-content-sm-between" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-belum-bayar-tab" data-toggle="pill" href="#pills-belum-bayar"
                       role="tab" aria-controls="pills-belum-bayar" aria-selected="true">Belum bayar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-diproses-tab" data-toggle="pill" href="#pills-diproses" role="tab"
                       aria-controls="pills-diproses" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-dikirim-tab" data-toggle="pill" href="#pills-dikirim" role="tab"
                       aria-controls="pills-dikirim" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab"
                       aria-controls="pills-selesai" aria-selected="false">Selesai</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active my-4" id="pills-belum-bayar" role="tabpanel"
                     aria-labelledby="pills-belum-bayar-tab">
                    @foreach ($orders as $item)
                        <div class="card px-4 py-4 mb-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <p id="OrderInvoiceNumber"
                                       class="font-weight-bold text-primary"> {{ $item['external_id'] }} </p>
                                    <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                    <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a href="">Lihat</a></span>
                                    </p>
                                    <button class="btn btn-primary py-3 px-4 mt-4 rounded">Konfirmasi Pembayaran
                                    </button>

                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td style="text-align: left;">Total</td>
                                            <td style="text-align: right; font-size: 16px; font-weight: 500;">
                                                Rp {{$item['amount']}}</td>
                                        </tr>
                                        <tr>

                                            <td style="text-align: left;">Metode Pembayaran</td>
                                            <td style="text-align: right;">BCA</td>
                                        </tr>
                                        <tr>

                                            <td style="text-align: left;">Kode Virtual Account<br>
                                                <h5>0213241241515815</h5>
                                                <input type="text" value="0213241241515815" id="kodeVA"
                                                       style="display: none;">
                                            </td>
                                            <td style="text-align: right;">
                                                <button class="btn btn-light" onclick="copyCode()">Salin</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade my-4" id="pills-diproses" role="tabpanel"
                     aria-labelledby="pills-diproses-tab">
                    <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-6">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">
                                    INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a
                                            href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-right font-weight-bold " style="color:  #e8af12;">SEDANG DIKONFIRMASI KE
                                    TOKO</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade my-4" id="pills-dikirim" role="tabpanel" aria-labelledby="pills-dikirim-tab">
                    <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-8">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">
                                    INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a
                                            href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="font-weight-bold " style="color:  #e8af12;"><i
                                        class="fas fa-shipping-fast mr-2"></i>SEDANG DIKIRIM</p>
                                <p class="text-muted mb-0">J&T Reguler</p>
                                <p class="mt-1" style="font-weight: 500;">Resi : 21415474523523</span></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade my-4" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
                    <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-8">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">
                                    INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a
                                            href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="font-weight-bold text-success"><i class="fas fa-clipboard-check mr-2"></i>TERKIRIM
                                </p>
                                <p class="text-muted mb-0">Diterima Pada:</p>
                                <p class="mt-1" style="font-weight: 500;">09 Agustus 2020, 12:30</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
