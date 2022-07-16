<?php require_once './config/config.php'; ?>
<?php include 'jdf.php'; ?>

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

    <title>سونیا</title>
</head>

<body>


<?php

/* Start Confirm Price */ 
if (isset($_GET['confirmPrice'])) {
                                    
    $idConfirmPrice = mysqli_real_escape_string($conn, $_GET['confirmPrice']);

    $zero = 0;
    $one = 1;
    $check = "";

    $sql = "SELECT * from `customers` WHERE `c_id` = '$idConfirmPrice' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $check = $row['c_confirm_price'];
        }
    } else {
        echo "0 results-status";
    }

    if ($check == $zero) {
        //echo 'this field is hide';
        $sql = "UPDATE `customers` SET `c_confirm_price` = '" . $one . "' WHERE `c_id` = '" . $idConfirmPrice . "'";
        if ($conn->query($sql) === TRUE) {
            header("refresh:0.5;url=dashboard.php");
            echo "<script>alert('اطلاعات با موفقیت ویرایش شد');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "UPDATE `customers` SET `c_confirm_price` = '" . $zero . "' WHERE `c_id` = '" . $idConfirmPrice . "'";
        if ($conn->query($sql) === TRUE) {
            header("refresh:0.5;url=dashboard.php");
            echo "<script>alert('اطلاعات با موفقیت ویرایش شد');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
/* End Confirm Price */ 




/* Start Confirm Send */
if (isset($_POST['sub-confirm-send'])) {

    $idConfirmSend = mysqli_real_escape_string($conn, $_POST['txtId']);
    $txtPostFollow = mysqli_real_escape_string($conn, $_POST['txtPostFollow']);
    $sendMethod = $_POST['radio'];
    $zero = 0;
    $one = 1;
    //UPDATE `customers` SET `c_post_code_product` = '154888999' WHERE `customers`.`c_id` = 14;
    //$sql = "UPDATE `customers` SET `c_confirm_send` = '$one'  WHERE `c_confirm_send` = '$zero' and `c_id` = '$idConfirmSend'  ";
    $one = 1;
    $sql = "UPDATE `customers` SET `c_confrim_send` = '$one', `c_post_code_product` = '$txtPostFollow', `c_method_send` = '$sendMethod', `c_archive` = '$one' WHERE `customers`.`c_id` = '$idConfirmSend' ";
    if ($conn->query($sql) === TRUE) {
        header("refresh:0.5;url=dashboard.php");
        echo "<script>alert('فیش تایید ارسال شد');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
}
/* End Confirm Send */




/* Start Undo - Back to Current List */
//backToCurrentList

if (isset($_GET['backToCurrentList'])) {
                                    
    $idBackToCurrentList = htmlentities($_GET['backToCurrentList'], ENT_QUOTES, 'utf-8');
    //echo $idBackToCurrentList;
    
    $sql = "UPDATE `customers` SET `c_archive` = '0', `c_back_archive` = '1' WHERE `c_id` = $idBackToCurrentList;";
    //$sql = "UPDATE `customers` SET `c_archive` = '$zero'  WHERE `customers`.`c_archive` = $one and `customers`.`c_id` = '$idBackToCurrentList' ";
            if ($conn->query($sql) === TRUE) {
                header("refresh:0.5;url=dashboard.php");
                echo "<script>alert('فیش به لیست جاری منتقل شد');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
}
/* End Undo - Back to Current List */

?>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="../js/all.min.js"></script>
    <script src="../js/myjs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html>