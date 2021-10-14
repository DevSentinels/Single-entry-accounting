<?php
  include_once './includes/dbprocess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./styles/sweetalert.css">
    <link rel="stylesheet" href="./styles/register.css">
    <title>Single Entry Accounting</title>
    <link rel="shortcut icon" type="image/png " href="./img/logo.png">


        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/sweetalert.min.js"></script>

    </head>

    <body>
            <div class="split-screen">
                <img src="./assets/img/gatercy.jpg" alt="">
                <div class="left">
                    <section class="copy">
                        <h2>Keep on track on your business</h2>
                        <p>Easy to navigate single entry accounting system</p>
                    </section>

                </div>
                <div class="right">
                            <form action="./includes/dbprocess.php" method="POST">
                                <section class="copy">
                                    <h2>Sign up</h2>
                                    
                                </section>
                                <div class="login-container">
                                        <p>already have an account? <a href="index.php">Login</a></p>
                                    </div>
                                <div class="input-container name">
                                    <label for="fname">Fullname</label>
                                    <input type="text"  id="fname" name="fname" required>
                                </div>
                                <div class="input-container name">
                                    <label for="bname">Business Name</label>
                                    <input type="text"  id="bname" name="bname" required>
                                </div>
                                <div class="input-container email">
                                    <label for="email">Email</label>
                                    <input type="email"  id="email" name="email" required>
                                </div>
                                <div class="input-container password">
                                    <label for="password">Password</label>
                                    <input type="password"  id="password" name="password" placeholder="Must be at least 6 characters" minlength="6" required>
                                    <i class='bx bx-hide'></i>
                                </div>
                               
                                <div class="input-container cta">
                                        <button  type="submit" class="signup-btn" name="signup_btn">Sign up </button>
                                </div>
                                <section class="copy-legal">
                                    <p>By countinuing, you accept to agree out <br>
                                     <a href="">Privacy policy</a>&amp; <a href="">Terms of service</a></p>
                                </section>
                            </form>

                </div>

            </div>




                <div class="image">

                </div>





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
                unset($_SESSION['response']); }
            ?>



</body>
</html>


		

		