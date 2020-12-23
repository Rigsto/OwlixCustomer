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
    <script src='js/actions.js'></script>
    <style>
        body{
            background-color: #FAFAFA;
        }
    </style>
</head>
<body >
  <section style="background-color: white" class="pb-4">
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light px-lg-5">
            <div class="d-flex align-items-center mr-4">
                <a class="navbar-brand border-right pr-3" href="index.html"><img src="assets/img/logo.svg" alt="logo"></a>
                <h4 class="mb-0">Keranjang</h4>
            </div>
           
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
                <ul class="navbar-nav mt-2 mt-lg-0">
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
        <div class="d-flex justify-content-center pt-4 align-items-center w-100 h-100">
            <div class="d-flex align-items-center step-element mx-5">
                <div class="rounded-circle-finished">
                    <i class="fas fa-check" aria-hidden="true"></i>
                </div>
                <div class="step-desc-active">
                    Keranjang
                </div>
            </div>
            <div class="d-flex align-items-center step-element mx-5">
                <div class="rounded-circle-active">
                    2
                </div>
                <div class="step-desc-active">
                    Checkout
                </div>
            </div>
            <div class="d-flex align-items-center step-element mx-5">
                <div class="rounded-circle-inactive">
                    3
                </div>
                <div class="step-desc-inactive">
                   Pembayaran
                </div>
            </div>
            <div class="d-flex align-items-center step-element mx-5">
                <div class="rounded-circle-inactive">
                    4
                </div>
                <div class="step-desc-inactive">
                    Selesai
                </div>
            </div>
        </div>
      </div>
  </section>
<section >
    <div class="container">
        <div class="row my-3 px-5 py-3 checkoutAfterDetail">
            <div class="col col-7 ">
                <div class="card my-5 px-5 py-5 rounded-medium">
                    <div><h4>
                        Detail Pengiriman
                    </h4></div>
                    <div class="my-4">
                        <div class="row detailAlamatPenerimaShow" id="detailAlamat">
                            <div class="col-lg-6 col-md-12">
                                <p class="text-muted">Alamat Pengiriman</p>
                                <p>Jl. Raya Boteng 68, Menganti, Gresik</p>
                                <p>60228</p>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p class="text-muted">Penerima</p>
                                <p>{{Session::get('user.data.name')}}</p>
                                <p>{{Session::get('user.data.phone_number')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <a onclick='showNewAddressForm()' style="text-decoration: none; color: #223b85;" id="UbahAlamat">Ubah Alamat</a>
                            </div>
                        </div>
                        <form class="addNewAddressFormHide mt-5" id="alamatForm">
                            <div class="form-row">
                              <div class="form-group col-md-6 pr-3">
                                <label for="inputEmail4">Nama Lengkap</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                              </div>
                              <div class="form-group col-md-6 pr-3">
                                <label for="inlineFormInputGroupUsername">No. Telpon</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">+62</div>
                                  </div>
                                  <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Telpon">
                                </div>
                              </div>
                            </div>

                            <div class="form-row mt-3">
                              <div class="form-group col-md-4 pr-3">
                                <label for="inputState">Provinsi</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                                
                              </div>
                              <div class="form-group col-md-6 pr-3">
                                <label for="inputCity">Kota</label>
                                <input type="text" class="form-control" id="inputCity">
                              </div>
                              <div class="form-group col-md-2 pr-3">
                                <label for="inputZip">Kode pos</label>
                                <input type="text" class="form-control" id="inputZip">
                              </div>
                            </div>
                            <div class="form-group mt-3 pr-3">
                                <label for="inputAddress">Alamat</label>
                                <textarea class="form-control" id="inputAddress" placeholder="1234 Main St"></textarea>
                              </div>
                            <button type="submit" class="btn btn-secondary">Simpan Alamat</button>
                          </form>
                    </div>
                   <div style="width: 100%; height: 1px; background-color: rgb(229, 229, 229);"></div>
                    <div class="my-4">
                        <form action="" class="shippingServices p-2 rounded">
                                <input class="radio-btn" name="radio-collection" id="radio-1" type="radio" checked>
                                <label class="radio-label d-flex justify-content-between" for="radio-1"><span>JNE Reguler</span><span>Rp 19.000</span></label>

                                <input class="radio-btn" name="radio-collection" id="radio-2" type="radio">
                                <label class="radio-label d-flex justify-content-between" for="radio-2"><span>J&T</span><span>Rp 18.000</span></label>

                                <input class="radio-btn" name="radio-collection" id="radio-3" type="radio">
                                <label class="radio-label d-flex justify-content-between" for="radio-3"><span>TIKI</span><span>Rp 18.000</span></label>

                                <input class="radio-btn" name="radio-collection" id="radio-4" type="radio">
                                <label class="radio-label d-flex justify-content-between" for="radio-4"><span>Si Cepat</span><span>Rp 20.000</span></label>

                                <input class="radio-btn" name="radio-collection" id="radio-5" type="radio">
                                <label class="radio-label d-flex justify-content-between" for="radio-5"><span>Wahana</span><span>Rp 15.000</span></label>
                        </form>
                    </div>

                   <div class="my-3">
                     <a href="" class="mr-4 text-danger float-right" style="font-size: 16px;"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Kosongkan Keranjang</a>
                   </div>
                </div>
           
            </div>
           
               <div class="col col-5 ">
                   <div class="card mt-5 px-3 py-3 rounded-medium checkoutAfterDetail">
                    <table class="table table-light">
                        <thead>
                          <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($data['data'] as $order)
                        @if ($order['id_customer'] == Session::get('user.data.id')) 
                        @foreach ($order['order_items'] as $item)
                        @csrf
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
                            <td style="text-align: center;"><p>{{ $item['quantity']}}</p></td>
                            <td><p>Rp {{ $item['quantity']*$item['store_item']['store_item_price']}}</p></td>
                          </tr>
                        @endforeach
                        @endif
                        @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-between align-items-center px-2 pb-3 font-weight-normal">
                       
                            <a href="" class="text-primary float-right" style="font-size: 14px;">Tambahkan Catatan</a>
                            <a href="" class="text-primary float-right" style="font-size: 14px;">Edit Keranjang</a>
                          
                      </div>
                      <div style="width: 100%; height: 1px; background-color: rgb(225, 225, 225);" ></div>
                      <div class="amountDetail px-3 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted">Subtotal :</p>
                            <p>Rp 139.000</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p class="text-muted">Diskon :</p>
                            <p style="color: #223b85;">Rp 78.000 (-20%)</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p class="text-muted">Biaya Pengiriman :</p>
                            <p>Rp 19.000</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <p class="font-weight-medium">Total :</p>
                            <p class="h4">Rp 402.000</p>
                        </div>
                      </div>
                      
                   </div>
                   <div class="card mt-3 px-4 py-4 rounded-medium checkoutAfterDetail">
                    <div><h5>
                        Metode Pembayaran
                    </h5></div>
                    <div class="my-3">
                        <form action="">
                            <div class="form-row align-items-center">
                                <div class="col-3">
                                    <img src="assets/img/bcaLogo.svg" alt="" class="w-100" style="max-width: 90px;">
                                </div>
                                <div class="col-9">
                                    <select id="inputState" class="custom-select">
                                        <option selected>BCA</option>
                                        <option>Mandiri</option>
                                        <option>BNI</option>
                                        <option>BRI</option>
                                        <div class="dropdown-divider"></div>
                                        <option>GOPAY</option>
                                        <option>OVO</option>
                                        <option>DANA</option>
                                      </select>
                                </div>
                            </div>
                            <div class="my-3">
                                <p class="text-muted" style="font-size: 14px;">Transfer Melalui Rekening bank BCA</p>
                            </div>
                            <div class="mt-4 w-100 ">
                                <button type="submit" class="btn btn-primary float-right py-2 px-3">Konfirmasi & Bayar Pesanan</button>
                            </div>
                        </form>
                    </div>
                    
                   </div>
               </div>
              
              
           </div>
        </div>
    </div>
    
    <div class="container">
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