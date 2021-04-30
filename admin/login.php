<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <?php
    if (isset($_SESSION['loginstatus'])) {
        if ($_SESSION['loginstatus'] == "connfail") {
    ?>
            <div class="col-xl-3 col-md-6 m-auto p-3">
                <div class="card bg-warning text-white mx-auto m-auto">
                    <div class="card-body">Connection Failed</div>
                    
                </div>
            </div>
    <?php
        } elseif ($_SESSION['loginstatus'] == "incorrect") {
            ?>
            <div class="col-xl-3 col-md-6 m-auto p-3">
                <div class="card bg-danger text-white mx-auto m-auto">
                    <div class="card-body">Incorrect Credentials</div>
                    
                </div>
            </div>
    <?php
        } else {
            ?>
            <div class="col-xl-3 col-md-6 m-auto p-3">
                <div class="card bg-danger text-white mx-auto m-auto">
                    <div class="card-body">ERROR</div>
                    
                </div>
            </div>
    <?php
        }
    }
    ?>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="include/loginuser.php" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input name="user" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input name="pass" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
                                        </div>

                                        <div class="ml-auto form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" type="submit" value="Login">


                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CodeWorld 2021</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>