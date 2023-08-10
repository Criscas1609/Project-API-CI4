<!DOCTYPE html>
<html>
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/movieSeat.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <title>Recipe inventory</title>
        <!-- CSS only -->
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous"
        />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/home.css'); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container">
                  <a class="navbar-brand" href="#">
                      <img src="https://user-images.githubusercontent.com/102967338/252713059-16826ea2-06a0-489b-93cd-15af3a764109.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
                    Meals
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                          <li class="nav-item active">
                              <form action="/info" method="get">
                                  <button type="submit" class="nav-link btn btn-link" name="inicio" value="inicio">Home</button>
                              </form>
                          </li>
                          <li class="nav-item active">
                              <form action="/new-product" method="get">
                                  <button type="submit" class="nav-link btn btn-link" name="inicio" value="inicio">Add new one</button>
                              </form>
                              
                          </li>
                          <li class="nav-item">
                              <form action="/update-info" method="get">
                                  <button type="submit" class="nav-link btn btn-link" name="usuario" value="usuario">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                          class="bi bi-person" viewBox="0 0 16 16">
                                          <path
                                              d="M8 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm3.5-2a3.5 3.5 0 0 1-3.5 3.5h-1A3.5 3.5 0 0 1 1 6.5a.5.5 0 0 1 1 0A2.5 2.5 0 0 0 5 9h1a2.5 2.5 0 0 0 2.5-2.5z" />
                                      </svg>
                                      User
                                  </button>
                              </form>
                          </li>
                          <li class="nav-item">
                              <form action="/close" method="post">
                                  <button type="submit" class="nav-link btn btn-link" name="cerrar_sesion" value="cerrar_sesion">Log out</button>
                              </form>
                          </li>
                      </ul>
                  </div>
              </div>
            </nav>
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="text-black card rounded-3">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="https://user-images.githubusercontent.com/102967338/252713059-16826ea2-06a0-489b-93cd-15af3a764109.png" style="width: 185px;" alt="logo">
                                    <h4 class="pb-1 mt-1 mb-5">New Product</h4>
                                </div>
      
                                <?php if ($food != null): ?>
                                <form method="POST" action="/update-product/complete" onsubmit="return validateForm()">
                                    <div class="mb-4 form-outline">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" class="form-control" value="<?= $food->name ?>" required autocomplete="off">
                                        <div class="invalid-feedback">Please,Put a name.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="location">Country:</label>
                                        <input type="text" id="location" name="location" class="form-control" value="<?= $food->location ?>" required autocomplete="off">
                                        <div class="invalid-feedback">Please, Put a country.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="url">URL image:</label>
                                        <input type="text" id="url" name="url" class="form-control" value="<?=  $food->image  ?>" required autocomplete="off">
                                        <div class="invalid-feedback">Please, Put a valid URL.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="instruction">Instructions:</label>
                                        <textarea id="instruction" name="instruction" class="form-control" rows="5" required autocomplete="off"><?= $food->instruction ?></textarea>
                                        <div class="invalid-feedback">Please, Put instructions.</div>
                                    </div>
                                    <div class="mb-4 form-outline d-none">
                                        <label for="food"></label>
                                        <input type="hidden" id="food" name="food" class="form-control" value="<?= $food->name ?>" required autocomplete="off">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="px-3 py-4 text-white p-md-5 mx-md-4">
                            <img src="https://media1.giphy.com/media/3NgkMmTzT4gaHnCyr0/giphy.gif" style="width: 422px;" alt="logo">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var username = document.getElementById('location').value;
        var birthdate = document.getElementById('url').value;
        var phone = document.getElementById('instruction').value;
      
        // Validar campos vacíos
        if (name.trim() === '') {
            return false;
        }
      
        if (username.trim() === '') {
            return false;
        }
      
        if (birthdate.trim() === '') {
            return false;
        }
      
        if (phone.trim() === '') {
            return false;
        }
      
      
        return true;
    }
</script>
<script src="<?= base_url('js/Validate.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
