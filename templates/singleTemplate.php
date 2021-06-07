<!doctype html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="./css/main.min.css">
</head>
<body>
    <div class="container-fluid masterContainer">
        <?php include ('./templates/modules/pageHeader.php'); ?>
        <div class="row">
            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-8 col-md-10">
                <?=queryTime();?>
            </div>
            <div class="col-lg-2 col-md-1"></div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/basics.js"></script>
</html>
