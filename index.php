<?php
  include_once './includes/dbprocess.php';


  if(isset($_SESSION['isLoggedin'])){
    header("Location: ./SEA/dashboard.php");
  }else{
    
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINKS -->
    <link rel="shortcut icon" type="image/jpg" href="./img/logo.png"/>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/sweetalert.css">
    <title>Single Entry Accounting</title>
    <link rel="shortcut icon" type="image/png " href="./img/logo.png">

    <link rel="stylesheet" href="./styles/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/sweetalert.min.js"></script>


</head>
<body>
  
    <main>
        <div class="big-wrapper light">
          <img src="./img/shape.png" alt="" class="shape" />
  
          <header>
            <div class="container">
              <div class="logo">
                <img src="./img/logo.png" alt="Logo" />
                <h3>SEA</h3>
              </div>
  
              <div class="links">
                <ul>
                  
                  <li><a href="./register.php" class="btn">Sign up</a></li>
                </ul>
              </div>
  
              <div class="overlay"></div>
  
            
          </header>
  
          <div class="showcase-area">
            <div class="container">
              <div class="left">
                <div class="big-title">
                  <h1>Future is here,</h1>
                  <h1>Single entry accounting</h1>
                </div>
                <p class="text">
                  Here's the simplified , easy to understand.
                And User friendly accounting system is in your hands!
                <br>
                Keep track the income, expenses and flow of cash of your business
                </p>
             
                <div class="cta">
                  <a href="#" class="btn" data-modal-target="#modal">Sign In</a>
                </div>
              </div>
  
              <div class="right">
                <img src="./img/hero.png" alt="Person Image" class="person" />
              </div>
            </div>
          </div>
  
          <div class="bottom-area">
            <div class="container">
             
            </div>
          </div>
        </div>
      </main>

    
      <div class="modal" id="modal">
        <div class="modal-header">
          <div class="title">Sign in</div>
          <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
          
                <form action="./includes/dbprocess.php" method="POST">
                 
                   
                    <div class="input-container email">
                        <label for="email">Email</label>
                        <input type="email"  id="email" name="email"  placeholder="example@domain.com" required>
                    </div>
                    <div class="input-container password">
                        <label for="password">Password</label>
                        <input type="password"  id="password" name="password" placeholder="cover your password" required>
                        <i class='bx bx-hide'></i>
                    </div>
                   
                         
                    <div class="login-container">
                        <p>You dont have an account? <a href="register.php">Sign up</a></p>
                    </div>
                        <br>
                        <br>
                    <div class="input-container cta">
                            <button class="signup-btn" type="submit" name="login_btn">Sign in</button>
                    </div>
                    <section class="copy-legal">
                        <br>
                       
                       
                        <p>By countinuing, you accept to agree out <br>
                         <a href="">Privacy policy</a>&amp; <a href="">Terms of service</a></p>
                    </section>
                </form>

 

        </div>
      </div>
      <div id="overlay"></div>




            <?php 
            if (isset($_SESSION['response']) && $_SESSION['response'] !='') { ?>

            <script>
            swal({
                title: "<?php echo $_SESSION['response']?>",
                icon: "<?php echo $_SESSION['res_type']?>",
                button: "Done",
            });
            </script>
        
            <?php
                unset($_SESSION['response']); 
                unset($_SESSION['res_type']);
              }
            ?>

</body>

<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/script.js" defer></script>
</html>