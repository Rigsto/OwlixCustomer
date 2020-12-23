<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owlix | Mie</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<body >
  <section>
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light px-lg-5">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.svg" alt="logo"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="scollapse navbar-collapse" id="collapsibleNavId">
                <form class="input-group md-form form-sm form-4 px-4 mx-lg-4 mt-2 search-bar">
                    <input class="form-control w-50 my-0 py-1 red-border" type="text" style="background-color: transparent;"placeholder="Search" aria-label="Search">
                    <button class="input-group-append btn btn-secondary align-items-center" type="button">
                     <i class="fa fa-search text-grey mx-1"></i>
                    </button>
                  </form>
                <ul class="navbar-nav mt-2 mt-lg-0 align-items-center">
                    <li class="nav-item active border-right pr-4">
                        <a class="nav-link d-flex" href="{{ url('Cart') }}">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                              </svg>
                          <p class="text-center text-light itemsDot rounded-circle bg-warning position-absolute ml-4 align-items-center" style="width: 1.6em; height: 1.6em;">
                           2
                          </p>
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
    
        <!--Breadcrumb-->
        
        <div class="px-lg-5 px-sm-3 py-3 d-flex justify-content-between align-items-center" style="background-color: #F7F7F7;"> 
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
              </nav>
        </div>
      </div>
  </section>

<section>
    @foreach ($data['data'] as $item)
        @if($item['id'] == 1)
            @php 
                $theData = $item
            @endphp
        @endif
    @endforeach
    <div class="container">
        <div class="card my-5 px-5 py-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6 col-sm-12 mb-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                                <!-- slides -->
                                <div class="carousel-inner">
                              
                                @for ($j = 0; $j < count($theData['store_item_images']); $j++)
                                @if ($j == 0)
                                <div class="carousel-item active"> <img src="{{$theData['store_item_images'][0]['image_url']}}" alt="Hills"> </div>
                                @else
                                <div class="carousel-item"> <img src="{{$theData['store_item_images'][$j]['image_url']}}" alt="Hills"> </div>
                                @endif
                                @endfor
                                </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                                <ol class="carousel-indicators list-inline">
                                    @for ($j = 0; $j < count($theData['store_item_images']); $j++)
                                    @if ($j == 0)
                                <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="{{$theData['store_item_images'][0]['image_url']}}" class="img-fluid"> </a> </li>
                                    @else
                                    <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="{{$theData['store_item_images'][$j]['image_url']}}" class="img-fluid"> </a> </li>
                                    @endif
                                    @endfor
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12 mt-md-5 mt-lg-0">
                <div class="product-name">
                    <h1>{{ $theData['name']}}</h1>
                </div>
                <div class="d-flex align-items-center">
                    <div class="product-rate-star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="ml-4 text-muted">4.3K</span>
                    </div>
                    <div class="border-right ml-md-4 pr-4">
                        <a href="lol">Lihat Semua</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-check-circle" style="color:#263A81;" aria-hidden="true"></i>
                        <span class="text-muted ml-1">10K Orders</span>
                    </div>
                    
                </div>
                <div class="align-items-center justify-content-between mt-5" style="display: flex;">
                    <div class="priceInfo">
                        <h2>Rp{{ number_format($theData['store_item_price'], 0, ',', '.') }}</h2>
                        <del class="text-muted">Rp 125.000</del>
                    </div>
                    <div> <a><i class="fa fa-heart-o" style="font-size: 32px;" aria aria-hidden="false"></i></a></div>
                   
                </div>
                {{-- <div class="grpsir-table mt-5">
                    <table class="table table-striped ">
                        <tbody>
                          <tr>
                            <th scope="row">Grosir 1</th>
                            <td>5 Barang </td>
                            <td>Rp 175.000</td>
                          </tr>
                          <tr>
                            <th scope="row">Grosir 2</th>
                            <td>8 Barang </td>
                            <td>Rp 210.000</td>
                          </tr>
                          <tr>
                            <th scope="row">Grosir 3</th>
                            <td>12 Barang </td>
                            <td>Rp 45.000</td>
                          </tr>
                        </tbody>
                      </table>
                </div> --}}
                <div class="d-flex align-items-center mt-5">
                    <div class="text-muted">Kuantitas</div>
                    <div class="d-flex ml-sm-3">
                        <input type="number" min="0" max="18" step="1" id="quant"/>
                    </div>
                   
                </div>
    
                <div class="d-flex align-items-center mt-4">
                    <button class="btn-primary rounded px-4 py-2 mr-md-4">Beli Sekarang</button>
                    <button class="btn-secondary rounded px-4 py-2 mr-md-4">Tambahkan ke Keranjang</button>
                </div>
                </div>
            </div>
          
        </div>
    </div>
    <div class="container">
        <div class="card py-5 px-5">
            <div>
                <h3 class="mb-4">Deskripsi Produk</h3>
                <p class="text-muted">
                    Deskripsi Porduk disini
                    </p>
            </div>
            <div class="d-flex align-items-center mt-5">
            <div class="profilePicture" style="width: 100px; height: 100px; background-image: url('{{$item['store']['image_url']}}'); background-size: contain; border-radius: 40px"></div>
                <div class="ml-4">
                <h3>{{ $theData['store']['name']}}</h3>
                    <button class="btn btn-light px-3 py-2"><i class="fas fa-store mr-2"></i>Kunjungi Toko</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="product-list-header px-sm-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h2>Produk Lain</h2></div>
                    <div><a href="http://">Lihat Semua</a></div>
                </div>
              <div class="row product-grid justify-content-between py-sm-4">
                @foreach ($data['data'] as $item)
                @if($item['id'] != 1)
                  <div class="col-3 py-3">
                    <div class="card">
                    <img class="card-img-top" style="height: 12rem;" src="{{$item['store_item_images'][0]['image_url']}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-muted" style="font-size: 12px;">{{$item['store']['name']}}</p>
                    <h4 class="card-title">{{$item['name']}}</h4>
                        <div class="product-rate-star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="ml-2">4.3K</span>
                        </div>
                        <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                            <h5>Rp{{ number_format($item['store_item_price'], 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
                  </div>
                @endif
                @endforeach
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