<?php
    require_once 'app/include.php';
    session_start();
    ob_start();

    if($_SERVER['REQUEST_URI'] != '/index.php?id=2' && $_SERVER['REQUEST_URI'] != '/index.php?id=101'){
       if(!isset($_SESSION['role'])){
           header('Location: index.php?id=2');
       }
    }

//    if(isset($_SESSION['message'])){
//        echo '<div class="alert alert-danger text-center" role="alert">';
//        echo $arr_message[$_GET['message']];
//        echo '</div>';
//    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<header class="d-flex">
    <?php
        if($_SERVER['REQUEST_URI'] != '/index.php?id=2'){
            include_once('view/header.php');
        }
    ?>
</header>
<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-md-12 h-100 bg-color">
        <?php include_once ('app/router.php'); ?>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php ob_end_flush();