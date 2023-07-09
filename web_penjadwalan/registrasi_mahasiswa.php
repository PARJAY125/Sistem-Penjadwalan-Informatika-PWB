<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Registrasi</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-80">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h3 class="text-white-50 mb-5">Registrasi</h3>
                  <form action="../backend_php/register.php?category=mahasiswa" method="post">
                    <div class="form-outline form-white">
                        <input type="name" id="typeName" class="form-control form-control-lg" placeholder="Nama Lengkap" name="name" />
                        <label class="form-label" for="typeName" ></label>
                    </div>

                    <div class="form-outline form-white">
                        <input type="username" id="typeUsername" class="form-control form-control-lg" placeholder="Username atau NIM" name="username"/>
                        <label class="form-label" for="typeUsername" ></label>
                    </div>

                    <div class="form-outline form-white">
                      <input type="email" id="typeEmail" class="form-control form-control-lg" placeholder="Email" name="email"/>
                      <label class="form-label" for="typeEmail" ></label>
                    </div>

                    <div class="form-outline form-white">
                      <input type="telp" id="typeTelp" class="form-control form-control-lg" placeholder="Nomor Telpon" name="telp"/>
                      <label class="form-label" for="typeTelp"></label>
                    </div>

                    <div class="form-outline form-white">
                        <input type="kelas" id="typeKelas" class="form-control form-control-lg" placeholder="Kelas" name="class"/>
                        <label class="form-label" for="typeKelas" ></label>
                    </div>
      
                    <div class="form-outline form-white">
                      <input type="password" id="typePassword" class="form-control form-control-lg" placeholder="Password" name="password"/>
                      <label class="form-label" for="typePassword" ></label>
                    </div>

                    <div class="form-outline form-white">
                        <input type="password" id="ConfirmPass" class="form-control form-control-lg" placeholder="Konfirmasi Password" />
                        <label class="form-label" for="confirmpassword"></label>
                      </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px;">Daftar</button>
                  </form>
                    
                  </div>
                  
                  <div>
                    <p class="mb-0 " style="margin-top: -70px;">atau daftar sebagai? <a href="./registrasi_dosen.php" class="text-white-50 fw-bold"> Dosen</a>
                    </p>
                  </div>
                  <?php if (!empty($_GET['error'])){
                        $error = $_GET['error'];
                        echo '<label class="" style="margin-top:10px; color: red;">'.$error.'</label></div>';
                     }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
