<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "userdata");
if (isset($_SESSION['userid'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin CodeWorld</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php
        include("include/navbar.php");
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <?php
                    include("include/sidenav.php");
                    if (isset($_GET['s'])) {
                        $tab = $_GET['s'];
                        if ($tab == 'users') {
                            $q1 = "SELECT * FROM userdata;";
                            $r1 = mysqli_query($con, $q1);
                            $data = mysqli_fetch_all($r1, MYSQLI_BOTH);
                    ?>
                            <div class="container-fluid">
                                <h1 class="mt-4">User Details</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">User Details</li>
                                </ol>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                        DataTable Example
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>userid</th>
                                                        <th>name</th>
                                                        <th>email</th>
                                                        <th>pass</th>
                                                        <th>gender</th>
                                                        <th>timestamp</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    foreach ($data as $data1) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $data1['userid'] ?></td>
                                                            <td><?= $data1['name'] ?></td>
                                                            <td><?= $data1['email'] ?></td>
                                                            <td><?= $data1['pass'] ?></td>
                                                            <td><?= $data1['gender'] ?></td>
                                                            <td><?= $data1['timestamp'] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php
                        } elseif ($tab == 'tutorials') {
                        ?>
                            <div class="container-fluid">
                                <h1 class="mt-4">Upload Tutorial</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Upload Tutorial</li>
                                </ol>
                                <form action="include/addtut.php" method="POST">
                                    <div class="form-outline mb-4">
                                        <input name="course" type="text" id="form6Example3" class="form-control" required />
                                        <label class="form-label" for="form6Example3">Course</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="ytid" type="text" id="form6Example3" class="form-control" required />
                                        <label class="form-label" for="form6Example3">Youtube ID</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="notes" type="text" id="form6Example4" class="form-control" required />
                                        <label class="form-label" for="form6Example4">Notes Link</label>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Add Tutorial</button>
                                </form>
                            </div>
                            <?php

                        } elseif ($tab == 'addcode') {
                            ?>
<div class="container-fluid">
                                <h1 class="mt-4">Add Code</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Add Code for Tutorial</li>
                                </ol>
                            <?php
                            if (isset($_SESSION['tutadd']) && $_SESSION['tutadd'] == "sucess") {
                            unset($_SESSION['tutadd']);
                            ?>
                                <div class="col-xl-3 col-md-6 m-auto p-3">
                                    <div class="card bg-success text-white mx-auto m-auto">
                                        <div class="card-body">Tutorial Added Sucessfully</div>

                                    </div>
                                </div> 
                                
                            <?php
                            }
                            if (isset($_SESSION['addcodes']) && $_SESSION['addcodes'] == "sucess") {
                                unset($_SESSION['addcodes']);
                                ?>
                                    <div class="col-xl-3 col-md-6 m-auto p-3">
                                        <div class="card bg-success text-white mx-auto m-auto">
                                            <div class="card-body">Code Added Sucessfully</div>
    
                                        </div>
                                    </div> 
                                    
                                <?php
                                }
                            $sql = "SELECT `vid`,`ytitle` FROM `video`";
                            $result = mysqli_query($con, $sql);
                            $data3 = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            ?>

                            <form action="include/addcode.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Select Video</label>

                                    <select name="vid" class="form-control"  required>
                            <?php
                            foreach($data3 as $video){
                            ?>
                                        <option value="<?=$video['vid']?>"><?=$video['vid']?> - <?=$video['ytitle']?></option>
<?php
                            }
?>
                                    </select>
                                </div>
                                <div class="form-group">
    <label for="exampleInputEmail1">Language Used</label>
    <input name="language" type="text" class="form-control" id="exampleInputEmail1" required>
  </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Enter Code</label>
                                    <textarea name="code" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </form>
</div>
                        <?php
                        } elseif ($tab == 'project') {
                            echo "project";
                        } elseif ($tab == 'comments') {
                            echo "comments";
                        } else {
                            echo '<script type="text/javascript">window.location.href="/admin/";</script>';
                        }
                        ?>

                    <?php
                    } else {
                        $q1 = "SELECT userid FROM userdata;";
                        $r1 = mysqli_query($con, $q1);
                        $usernos = mysqli_num_rows($r1);


                        $q2 = "SELECT * FROM video;";
                        $r2 = mysqli_query($con, $q2);
                        $videonos = mysqli_num_rows($r2);
                    ?>

                        <div class="container-fluid">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Tutorials</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/admin/?s=tutorials">Explore Now</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">Projets</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/admin/?s=project">Explore Now</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">User Data</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/admin/?s=users">Explore Now</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Comments</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/admin/?s=comments">Explore Now</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-2">
                                <div class="card-body ">
                                    Active Users - <span class="font-weight-bold"> <?= $usernos ?></span>
                                </div>
                            </div>
                            <div class="card m-2">
                                <div class="card-body ">
                                    Tutorials Uploaded - <span class="font-weight-bold"> <?= $videonos ?></span>
                                </div>
                            </div>

                        </div>

                    <?php
                    }
                    ?>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:/404");
}
?>