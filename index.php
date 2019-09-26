<?php

	include('config/db_connect.php');
	require_once('templates/header.php');
	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['title_to_delete']);

		$sql = "DELETE FROM pizzas WHERE title ='$id_to_delete'";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}
	
	
	
	$sql = "SELECT title,ingredients,id FROM pizzas WHERE id=$_SESSION[id]";
	
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	
	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

	

	<h4 class="center grey-text">Pizzas!</h4>
	
	<div class="container">
		<div class="row">

			<?php foreach($pizzas as $pizza): ?>

				<div class="col s6 m4">
					<div class="card medium z-depth-0">
						<img src="img/pizza.svg"class="pizza">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<!-- <span  class="card-action left-align ">
						<a class="waves-effect waves-light btn">button</a>
						</span> -->
						<div class="card-action delbt" >
							<form action="index.php" method="POST" >
								<input type="hidden" name="title_to_delete" value="<?php echo $pizza['title']; ?>">
								
								<!-- <input type="submit" name="delete" value="Delete" class=""> -->
								<button class="btnt" name="delete" value="delete"><i class="fa fa-trash"></i></button>
							</form>
							<span class="right-align i" ><a class=" brand-text " href="details.php?id=<?php echo $pizza['id'] ?>"><img src="img/i.svg"height="22.5px" class="i"></a></span>
						</div>
						
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
