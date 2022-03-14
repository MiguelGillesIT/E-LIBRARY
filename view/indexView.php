<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <title>BL | ACCUEIL</title>
    <link rel="shortcut icon" href="public/images/LOGO_BIBLIO.png">
    <link rel="stylesheet" id="css-main" href="public/css/index.css">


</head>
<body>

<div id="page-container" class="page-header-fixed page-header-glass main-content-boxed side-trans-enabled page-header-scroll">

    <!-- Header -->
    <header id="page-header" class="js-appear-enabled animated fadeIn" data-toggle="appear" data-class="animated fadeIn" data-timeout="500">
        <!-- Header Content -->
        <div class="content-header justify-content-center justify-content-lg-between">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <a class="font-size-lg font-w600 text-dark" href="#">
                    <img class="imgHeader" src="public/images/LOGO_BIBLIO.png" alt="logoIVOIRJOB">
                </a>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="d-none d-lg-flex align-items-center">
                <!-- Menu -->
                <ul class="nav-main nav-main-horizontal nav-main-hover">
                    <li class="nav-main-item">
                        <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="controller/connexion.php">
                            <button type="button" class="btn btn-hero-success">CONNEXION</button>
                        </a>
                    </li>
                </ul>
                <!-- END Menu -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-hero-success" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->

    </header>
    <!-- END Header -->
    <div class="line-left"></div>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-white overflow-hidden">
            <div class="content content-top text-md-center mt-5">
                <div class="d-lg-none row justify-content-center d-flex align-items-center mt-3 mb-3">
                    <!-- Menu -->
                        <li class="nav-main-item">
                            <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="controller/connexion.php">
                                <button type="button" class="btn btn-hero-success">CONNEXION</button>
                            </a>
                        </li>
                    <!-- END Menu -->
                </div>
                <div class=" pt-4 pt-lg-5 text-center">
                    <h1 class="font-w800 mb-5 title">
                        BIENVENU CHEZ E-BIBLIOTHEQUE
                    </h1>
                </div>
                <div class="row justify-content-center">
                    <?php foreach($Books as $book): ?>
                        <div class="col-md-5">
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <h3 class="font-w700 text-center"> <?php echo $book['titreL'];?> </h3>
                                    <h5 class="font-w700 text-center"> <?php echo $book['auteurL'];?></h5>
                                    <h5 class="font-w700 text-center"> <?php echo $book['genreL'];?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>                            
                </div>
        </div>
        <!-- END Hero -->



        </div>
    </main>
    <!-- END Main Container -->
</div>

<script src="JS/dashmix.core.min.js"></script>

<!--
    Dashmix JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="JS/dashmix.app.min.js"></script>

<!-- Page JS Plugins -->
<script src="JS/jquery.sparkline.min.js"></script>



</body></html>