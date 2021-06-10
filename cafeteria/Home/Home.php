<?php
    include_once 'database.php';
    
    session_start();
    
    if(isset($_GET['cerrar_sesion'])){  
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: colab.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: colab.php');
                break;

                case 2:
                header('location: colab.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="inicio/build/css/app.css" />
    <script src="login/js/jquery-3.5.1.min.js"></script>
    <script src="login/js/main.js"></script>
    <script src="https://kit.fontawesome.com/cd33816f91.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login/css/estilos.css">
    <title>Sitio Cafetero</title>
  </head>
  <body>

  <div class="pop-up" style="z-index: 2;">
        <div class="pop-up-wrap">
            <div class="pop-up-title">
                <h2>CAFETACUBA</h2>
            </div>
            <div class="subcription">
                <div class="line"></div>
                <i class="far fa-times-circle" id="close"></i>
                <div class="sub-content">
                    <h2>Login</h2>
                    <form action="#" method="POST">

                        <br/><input class="subs-email" type="text" placeholder="Correo electronico" name="username"><br/>

                        <br/><input class="subs-email" type="text" name="password" placeholder="Contraseña"><br/>
                        <input class="subs-send" type="submit" value="Iniciar sesión">
                     </form>
                </div>
                
                <div class="line"></div>
            </div>
        </div>
    </div>

    <header class="header-video">
      <div class="overlay">
        <div class="container-video">
          <div class="container-navbar">
            <nav class="container navbar">
              <h1><a href="#" class="nav-logo">Cafetacuba</a></h1>
              <ul class="nav-menu">
                <li class="nav-item">
                  <a href="inicio/pages/menu.html" class="nav-link">Menú</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Puntos de Venta</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Únete </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link"
                    ><i class="fas fa-shopping-cart"></i
                  ></a>
                </li>
              </ul>
              <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
              </div>
            </nav>
          </div>
          <div class="container main-content">
            <div class="slider-info">
              <h1>DISFRUTA DEL MEJOR CAFÉ DEL MUNDO</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
                vel lectus nec nibh mollis hendrerit. In commodo, magna eget
                ullamcorper sodales, arcu tellus semper sapien.
              </p>
            </div>
            <div class="video-navigation">
              <span onclick="videoUrl('video1.mp4')"></span>
              <span onclick="videoUrl('video2.mp4')"></span>
              <span onclick="videoUrl('video3.mp4')"></span>
            </div>
          </div>
        </div>
      </div>
      <video id="video-slider" autoplay muted loop>
        <source src="inicio/video/video1.mp4" type="video/mp4" />
      </video>
    </header>
    <div class="note-slider"></div>
    <section class="primary-content">
      <main class="container main-container">
        <div class="txt-img-container">
          <div class="text-offer">
            <h2>El café grátis a la vuelta de la esquina</h2>
            <p>En todas nuestras sucurslaes</p>
            <a href="" class="btn-s1">Únete Ahora</a>
          </div>
          <img src="inicio/src/img/img2.jpg" alt="cafe-gratis" />
        </div>
        <div class="-txt-img-container">
          <div class="text-offer">
            <h2>El café grátis a la vuelta de la esquina</h2>
            <p>En todas nuestras sucurslaes</p>
            <a href="" class="btn-s1">Ordena Ahora</a>
          </div>
          <img src="inicio/src/img/img2.jpg" alt="cafe-gratis" />
        </div>
        <div class="txt-img-container">
          <div class="text-offer">
            <h2>Descubre nuestro menú</h2>
            <p>Las mejor de todo el mercado</p>
            <a href="" class="btn-s1">Ir a Menú</a>
          </div>
          <img src="inicio/src/img/img2.jpg" alt="cafe-gratis" />
        </div>
      </main>
    </section>
    <footer class="footer">
      <nav class="container navbar">
        <h1><a href="#" class="nav-logo">Cafetacuba</a></h1>
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="#" class="nav-link">Menú</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Facebook</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Instagram</a>
          </li>
        </ul>
      </nav>
    </footer>
    <script
      src="https://kit.fontawesome.com/4b249c1b38.js"
      crossorigin="anonymous"
    ></script>
    <script src="inicio/build/js/bundle.js"></script>
  </body>
</html>
