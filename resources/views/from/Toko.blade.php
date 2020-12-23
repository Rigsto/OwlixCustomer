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
                <ul class="navbar-nav mt-2 mt-lg-0">
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
                        <button class="btn-primary px-4 py-2 rounded" type="button" onclick="window.location.href='Login.html'">Login</button>
                    </li>
                </ul>
                
            </div>
        </nav>

      </div>
  </section>

<section>
    <div class="container" id="profileSections">
        <div class="card rounded-medium my-5" style="background-image: url('assets/img/bgtoko.png'); background-size: 100% 200px; background-repeat: no-repeat;">
            <div class="card px-5 py-5 mx-sm-5 rounded-medium" style="margin-top: 100px;">
                <div class="d-sm-flex justify-content-lg-between align-items-center">
                    <div class="d-sm-flex align-items-center">
                        <div style="background-image: url('assets/img/shopOwner.png');" class="ProfilePicture"></div>
                        <div class="mx-3">
                             <h4 id="StoreName">Hendy Shop</h4>
                             <div class="product-rate-star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="ml-2" style="font-weight: 500; color: #e8af12;">4/5</span>
                            </div>
                        </div>
                     </div>
                     <div class="d-lg-flex justify-content-lg-between">
                         <div class="mr-5">
                           <span class="mr-2 text-primary"><i class="fas fa-archive"></i></span><span class= "text-primary" style="font-weight: 500;">Total Produk di Toko</span>
                           <h4 class="mt-3">100 Produk</h4>
                         </div>
                         <div>
                            <span class="mr-2 text-success"><i class="fas fa-truck-loading"></i></span><span class= "text-success" style="font-weight: 500;">Total Produk terjual</span>
                            <h4 class="mt-3">290 Produk</h4>
                         </div>
                </div>
            </div>
        </div>
        <div class="card px-5 py-5 mx-5 mt-5 rounded-medium" >
           <h2>Deskripsi Toko</h2>
           <p id="deskripsiToko">
            Hendy Shop adalah toko baru yang sedang merintis di dunia bisnis online . Layanan ini dikelola pribadi dan memiliki kepentingan
            membantu sesama dengan memberi sekian persen penjualan untuk donasi dan membantu sesama
            
            Selamat berbelanja di toko kami!
             .
            
            “Hendy Shop the best store :) “
           </p>
           <div>
            <button class="btn btn-primary rounded float-right py-2 px-3 mt-4"><i class="fas fa-share-alt mr-2"></i>Bagikan Toko</button>
           </div>
          
    </div>
    <div class="px-5 py-4">
        <div class="product-list-header px-sm-3">
            <div class="d-flex justify-content-between align-items-center">
                <div><h2>Produk Toko</h2></div>
                <div><a href="http://">Lihat Semua</a></div>
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