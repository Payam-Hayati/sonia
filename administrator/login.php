<?php
session_start();
if (isset($_SESSION['login_admin'])) {
    unset($_SESSION['login_admin']);
}
?>
<!doctype html>


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

    <title>صفحه ورود به مدریت سونیا</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 mx-auto">

                <div class="login">

                    <img src="../img/logo.png" alt="bag" title="bag" class="img-fluid">
                    <br />
                    <label class="mt-1 small-txt">Sonia Mezon Online Sales Assistant </label>
                    <br /> <br /><br />



                    <!-- start form -->
                    
                    <form action="plogin.php" method="post">

                        <div class="col-12 pb-4">
                            <input type="text" name="txtUser" class="form-control fns-14" placeholder="نام کاربری">
                        </div>
                        <div class="col-12 pb-4">
                            <input type="text" name="txtPass" class="form-control fns-14" placeholder="رمز عبور">
                        </div>

                        <div class="col-12">
                            <input type="submit" name="login" class="btn btn-dark" value="ورود" style="width:100%">
                        </div>
                    </form>
                    <!-- end form -->


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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>