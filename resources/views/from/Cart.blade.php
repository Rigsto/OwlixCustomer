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
<body >
  <section style="background-color: white" class="pb-4">
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light px-lg-5">
            <div class="d-flex align-items-center mr-4">
                <a class="navbar-brand border-right pr-3" href="{{url('/')}}"><img src="assets/img/logo.svg" alt="logo"></a>
                <h4 class="mb-0">Keranjang</h4>
            </div>
           
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="scollapse navbar-collapse" id="collapsibleNavId">
                
                <ul class="navbar-nav mt-2 mt-lg-0 w-100 align-items-center justify-content-between">
                    <li class="nav-item ml-4 px-lg-3 w-100">
                        <form class="input-group md-form form-sm form-4  mt-2 search-bar">
                            <input class="form-control w-75 my-0 py-1 red-border" type="text" style="background-color: transparent;"placeholder="Search" aria-label="Search">
                            <button class="input-group-append btn btn-secondary align-items-center" type="button">
                             <i class="fa fa-search text-grey mx-1"></i>
                            </button>
                          </form>
                    </li>
                    <li class="nav-item ml-4">
                        @if (Session::get('user') !== null)
                        <div class="btn-group" id="profileDropdown">
                            <div class="d-flex align-items-center">
                                <div class="profileDropdownImg mx-2"></div>
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
                          <button class="btn-primary px-4 py-2 rounded" type="button" onclick="window.location.href='Login.html'">Login</button>
                          @endif
                    </li>
                </ul>
                
            </div>
        </nav>
        <div class="d-flex justify-content-center pt-4 align-items-center w-100">
            <div class="d-flex align-items-center step-element mx-5">
                <div class="rounded-circle-active">
                    1
                </div>
                <div class="step-desc-active">
                    Keranjang
                </div>
            </div>
            <div class="d-flex align-items-center step-element mx-5">
                <div class="rounded-circle-inactive">
                    2
                </div>
                <div class="step-desc-inactive">
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
  <section>
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