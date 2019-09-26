<?php
session_start();
$name=$_SESSION['username']??'Guest';


 ?>

<head>
	<title>Ninja Pizza</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
	.delbt{
		display:flex;
		flex-wrap:wrap;
		height:100px;
	}
	.btnt {
		background-color: white; /* Blue background */
		border: none; /* Remove borders */
		color: #cbb09c; /* White text */
		padding: 12px 16px; /* Some padding */
		font-size: 22px; /* Set a font size */
		cursor: pointer; /* Mouse pointer on hover */
		position: relative !important;
		left: -95px !important;
		bottom:30px;

		}
		.i{
		display:flex-end;
		position: relative !important;
		right: -18px !important;
		top:10px;
	}

/* Darker background on mouse-over */
	.btnt:hover {
  		background-color: RoyalBlue;
		}
	  .brand{
	  	background: #cbb09c !important;
	  }
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .pizza{
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
	
	footer .support{
		position: fixed;
		bottom: 0px;
		left: 12px;
		bottom: 0px;
		border-radius: 8px 8px 0px 0px;


	}
	footer .Complaints{
		position: relative !important;
		left: 10px !important;
		text-decoration: none !important;
		color: white;
	}
	/* .row{
		display: flex !important;
		flex-basis: 200px !important;
		flex-wrap: wrap !important;


	} */
	/* .card-content{

		height:200px !important;
		/* overflow: auto !important ; */
	} */
  </style>
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
				<li class="	grey-text ">Hello <?php echo ($name); ?></li>
        <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
      </ul>
    </div>
  </nav>
