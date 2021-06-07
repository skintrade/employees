<!doctype html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="../../css/main.min.css">
</head>
<body>
    <div class="container-fluid masterContainer">
        <div class="row">
            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-8 col-md-10">
                <div class="col-lg-10 col-md-8 col-sm-7">
                    <h1>GeneriCo Employee Data</h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-6 col-md-10">
                <div class="row">
                    <div class="col-sm-12 centerify">
                        <div class="boxalpha-inner">
                            <h3>You can search for a user with the form below, or jump quickly to a sub set with the quick filters.</h3>
                            <h4>Using the search will allow for more fine tuned results, and supports partial queries. As with any search the more information you can supply, the better the reults will be.
                            "Jon" will return fewer results than "Jo"</h4>
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
