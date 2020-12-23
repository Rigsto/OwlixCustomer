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
        .ProfilePictureEdit{
    max-width: 150px;
    max-height: 150px;
    height: 150px;
    width: 150px;
    background-size: contain;
    border: solid 1px transparent;
    border-radius: 90px;
}

#profileSections{
    max-width: 920px!important;
}
    </style>

</head>
<body>
  <section style="background-color: white">
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light px-lg-5">
          <div class="d-flex align-items-center mr-4">
            <a class="navbar-brand border-right pr-3" href="index.html"><img src="assets/img/logo.svg" alt="logo"></a>
            <h4 class="mb-0">Edit Profil</h4>
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
                              <button class="dropdown-item" type="button">Keluar</button>
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
        <div class="card px-5 py-5 mx-lg-5 mt-5 rounded-medium" >
            <div class="row justify-content-between">
                <div class="col-12 col-lg-3 mb-4 align-items-center justify-content-center">
                    <div class="ProfilePictureEdit mb-4" style="background-image: url('assets/img/shopOwner.png');"></div>
                    <div class="w-100"><button class="w-100 btn">Ubah Foto</button></div>
                   
                </div>
               
                <div class="mx-lg-3 col-lg-8">
                    <form>
                        <div class="form-group">
                            <label for="inputName">Nama</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Masukkan Nama Lengkap" value="{{Session::get('user.data.name')}}">
                          </div>
                        <div class="form-group">
                          <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan Alamat Emailmu" value="{{Session::get('user.data.email')}}">
                        </div>
                        <div class="form-group">
                          <label for="inputTelp">No. Telp</label>
                          <input type="text" class="form-control" id="inputTelp" placeholder="Masukkan nomor telfon" value="{{Session::get('user.data.phone_number')}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Provinsi</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Pilih...</option>
                                  <option>...</option>
                                </select>
                              </div>
                          <div class="form-group col-md-4">
                            <label for="inputCity">Kota</label>
                            <input type="text" class="form-control" id="inputCity">
                          </div>
                          
                          <div class="form-group col-md-4">
                            <label for="inputZip">Kode Pos</label>
                            <input type="text" class="form-control" id="inputZip" value="{{Session::get('user.data.postal_code')}}">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Alamat</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan Alamat">
                          </div>

                        <button type="submit" class="btn btn-primary py-2 px-3 rounded w-100">Simpan</button>
                      </form>
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