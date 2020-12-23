<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owlix | Mie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
</head>
<body>
<section>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light px-lg-5">
            <a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" alt="logo"></a>
            <!-- <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="scollapse navbar-collapse" id="collapsibleNavId">
                <form class="input-group md-form form-sm form-4 px-4 mx-lg-4 mt-2 search-bar">
                    <input class="form-control w-50 my-0 py-1 red-border" type="text"
                           style="background-color: transparent;" placeholder="Search" aria-label="Search">
                    <button class="input-group-append btn btn-secondary align-items-center" type="button">
                        <i class="fa fa-search text-grey mx-1"></i>
                    </button>
                </form>
                <ul class="navbar-nav mt-2 mt-lg-0 align-items-center">
                    <li class="nav-item active border-right pr-4">
                        <a class="nav-link d-flex" href="{{ url('Cart') }}">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                            <div class="itemsDot rounded-circle bg-warning position-absolute ml-4"
                                 style="width: 1em; height: 1em;">
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
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                        data-display="static" aria-haspopup="true" aria-expanded="false"
                                        style="background-color: transparent!important">

                                </button>
                                <div class="dropdown-menu dropdown-menu-lg-right">
                                    <button class="dropdown-item" type="button"
                                            onclick="window.location.href='{{ url('profil')}}'">Profil
                                    </button>
                                    <button class="dropdown-item" type="button">Pesanan</button>
                                    <button class="dropdown-item" type="button"
                                            onclick="window.location.href='{{ url('logout')}}'">Keluar
                                    </button>
                                </div>
                            </div>
                        @else
                            <button class="btn-primary px-4 py-2 rounded" type="button"
                                    onclick="window.location.href='{{ url('login') }}'">Login
                            </button>
                        @endif
                    </li>
                </ul>

            </div>
        </nav>

        <!--Filter-->

        <div class="px-lg-5 px-sm-3 py-3 d-flex justify-content-between align-items-center"
             style="background-color: #F7F7F7;">
            <div class="d-flex align-items-center " id="FilterDropdown">
                <div class="text-muted">Filter Berdasarkan</div>
                <div class="d-flex">
                    <!-- Example single danger button -->
                    <div class="btn-group ml-lg-3 ml-sm-3">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <strong>Produk</strong>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Terlaris</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>

                    <div class="btn-group ml-lg-3 ml-sm-3">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <strong>Kota</strong>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Surabaya</a>
                            <a class="dropdown-item" href="#">Jakarta</a>
                            <a class="dropdown-item" href="#">Solo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>


            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">Batas Harga</div>
                <div class="d-flex justify-content-between ml-sm-3">
                    <select class="custom-select w-100">
                        <option selected>Rp 0</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="custom-select">
                        <option selected>Rp 1jt</option>
                        <option value="1">Rp 350rb</option>
                        <option value="2">Rp 500rb</option>
                        <option value="3">Rp 1jt</option>
                    </select>
                    <button class="btn-primary px-4 rounded ml-1">Filter</button>
                </div>

            </div>
        </div>

        <!--Carousel-->
    </div>
</section>

<section>
    <div class="container py-4">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="assets/img/banner1.png" class="w-100 rounded-images" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/banner2.png" class="w-100 rounded-images" alt="Second slide">
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row py-md-4">
            <div class="col-md-3">
                <div class="card" id="KategoriFilter" style="width: 17rem;">
                    <div class="card-header">
                        Kategori Produk
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($categories['data'] as $item)
                            <a href="http://" class="py-1">
                                <li class="list-group-item border-bottom">{{$item['name']}}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex">
                    <div class="ml-sm-3 " data-aos="fade-up"
                         data-aos-offset="10"
                         data-aos-delay="10"
                         data-aos-duration="1000"><a href="" class="kategori-btn"><img class="rounded-images mw-100"
                                                                                       src="assets/img/KebutuhanRT.svg"
                                                                                       alt=""></a></div>
                    <div class="ml-sm-3" data-aos="fade-up"
                         data-aos-offset="10"
                         data-aos-delay="20"
                         data-aos-duration="1000"><a href="" class="kategori-btn"><img class="rounded-images mw-100"
                                                                                       src="assets/img/Pakaian.svg"
                                                                                       alt=""></a></div>
                    <div class="ml-sm-3" data-aos="fade-up"
                         data-aos-offset="10"
                         data-aos-delay="30"
                         data-aos-duration="1000"><a href="" class="kategori-btn"><img class="rounded-images mw-100"
                                                                                       src="assets/img/KebutuhanSekolah.svg"
                                                                                       alt=""></a></div>
                </div>
                <div>
                    <div class="product-list-header px-sm-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><h2>Terlaris</h2></div>
                            <div><a href="http://">Lihat Semua</a></div>
                        </div>
                        <div class="row product-grid justify-content-between py-sm-4">

                            @foreach ($data['data'] as $item)
                                <div class="col-4 px-3 py-3">

                                    <div class="card">
                                        <form action="product_detail" style="position: relative" method="GET">

                                            <img class="card-img-top" style="height: 12rem;"
                                                 src="{{$item['store_item_images'][0]['image_url']}}"
                                                 alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                                <h4 class="card-title">{{$item['name']}}</h4>
                                                <div class="product-rate-star">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="ml-2">4.3K</span>
                                                </div>
                                                <div
                                                    class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                    <h5>
                                                        Rp{{ number_format($item['store_item_price'], 0, ',', '.') }}</h5>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                                <button class="btn h-100" style="background:yellow;" type="submit"> See
                                                    Product
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @endforeach
                            {{-- <div class="card mr-sm-2">
                                <a href="">
                                   <img class="card-img-top" style="height: 12rem;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQN5k6SAtvgfbU5pqiRdNSUH6xzpymJbX5F7A&usqp=CAU" alt="Card image cap">
                                   <div class="card-body">
                                       <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                       <h4 class="card-title">Product name</h4>
                                       <div class="product-rate-star">
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star checked"></span>
                                           <span class="fa fa-star"></span>
                                           <span class="fa fa-star"></span>
                                           <span class="ml-2">4.3K</span>
                                       </div>
                                       <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                           <p class="text-muted"><del> Rp 29.000</del></p>
                                           <h5>Rp 20.000</h5>
                                       </div>
                                   </div>
                               </a>
                               </div>
                               <div class="card mr-sm-2">
                                   <a href="">
                                      <img class="card-img-top" style="height: 12rem;" src="https://ichef.bbci.co.uk/news/1024/branded_news/EDEC/production/_107080906_gettyimages-654239286.jpg" alt="Card image cap">
                                      <div class="card-body">
                                          <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                          <h4 class="card-title">Product name</h4>
                                          <div class="product-rate-star">
                                              <span class="fa fa-star checked"></span>
                                              <span class="fa fa-star checked"></span>
                                              <span class="fa fa-star checked"></span>
                                              <span class="fa fa-star"></span>
                                              <span class="fa fa-star"></span>
                                              <span class="ml-2">4.3K</span>
                                          </div>
                                          <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                              <p class="text-muted"><del> Rp 29.000</del></p>
                                              <h5>Rp 20.000</h5>
                                          </div>
                                      </div>
                                  </a>
                                  </div>
                                  <div class="card mr-sm-2">
                                   <a href="">
                                      <img class="card-img-top" style="height: 12rem;" src="https://api.time.com/wp-content/uploads/2019/11/top-10-nonfiction-2019.jpg" alt="Card image cap">
                                      <div class="card-body">
                                          <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                          <h4 class="card-title">Product name</h4>
                                          <div class="product-rate-star">
                                              <span class="fa fa-star checked"></span>
                                              <span class="fa fa-star checked"></span>
                                              <span class="fa fa-star checked"></span>
                                              <span class="fa fa-star"></span>
                                              <span class="fa fa-star"></span>
                                              <span class="ml-2">4.3K</span>
                                          </div>
                                          <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                              <p class="text-muted"><del> Rp 29.000</del></p>
                                              <h5>Rp 20.000</h5>
                                          </div>
                                      </div>
                                  </a>
                                  </div>

                               </div>
                               <div class="card-deck product-grid justify-content-between py-sm-4">
                                   <div class="card mr-sm-2">
                                       <a href="">
                                          <img class="card-img-top" style="height: 12rem;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQN5k6SAtvgfbU5pqiRdNSUH6xzpymJbX5F7A&usqp=CAU" alt="Card image cap">
                                          <div class="card-body">
                                              <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                              <h4 class="card-title">Product name</h4>
                                              <div class="product-rate-star">
                                                  <span class="fa fa-star checked"></span>
                                                  <span class="fa fa-star checked"></span>
                                                  <span class="fa fa-star checked"></span>
                                                  <span class="fa fa-star"></span>
                                                  <span class="fa fa-star"></span>
                                                  <span class="ml-2">4.3K</span>
                                              </div>
                                              <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                  <p class="text-muted"><del> Rp 29.000</del></p>
                                                  <h5>Rp 20.000</h5>
                                              </div>
                                          </div>
                                      </a>
                                      </div>
                                      <div class="card mr-sm-2">
                                          <a href="">
                                             <img class="card-img-top" style="height: 12rem;" src="https://ichef.bbci.co.uk/news/1024/branded_news/EDEC/production/_107080906_gettyimages-654239286.jpg" alt="Card image cap">
                                             <div class="card-body">
                                                 <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                                 <h4 class="card-title">Product name</h4>
                                                 <div class="product-rate-star">
                                                     <span class="fa fa-star checked"></span>
                                                     <span class="fa fa-star checked"></span>
                                                     <span class="fa fa-star checked"></span>
                                                     <span class="fa fa-star"></span>
                                                     <span class="fa fa-star"></span>
                                                     <span class="ml-2">4.3K</span>
                                                 </div>
                                                 <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                     <p class="text-muted"><del> Rp 29.000</del></p>
                                                     <h5>Rp 20.000</h5>
                                                 </div>
                                             </div>
                                         </a>
                                         </div>
                                         <div class="card mr-sm-2">
                                          <a href="">
                                             <img class="card-img-top" style="height: 12rem;" src="https://api.time.com/wp-content/uploads/2019/11/top-10-nonfiction-2019.jpg" alt="Card image cap">
                                             <div class="card-body">
                                                 <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                                 <h4 class="card-title">Product name</h4>
                                                 <div class="product-rate-star">
                                                     <span class="fa fa-star checked"></span>
                                                     <span class="fa fa-star checked"></span>
                                                     <span class="fa fa-star checked"></span>
                                                     <span class="fa fa-star"></span>
                                                     <span class="fa fa-star"></span>
                                                     <span class="ml-2">4.3K</span>
                                                 </div>
                                                 <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                     <p class="text-muted"><del> Rp 29.000</del></p>
                                                     <h5>Rp 20.000</h5>
                                                 </div>
                                             </div>
                                         </a>
                                         </div>

                                      </div>
                                      <div class="card-deck product-grid justify-content-between py-sm-4">
                                       <div class="card mr-sm-2">
                                           <a href="">
                                              <img class="card-img-top" style="height: 12rem;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQN5k6SAtvgfbU5pqiRdNSUH6xzpymJbX5F7A&usqp=CAU" alt="Card image cap">
                                              <div class="card-body">
                                                  <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                                  <h4 class="card-title">Product name</h4>
                                                  <div class="product-rate-star">
                                                      <span class="fa fa-star checked"></span>
                                                      <span class="fa fa-star checked"></span>
                                                      <span class="fa fa-star checked"></span>
                                                      <span class="fa fa-star"></span>
                                                      <span class="fa fa-star"></span>
                                                      <span class="ml-2">4.3K</span>
                                                  </div>
                                                  <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                      <p class="text-muted"><del> Rp 29.000</del></p>
                                                      <h5>Rp 20.000</h5>
                                                  </div>
                                              </div>
                                          </a>
                                          </div>
                                          <div class="card mr-sm-2">
                                              <a href="">
                                                 <img class="card-img-top" style="height: 12rem;" src="https://ichef.bbci.co.uk/news/1024/branded_news/EDEC/production/_107080906_gettyimages-654239286.jpg" alt="Card image cap">
                                                 <div class="card-body">
                                                     <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                                     <h4 class="card-title">Product name</h4>
                                                     <div class="product-rate-star">
                                                         <span class="fa fa-star checked"></span>
                                                         <span class="fa fa-star checked"></span>
                                                         <span class="fa fa-star checked"></span>
                                                         <span class="fa fa-star"></span>
                                                         <span class="fa fa-star"></span>
                                                         <span class="ml-2">4.3K</span>
                                                     </div>
                                                     <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                         <p class="text-muted"><del> Rp 29.000</del></p>
                                                         <h5>Rp 20.000</h5>
                                                     </div>
                                                 </div>
                                             </a>
                                             </div>
                                             <div class="card mr-sm-2">
                                              <a href="">
                                                 <img class="card-img-top" style="height: 12rem;" src="https://api.time.com/wp-content/uploads/2019/11/top-10-nonfiction-2019.jpg" alt="Card image cap">
                                                 <div class="card-body">
                                                     <p class="card-text text-muted" style="font-size: 12px;">Shop name</p>
                                                     <h4 class="card-title">Product name</h4>
                                                     <div class="product-rate-star">
                                                         <span class="fa fa-star checked"></span>
                                                         <span class="fa fa-star checked"></span>
                                                         <span class="fa fa-star checked"></span>
                                                         <span class="fa fa-star"></span>
                                                         <span class="fa fa-star"></span>
                                                         <span class="ml-2">4.3K</span>
                                                     </div>
                                                     <div class="product-price pt-4 d-flex justify-content-between align-items-end">
                                                         <p class="text-muted"><del> Rp 29.000</del></p>
                                                         <h5>Rp 20.000</h5>
                                                     </div>
                                                 </div>
                                             </a>
                                             </div>

                                          </div> --}}
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
</section>
<section>
    <div class="container">
        <div>
            <img src="assets/img/bottomBanner.svg" alt="banner" class="w-100 rounded-images">
        </div>
        <div class="row justify-content-between align-items-center py-3" style="text-align: center;">
            <div class="col-md-3"><img src="assets/img/Value1.svg" alt="value1">
                <h5>Harga bisa Diadu</h5>
                <p>Temukan berbagai produk di Owlix
                    dengan harga terjangkau dan kualitas
                    yang OKE yang membuat belanja
                    kamu makin asik setiap hari.</p>
            </div>
            <div class="col-md-3"><img src="assets/img/value2.svg" alt="value1">
                <h5>Membantu sesama</h5>
                <p>Selain membeli produk Owlix ,
                    kamu juga membantu dan mendukung
                    para UMKM ataupun Produk Lokal
                    untuk terus maju dan berkembang.</p>
            </div>
            <div class="col-md-3"><img src="assets/img/value3.svg" alt="value1">
                <h5>Lengkap dan Praktis</h5>
                <p>Apapun yang kamu cari semua
                    ada disini . kamu juga dapat
                    berbelanja dimana dan kapan pun.
                    Yuk mulai belanja di Owlix.
                </p>
            </div>
            <div class="col-md-3"><img src="assets/img/value4.svg" alt="value1">
                <h5>Berbagai Voucher Menarik</h5>
                <p>Owlix memberikan berbagai voucher
                    menarik yang dijamin membuat
                    belanja mu semakin menyenangkan.</p>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
