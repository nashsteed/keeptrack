<?php
require("session.php");
require("connect-db2.php");
require("login.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  if(!empty($_POST['loginbtn']) && ($_POST['loginbtn'] == "Submit")){
      $results = selectUserRow($_POST['username']);
      
      foreach ($results as $item){
        $pw = $item['password'];
        $email = $item['email'];
      }

      if(count($results) > 0){
        if($pw == $_POST['password']){
          header("Location: home.php");
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['email'] = $email;
        }
      }
      if(count($results) > 0 && (($pw != $_POST['password']))){
        echo "Wrong Credentials. Try again!";
      }
      
      



  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <title>Bootstrap Login Form</title>
    <!-- https://play.tailwindcss.com/yfLiDlhcNv -->
  </head>
  <body>
    <section>
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-7 col-md-6 m-auto">
            <div class="card border-0 shadow">
              <div class="card-body">
                <img src="keepTracklogo.png" width = 200></a>
                <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <form action="index.php" method="post">
                  <input type="text" name="username" id="" class="form-control my-4 py-2" placeholder="Username" />
                  <input type="password" name="password" id="" class="form-control my-4 py-2" placeholder="Password" />
                  <input type = "submit" class = "btn btn-success" name = "loginbtn" value="Submit" title="click to login" />
                  <div class="text-center mt-3">
                    <a href="#" class="nav-link">Don't Have An Account Yet? Sign Up</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>