<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="icon" type="image/png" href="./static/images/" />-->

    <meta name="description" content="">
    <meta name="keywords" content="" lang="fr">
    <meta name="author" content="Nicolas Jousset, Vincent Le Quec">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/bootstrap/css/bootstrap-theme.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/fontawesome/css/fontawesome-all.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/style.css')?>">
    
    <title>Visage Livre</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand offset-2" href="#">
            <!--<img src="" width="30" height="30" class="d-inline-block align-top" alt="VisageLivre">-->
            <i class="far fa-smile"></i>
            VisageLivre
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse offset-6" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link1<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <!--<form class="form-inline my-2 my-lg-0">-->
            <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
            <!--</form>-->
        </div>
    </nav>
    <section>
    
        <?php 
            $this->load->view($content);
        ?>    
    
    </section>

    <footer class="bg-dark">
        <div class="mx-auto d-flex justify-content-center">
            <p class="">© Copyright VisageLibre 2018 | <a href="#">Mentions légales</a></p>
        </div>
    </footer>

    <!--JQuery-->
    <script src="../static/jquery-1.11.1.js"></script>
    <!--Bootstrap-->
    <script src="../static/bootstrap/js/bootstrap.min.js"></script>
    <!--JS-->
    <script src="../static/js/style.js"></script>
</body>

</html>
