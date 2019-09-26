<?php
  $err='';
$action = $_SERVER['PHP_SELF'];
if (!empty($_POST)){
if(isset($_POST['submit'])){
    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = 'uploads/';
    if(isset($name)&&!empty($name)){
        if(move_uploaded_file($tmp_name, $location.$name)){
            $err=  'Successfully the ('.$name.') file uploaded!';
        }else{
            $err= 'There was an error uploading the file.';
        }

      }else{
          $err='Please choose a file';
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>My Support</title>
    <style type="text/css">

    .brand{
     background: #cbb09c !important;
   }
   .brand-text{
     color: #cbb09c !important;
   }
   .pre{
     /* position: relative;
     left: 5%; */
   }
   .card{
    position: relative;
    left: 13vw;
    /* height: 26vw; */
     width: 75% !important; */

   }
   footer{
     position: relative;
      bottom: 0px !important;
   }
    </style>
  </head>

  <body class="grey lighten-4">
  	<nav class="white z-depth-0">
      <div class="container">
        <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
      </div>
    </nav>
<div class=" center-align row pre">
  <h3>100% Refund Guaranteed</h3>
  <p class="">If unsatisfied with the product,please upload the bill below:</p>
</div>


      <div class=" card center-align  row">
      <form class=" card-content col s12" action="support.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input  id="first_name" type="text" class="validate" placeholder="First Name">

          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate" placeholder="Last Name">
          </div>
        </div>


        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>

        <div class="row">
          <div class="file-field input-field ">
            <div class="btn hoverable">
              <span>File</span>
              <input type="file" name='file'>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload bill photo(.jpg) ">
              <p class="left-align;"><?php echo htmlspecialchars($err) ; ?></p>
            </div>

          </div>
          <!-- <div class="row">
            <div class="file-field input-field ">
              <div class="btn hoverable">
                <span>File</span>
                <input type="file" name='file'>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload bill photo(.jpg) ">
                <p class="left-align;"><?php echo htmlspecialchars($err) ; ?></p>
              </div>

            </div> -->

        <div class="row">
          <div class="input-field col s12">
            <button class="hoverable btn waves-effect waves-light" type="submit" name="submit" value="submit">
            Submit</i></button>
          </div>
        </div>
      </form>
    </div>
  </div>

      <!-- //footer -->
      <div class=" center-align row">
          <footer class=" section">	&copy; Copyright 2019 Ninja Pizzas</footer>
      </div>
  </body>
</html>
