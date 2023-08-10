<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipe inventory</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<?php if ($message != null): ?>
            <div class="alert alert-primary" role="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>
  <body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="text-black card rounded-3">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2022/12/31/06/52/apple-7688110_1280.png"
                          style="width: 185px;" alt="logo">
                        <h4 class="pb-1 mt-1 mb-5">Recipe inventory</h4>
                      </div>
      
                      <form method="POST" action="/send-login" onsubmit="return validateFormLogin()">
                        <p>Welcome</p>
                        <div class="mb-4 form-outline">
                          <label name="username">Enter your username</label>
                          <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                          <div class="invalid-feedback">Please enter a valid username .</div>
                         </div>
                        <div class="mb-4 form-outline">
                          <label name="password">Enter your password</label>
                          <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                          <div class="invalid-feedback">Passwords do not match.</div>
                        </div>
                        <div class="pt-1 pb-1 mb-5 text-center">
                          <button class="mb-3 btn btn-primary btn-block fa-lg gradient-custom-2" type="submit">Sign in</button>
                         </div>
                        </form>
                        <div class="pb-4 d-flex align-items-center justify-content-center">
                          <p class="mb-0 me-2">¿You do not have an account?</p>
                          <form method="get" action="/">
                          <button type="submit" class="mb-3 btn btn-primary btn-block fa-lg gradient-custom-2">Sign up</button>
                        </form>
                        </div>
      
                
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="px-3 py-4 text-white p-md-5 mx-md-4">
                    <img src="https://raw.githubusercontent.com/Criscas1609/ProyectCinema/master/src/main/resources/co/edu/cue/proyectofinalcorte3/Photos/offerte-toste-offerte.gif" 
                    style="width: 450px;" alt="logo">  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="<?= base_url('js/Validate.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>