<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendors/Bootstrap/css/bootstrap.min.css"> -->

    <title>BDE CESI Exia</title>
    <?php $PAGE = "home"; ?>
</head>

<body>
<link rel="stylesheet" href="../assets/css/home.css">
<?php include("../common/header.php") ?>

<div class="front_body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">Bienvenue sur le site du BDE </h1>
                <h1 class="display-3 text-white text-center"><?php echo $_SESSION['f_name']?> <?php echo $_SESSION['l_name'] ?></h1>


            </div>
        </div>
    </div>
</div>

<?php include("../common/footer.php") ?>

</body>
</html>
