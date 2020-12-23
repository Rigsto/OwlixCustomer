<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owlix | Mie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body{
            background-color: #FAFAFA;
        }
    </style>

</head>
<body>
  <section style="background-color: white">
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light px-lg-5">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.svg" alt="logo"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="scollapse navbar-collapse" id="collapsibleNavId">
                <form class="input-group md-form form-sm form-4 px-2 mx-lg-5  mt-2 search-bar">
                    <input class="form-control w-75 my-0 py-1 red-border" type="text" style="background-color: transparent;"placeholder="Search" aria-label="Search">
                    <button class="input-group-append btn btn-secondary align-items-center" type="button">
                     <i class="fa fa-search text-grey mx-1"></i>
                    </button>
                  </form>
                <ul class="navbar-nav mt-2 mt-lg-0 align-items-center">
                    <li class="nav-item active border-right pr-4">
                        <a class="nav-link d-flex" href="#">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                              </svg>
                          <div class="itemsDot rounded-circle bg-warning position-absolute ml-4" style="width: 1em; height: 1em;">
                          </div>
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        @if (Session::get('user') !== null)
                        <div class="btn-group" id="profileDropdown">
                            <div class="d-flex align-items-center">
                                <div class="profileDropdownImg"></div>
                                <div class="text-left">
                                    <p class="text-muted mb-0 small">Akun</p>
                                    <p class="mt-0 mb-0 font-weight-bold">{{Session::get('user.data.name')}}</p>
                                </div>
                            </div>
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false" style="background-color: transparent!important">
                              
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-right">
                                <button class="dropdown-item" type="button" onclick="window.location.href='{{ url('profil')}}'">Profil</button>
                                  <button class="dropdown-item" type="button">Pesanan</button>
                                  <button class="dropdown-item" type="button" onclick="window.location.href='{{ url('logout')}}'">Keluar</button>
                                </div>
                          </div>
                          @else
                        <button class="btn-primary px-4 py-2 rounded" type="button" onclick="window.location.href='{{ url('login') }}'">Login</button>
                        @endif
                    </li>
                </ul>
                
            </div>
        </nav>

      </div>
  </section>

<section>
    <div class="container" id="profileSections">
        <div class="card px-5 py-5 mx-5 mt-5 rounded-medium" >
            <div class="d-flex justify-content-lg-between">
                <div class="d-flex">
                    <div style="background-image: url('assets/img/shopOwner.png');" class="ProfilePicture"></div>
                    <div class="mx-3">
                         <h4 id="UserProfileName">{{Session::get('user.data.name')}}</h4>
                         <p class="text-primary my-0">{{Session::get('user.data.email')}}</p>
                         <p>+628093847383</p>
                    </div>
                 </div>
                 <div style="max-width: 138px;">
                     <div> <button class="small-btn-primary px-3 py-2 w-100" onclick="window.location.href='{{ url('edit')}}'"><i class="fas fa-pen mr-2"></i>Edit Profil</button></div>
                     <div class="mt-3"> <button class="small-btn-secondary px-3 py-2 w-100"><i class="fas fa-comment-dots mr-2"></i>Bantuan</button></div>
                 </div>
            </div>
           
        </div>
        <div class="card px-5 py-5 mx-5 my-5 rounded-medium" >
            <ul class="nav nav-pills mb-3 justify-content-sm-between" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-belum-bayar-tab" data-toggle="pill" href="#pills-belum-bayar" role="tab" aria-controls="pills-belum-bayar" aria-selected="true">Belum bayar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-diproses-tab" data-toggle="pill" href="#pills-diproses" role="tab" aria-controls="pills-diproses" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-dikirim-tab" data-toggle="pill" href="#pills-dikirim" role="tab" aria-controls="pills-dikirim" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">Selesai</a>
                  </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active my-4" id="pills-belum-bayar" role="tabpanel" aria-labelledby="pills-belum-bayar-tab">
                    @foreach ($data['data'] as $item)
                    <div class="card px-4 py-4 mb-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary"> {{ $item['external_id'] }} </p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a href="">Lihat</a></span></p>
                                <button class="btn btn-primary py-3 px-4 mt-4 rounded">Konfirmasi Pembayaran</button>

                            </div>
                            <div class="col-sm-6">
                                <table class="table table-striped">
                                    <tbody>
                                      <tr>
                                        <td style="text-align: left;">Total</td>
                                        <td style="text-align: right; font-size: 16px; font-weight: 500;">Rp {{$item['amount']}}</td>
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
                        
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade my-4" id="pills-diproses" role="tabpanel" aria-labelledby="pills-diproses-tab">
                    <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-6">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-6">
                               <p class="text-right font-weight-bold " style="color:  #e8af12;">SEDANG DIKONFIRMASI KE TOKO</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade my-4" id="pills-dikirim" role="tabpanel" aria-labelledby="pills-dikirim-tab">
                    <div class="card px-4 py-4 rounded-medium" id="Transaction_detail_PaymentOnHold">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-8">
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-4">
                               <p class="font-weight-bold " style="color:  #e8af12;"><i class="fas fa-shipping-fast mr-2"></i>SEDANG DIKIRIM</p>
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
                                <p id="OrderInvoiceNumber" class="font-weight-bold text-primary">INV/41515426/43634214151</p>
                                <p class="text-muted mb-0">04 Agustus 2020, 09:45</p>
                                <p class="mt-1" style="font-weight: 500;">Hendy Shop | 3 Barang <span><a href="">Lihat</a></span></p>
                            </div>
                            <div class="col-sm-4">
                               <p class="font-weight-bold text-success"><i class="fas fa-clipboard-check mr-2"></i>TERKIRIM</p>
                               <p class="text-muted mb-0">Diterima Pada:</p>
                               <p class="mt-1" style="font-weight: 500;">09 Agustus 2020, 12:30</span></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
              </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>
  <script>
    AOS.init();
  </script>
</body>
</html>