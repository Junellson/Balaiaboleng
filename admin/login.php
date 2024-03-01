<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Balai Aboleng</title>

    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>

</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="m-4" style="position:fixed;">
                <button class="btn btn-dark pull-left" type="button" onclick="location.href='../index.php'"><i class="bi bi-arrow-return-left"></i></button>
            </div>
                
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="assets/img/logo.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="row text-center mb-5">
                        <div class="col-md-12">
                        <img src="assets/img/logo2.png" class="img-fluid" alt="Sample image">
                        </div>
                    </div>
                    <div class="row">
                        <form method="post" action="cek_login.php">
                            <div class="form-group mb-4">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                            </div>
                            <div class="form-group mb-5">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>