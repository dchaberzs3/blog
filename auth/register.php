<?php require "http://localhost/blog/includes/header.php"; ?>
<?php require "http://localhost/blog/config/config.php" ?>

<?php
    if(isset($_POST['username'])){
      header('location: http://localhost/blog/index.php');
    }

  if(isset($_POST['submit'])){
    if($_POST['email'] == '' OR $_POST['username'] == '' OR $_POST['password'] == '' ){
      echo "uzupełnij pola formularza";
    } else {
        $email = $_POST['email'];
        $usernane = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ;

        $insert = $conn->prepare("INSERT INTO users (email, username, password) VALUES(:email,:username,:password)");

        $insert->execute([
          ':email'=>$email,
          ':username'=>$usernane,
          ':password'=> $password
        ]);

        header("location: login.php");
    }
  }
?>

            <form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php require "http://localhost/blog/includes/footer.php"; ?>


           
        