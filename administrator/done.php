<?php
session_start();
require_once './config/config.php';
include 'jdf.php';



if (!isset($_SESSION['login_admin'])) {
    header("Location:login.php");
} else {
}
?>
<!doctype html>
<html lang="fa">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="../css/dataTables.min.css" />
    <title>داشبورد</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 mx-auto">

                <div class="dashboard-current-order">

                    <img src="../img/logo.png" alt="bag" title="bag" class="img-fluid">
                    <br />
                    <label class="mt-1 small-txt">Sonia Mezon Online Sales Assistant </label>
                    <br /> <br />


                    <div class="tab">
                        <div class="row">
                            <div class="col-6">
                                <div class="tab-active">
                                    سفارشات جاری
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="tab-inactive">
                                    سفارشات ارسال شده
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="srch mt-2">
                        <!-- start form -->
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <input type="text" name="txtSrch" class="form-control fns-14" placeholder="جستجو..."
                                        required>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                    <button type="" class="btn" name="sub-srch"><i class="fas fa-search"></i></button>
                                    <!-- <i class="fas fa-search"></i> -->
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>


                    <div class="content mt-4">
                        <!-- Start Job -->
                        <div class="request-content" id="request-content">
                            <div class="container-fluid" style="padding: 0;">
                                <h6 style="color: #d71635; font-weight: bold; text-align: right; font-size: 14px;">
                                    <i class="fas fa-search"></i>
                                    فرم های ارسالی
                                </h6><br />
                                <table id="example" class="display" style="width:100%; font-size:14px;">
                                    <thead>
                                        <tr>

                                            <th>شناسه</th>
                                            <th>زمان</th>
                                            <th>نام</th>
                                            <th>متقاضی</th>
                                            <th>نتیجه بررسی</th>
                                            <th>بیشتر</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //echo time();
                                ?>
                                        <?php $result = mysqli_query($conn, "SELECT * FROM `customers` WHERE `c_archive` = '0' ORDER BY `c_id` DESC"); ?>
                                        <?php while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['c_id'] . "</td>";
                                    $ts = $row['c_dtime'];
                                    $timee = jdate('Y/m/d - h:i:s', $ts);
                                    echo "<td>" . $timee . "</td>";
                                    echo "<td>" . $row['c_fullname'] . "</td>";
                                   

                                    echo "<td><a href='admin-forms-continue.php?showMore={$row['c_id']}' target='_blank' title='اطلاعات بیشتر'><i class='fa fa-arrow-left' aria-hidden='true' style='color:#DC3545;font-size:20px'></i></a></td>";
                                    echo "<td><a href='admin-forms-checkup.php?showMore={$row['c_id']}'  title='اعمال بررسی'><i class='fas fa-search' aria-hidden='true' style='color:#DC3545;font-size:20px'></i></a></td>";
                                    echo "<td><a href='process.php?jobArchive={$row['c_id']}' title='بایگانی رکورد'><i class='fa fa-archive' aria-hidden='true' style='color:#DC3545;font-size:20px'></i></a></td>";
                                    echo "</tr>";
                                } ?>
                                    </tbody>
                                </table>
                                <hr />
                                <!-- Start Exit -->

                                <form action="exit.php" method="post"
                                    class="admin-col3-top d-none d-sm-none d-md-block d-lg-block d-xl-block">
                                    <button type="submit" class="btn-exit" name="logout_admin">
                                    <i class="fas fa-sign-out-alt"></i>
                                        EXIT
                                    </button>
                                </form>
                                <!-- End Exit -->
                            </div>

                        </div>
                        <!-- End Job -->

                    </div>






                </div><!-- end dashboard-current-order -->

            </div>
        </div>
    </div>













    </div><!-- end login -->

    </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="../js/all.min.js"></script>
    <script src="../js/myjs.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/dataTables.min.js"></script>



    <!-- Sort CoulmnS bASE oN DATE  -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "pageLength": 100

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#example1').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "pageLength": 100

            });
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>