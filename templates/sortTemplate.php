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
            <div class="col-lg-6 col-md-10">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="boxalpha-inner">
                            <?=queryTime();?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 spacerVert">
                        <div class="boxalpha-inner">
                            <?php include("./templates/modules/searchForm.php")?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("./templates/modules/quickOptions.php")?>
            <div class="col-lg-2 col-md-1"></div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/basics.js"></script>
</html>
