<?php

class Header
{
    public function __construct()
    {
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
            echo "<head>";
                echo "<meta charset='UTF-8'>";
                echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
                echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css' integrity='sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==' crossorigin='anonymous' referrerpolicy='no-referrer' />";
                echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>";
                echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js' integrity='sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/' crossorigin='anonymous'></script>";
                echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js' integrity='sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' crossorigin='anonymous'></script>";
                echo "<title>IES Celia Viñas</title>";
            echo "</head>";
            echo "<body>";

            echo "<header>";
                echo "<nav class='navbar navbar-expand-lg navbar-light bg-light p-3'>";
                    echo "<a class='navbar-brand' href='/'>";
                        echo "<img src='http://iescelia.org/web/wp-content/uploads/2015/05/escudo.png' width='30' height='30' class='d-inline-block align-top' alt='Logo Celia'> I.E.S Celia Viñas";
                    echo "</a>";
                    echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
                         echo "<span class='navbar-toggler-icon'></span>";
                    echo "</button>";
                    echo "<div class='collapse navbar-collapse' id='navbarNav'>";
                        echo "<ul class='navbar-nav'>";
                            echo "<li class='nav-item active'>";
                                echo "<a class='nav-link' href='/'>Inicio</a>";
                            echo "</li>";
                            echo "<li class='nav-item'>";
                                echo "<a class='nav-link' href='/recursos'>Recursos</a>";
                            echo "</li>";
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='/usuarios'>Usuarios</a>";
                            echo "</li>";
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='/views/tramosHorarios.php'>Tramos Horarios</a>";
                            echo "</li>";
                        echo "</ul>";
                    echo "</div>";
                echo "</nav>";
            echo "</header>";
    }
}
