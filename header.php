<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="A short description." />
        <meta name="keywords" content="put, keywords, here" />
        <title>Foro CUN</title>
        <link rel="stylesheet" href="style.css" type="text/css"></link>
        <script type="text/javascript" src="lightbox/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="lightbox/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" src="lightbox/js/jquery.smooth-scroll.min.js"></script>
        <script type="text/javascript" src="lightbox/js/lightbox.js"></script>
        <link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" />
    </head>
    <body>
        <h1>Mi foro CUN servidores y servicios web</h1>
        <div id="wrapper">
            <div id="menu">
                <a class="item" href="/forum/index.php">Inicio</a> -
                <a class="item" href="/forum/create_topic.php">Crear entrada</a> -
                <a class="item" href="/forum/create_cat.php">Crear categoría</a>
                <script src="js/agregarNuevaFila.js" type="text/javascript"></script>
                <div id="userbar">
                    <div id="userbar">

                        <?php
                        session_start();
                        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in']) {
                            echo 'Hola  ' . $_SESSION['user_name'] . '. ¿No eres tu? <a href="signout.php" class="item">Salir</a>';
                        } else {
                            echo '<a href="signin.php" class="item">Ingresar </a> or <a href="signup.php" class="item">create an account</a>.';
                        }
                        ?>

                    </div>
                </div>
                <div id="content">
