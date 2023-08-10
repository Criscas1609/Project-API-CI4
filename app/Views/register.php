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
                                    <img src="https://cdn.pixabay.com/photo/2022/12/31/06/52/apple-7688110_1280.png" style="width: 100px;" alt="logo">
                                    <h4 class="pb-1 mt-1 mb-5">Recipe inventory</h4>
                                </div>
      
                                <form method="POST" action="<?php echo site_url('/send-register'); ?>" onsubmit="return validateForm()">
                                    <p>Welcome to the registration section</p>
      
                                    <div class="mb-4 form-outline">
                                        <label for="name">Enter your name</label>
                                        <input type="text" id="name" name="name" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback">Please enter a valid name.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="birthdate">Enter your birthdate</label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback">Please enter a valid birthdate.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="phone">Enter your phone</label>
                                        <input type="number" id="phone" name="phone" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback">Please enter a valid phone.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="username">Enter your username</label>
                                        <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback">Please enter a valid username.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="email">Enter your email</label>
                                        <input type="text" id="email" name="email" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback"><p>Please enter a valid email.</p>
                                        </div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="password">Put a password</label>
                                        <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback">Password must be at least 8 characters.</div>
                                    </div>
      
                                    <div class="mb-4 form-outline">
                                        <label for="password_confirmation">Confirm your password.</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="off">
                                        <div class="invalid-feedback">Passwords do not match.</div>
                                    </div>
      
                                    <div class="pt-1 pb-1 mb-5 text-center">
                                        <button class="mb-3 btn btn-primary btn-block fa-lg gradient-custom-2" type="submit">Create account</button>
                                    </div>
                                </form>
      
                                <div class="pb-4 d-flex align-items-center justify-content-center">
                                    <p class="mb-0 me-2">¿Have account?</p>
                                    <form method="get" action="/login">
                                        <button type="submit" class="mb-3 btn btn-primary btn-block fa-lg gradient-custom-2">Sign in</button>
                                    </form>
                                </div>
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
<script src="<?= base_url('js/Validate.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
