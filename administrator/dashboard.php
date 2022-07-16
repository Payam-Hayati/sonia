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
    <link rel="stylesheet" href="../css/dataTables.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    
    <link rel="stylesheet" type="text/css" href="../css/lightbox.min.css">


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



                    



                    <!-- start tab -->

                    <div class="tab">
                        <div class="row">
                            <div class="col-6">
                                
                                <div class="tab-active hand" id="tabActive" onclick="show_current_con()">

                               
                                <div class="sumation" id="sumation">
                                <?php 
                                   $result = mysqli_query($conn, 'SELECT SUM(`c_id`) AS `c_id` FROM `customers` WHERE `c_archive` = "0" '); 
                                   $row = mysqli_fetch_assoc($result); 
                                   $sum = $row['c_id'];
                                   echo $sum;
                                ?>
                                </div>

                                    سفارشات جاری
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="tab-inactive hand" id="tabInactive" onclick="show_archive_con()">
                                    سفارشات ارسال شده
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end tab -->


                    <!-- start search -->
                    <div class="mt-2" id="srchForm">
                        <!-- start form -->
                        <form action="search.php" method="post">
                            <div class="row">
                                <div class="col-10">
                                    <input type="text"  name="txtSrch" class="form-control fns-14" placeholder="جستجو..."
                                        required>
                                </div>
                                <div class="col-2">

                                    <button type="" class="btn btn-danger" name="sub-srch"><i
                                            class="fas fa-search"></i></button>
                                    <!-- <i class="fas fa-search"></i> -->
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>

                    <!-- end search -->


                    <!-- start current order -->
                    <div class="tb-current-order mt-2" id="tb-current-order">
                        <div class="content fns-14">


                            <?php
                          $sql = "SELECT * FROM `customers` WHERE `c_archive` = '0'";
                          $result = mysqli_query($conn, $sql);
                          
                          if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              //echo "id: " . $row["c_id"]. " - Name: " . $row["c_fullname"]. " " . $row["c_mobile"]. "<br>";
                              ?>
                            <div class="current-customer-content mb-2">


                            
                            
                            <?php
                              $back_from_archive = $row["c_back_archive"];
                              //echo $back_from_archive;
                              $one = 0;
                              
                              if($back_from_archive >$one){
                                echo '<div class="back-from-archive">';
                                echo 'این سفارش  از سفارشات ارسال برگشت شده است';
                                echo '</div>';
                              }else {
                                  //echo 'not ok';
                              }
                             // echo '<br>';
                             

                            ?>
                                
                           



                                <span>تاریخ : </span><br />
                                <?php
                                    $ts = $row['c_dtime'];
                                    $timee = jdate('Y/m/d - h:i:s', $ts);
                                    echo $timee;
                                   ?>

                                <br />

                                <span>نام و نام خانوادگی : </span><br />
                                <?php echo $row["c_fullname"]; ?>

                                <br />

                                <span>شماره تماس : </span><br />
                                <?php echo $row["c_mobile"]; ?>


                                <br />
                                <span> آدرس کامل پستی : </span><br />
                                <?php echo $row["c_address"]; ?>

                                <br />

                                <span> کد پستی : </span><br />
                                <?php echo $row["c_post_code"]; ?>
                                <br />

                                <span> نام محصولات سفارش داده شده : </span><br />
                                <?php echo $row["c_product_names"]; ?>

                                <br /><br />


                                <div class="price-box">
                                    <span>مبلغ سفارش</span>
                                    <?php echo $row["c_price"]; ?>
                                    <span>هزارتومان</span>
                                </div>



                                <div class="fish-box mt-2">
                                    <span>
                                        <a href="img/<?php echo $row['c_fish']; ?>" data-lightbox="mygallery"
                                            data-title="<?php echo $row['c_fish']; ?>">
                                            مشاهده فیش واریزی
                                        </a>
                                    </span>

                                </div>

                                <div class="confirm mt-2">
                                    <ul>
                                        <li>

                                            <div class="btn-confirm">
                                                <a href="process.php?confirmPrice=<?php echo $row['c_id']; ?>"
                                                    onclick="return confirm('از ویرایش اطلاعات مطمئن هستید؟')">
                                                    <?php
                                                      $vlue_confirm_price = $row['c_confirm_price'];
                                                      if($vlue_confirm_price == 1) {
                                                          echo '<i class="fas fa-check"></i>';
                                                      }else {
                                                          echo '<i class="fas fa-times"></i>';
                                                      }
                                                    ?>

                                                    تایید مالی
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="btn-confirm">




                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn-confirm pa-0"
                                                    style="border:none; padding:0;  min-width: 100px;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal<?php echo $row['c_id'];?>">
                                                    تایید ارسال
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $row['c_id'];?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                <button type="button" class="btn-close float-left"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php //echo 'شناسه'. $row['c_id'];?>
                                                                <div class="sending-form">
                                                                    <form action="process.php" method="POST">
                                                                        <input type="hidden" name="txtId"
                                                                            value="<?php echo $row['c_id'] ?>" readonly>
                                                                        <label>
                                                                            <input type="radio" name="radio"
                                                                                value="پست">پست
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="radio"
                                                                                value="پیک">پیک
                                                                        </label>
                                                                        <br />

                                                                        <label class="form-label">شماره پیگیری پستی را
                                                                            وارد
                                                                            کنید</label>
                                                                        <input type="text" name="txtPostFollow"
                                                                            class="form-control">


                                                                        <button type="submit" name="sub-confirm-send"
                                                                            class="mt-2 btn-send">تایید ارسال</button>
                                                                    </form>
                                                                </div>


                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div><!-- End Modal -->

                                            </div>



                                        </li>
                                    </ul>
                                </div>


                            </div>

                            <?php
                            }
                          } else {
                            echo "0 results";
                          }
                        ?>

                        </div>

                    </div>
                    <!-- end current order -->





                    <!-- start archiver order -->
                    <div class="tb-archive-order" id="tb-archive-order" style="display: none;">
                        <div class="content mt-4">

                            <div class="request-content" id="request-content">
                                <div class="container-fluid" style="padding: 0;">

                                    <table id="example12" class="display" style="width:100%; font-size:14px;">
                                        <thead class="text-center fn-bold">
                                            <tr>
                                                <th>شناسه</th>
                                                <th>کد پستی</th>
                                                <th>تاریخ</th>
                                                <th>نام</th>
                                                <th>عملیات</th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            <?php $result = mysqli_query($conn, "SELECT * FROM `customers` WHERE `c_archive` = '1' ORDER BY `c_id` DESC"); ?>
                                            <?php while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['c_id'] . "</td>";
                                                echo "<td>" . $row['c_post_code_product'] . "</td>";
                                                $ts = $row['c_dtime'];
                                                $timee = jdate('Y/m/d - h:i:s', $ts);
                                                echo "<td>" . $timee . "</td>";
                                                echo "<td>" . $row['c_fullname'] . "</td>";
                                                
                                                ?>
                                            <td>

                                                <div class="icons">
                                                    <ul>
                                                        <li>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn-confirm pa-0"
                                                                style="border:none;"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal1<?php echo $row['c_id'];?>">
                                                                <i class='fas fa-eye silver-color'></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade"
                                                                id="exampleModal1<?php echo $row['c_id'];?>"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel1"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel1">
                                                                            </h5>
                                                                            <button type="button"
                                                                                class="btn-close float-left"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="popup-customer-content mb-2">
                                                                                <?php //echo 'شناسه'. $row['c_id'];?>
                                                                                <span>تاریخ : </span><br />
                                                                                <?php
                                                                    $ts = $row['c_dtime'];
                                                                    $timee = jdate('Y/m/d - h:i:s', $ts);
                                                                    echo $timee;
                                                                ?>

                                                                                <br />

                                                                                <span>نام و نام خانوادگی : </span><br />
                                                                                <?php echo $row["c_fullname"]; ?>

                                                                                <br />

                                                                                <span>شماره تماس : </span><br />
                                                                                <?php echo $row["c_mobile"]; ?>


                                                                                <br />
                                                                                <span> آدرس کامل پستی : </span><br />
                                                                                <?php echo $row["c_address"]; ?>

                                                                                <br />

                                                                                <span> کد پستی : </span><br />
                                                                                <?php echo $row["c_post_code"]; ?>
                                                                                <br />

                                                                                <span> نام محصولات سفارش داده شده :
                                                                                </span><br />
                                                                                <?php echo $row["c_product_names"]; ?>

                                                                                <br /><br />


                                                                                <div class="price-box">
                                                                                    <span>مبلغ سفارش</span>
                                                                                    <?php echo $row["c_price"]; ?>
                                                                                    <span>هزارتومان</span>
                                                                                </div>



                                                                            </div>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- End Modal -->

                                                        </li>

                                                        <li>
                                                            <a href="process.php?backToCurrentList=<?php echo $row['c_id']; ?>"
                                                                onclick="return confirm('از بازگردانی اطلاعات مطمئن هستید؟')">
                                                                <i class='fas fa-undo'></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </td>


                                            <?php
                                               
                                                echo "</tr>";
                                } 
                                
                                ?>
                                        </tbody>
                                    </table>
                                    <hr />

                                </div>

                            </div>


                        </div>




                    </div>
                    <!-- Start Exit -->
                    <form action="exit.php" method="post" class="mt-2">
                        <button type="submit" class="btn-exit" name="logout_admin">
                            <i class="fas fa-sign-out-alt"></i>
                            EXIT
                        </button>
                    </form>
                    <!-- End Exit -->

                    <!-- end archiver order -->








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
    <script src="../js/lightbox-plus-jquery.min.js"></script>

    <!-- optionssssssssssssssssssssssssssssssssssssssssss -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/jquery-3.2.0.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/dataTables.min.js"></script>
   



    <!-- Sort CoulmnS bASE oN DATE  -->
    <script>
        $(document).ready(function () {
            $('#example12').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "pageLength": 100

            });
        });
    </script>




    <script>
        function show_current_con() {
            $("#tb-current-order").toggle("slow");
            $("#tb-archive-order").css('display', 'none');
        }

        function show_archive_con() {
            $("#tb-archive-order").toggle("slow");
            $("#tb-current-order").css('display', 'none');
        }




        $(document).ready(function () {
            $("#tabInactive").click(function () {
                $('#tabInactive').css('background', '#F2F2F2');
                $('#tabActive').css('background', '#FFFFFF');
                $('#sumation').fadeOut();
                $('#srchForm').fadeOut();
                
                
            });
        });


        $(document).ready(function () {
            $("#tabActive").click(function () {
                $('#tabActive').css('background', '#F2F2F2');
                $('#tabInactive').css('background', '#FFFFFF');
                $('#sumation').fadeIn();
                $('#srchForm').fadeIn();
                
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

