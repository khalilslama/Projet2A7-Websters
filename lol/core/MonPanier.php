<?php
session_start();
$ip_add = 0;
include "../views/db.php";

/*


if(isset($_POST["getProduct"]))
{
	
	$product_query = "SELECT * FROM article ";
	$run_query = mysqli_query($con,$product_query);
	while($row=mysqli_fetch_array($run_query))
	{
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='../images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Ajouter Au Panier</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	


echo '<div class="card">
				<div class="left">
					<img src="../backend/views/image/'.$row['image'].'">
				</div>
				<div class="right">
				<h2>'.$row['nomarticle'].'</h2>
					<div class="details">
					<h2>'.$row['nomarticle'].'</h2>
					<p>'.$row['description'].'</p>
					<button path="'.$path.'" pid="'.$row['reference'].'" id="product" style="float:right;"><i class="fas fa-cart-plus"></i></button>
				</div>
				</div>
			</div>'; 	




*/

if(isset($_POST["getProduct"]))
{
	$product_query = "SELECT * FROM article ";
	$run_query = mysqli_query($con,$product_query);
	while($row=mysqli_fetch_array($run_query))
	{
			$reference   = $row['reference'];
			$idco  = $row['idco'];
			$nomarticle = $row['nomarticle'];
			$description = $row['description'];
			$margedage = $row['margedage'];
			$margedeprix = $row['margedeprix'];
			$image = $row['image'];
			echo '<div class="card">
				<div class="left">
					<img src="../backend/views/image/'.$row['image'].'">
				</div>
				<div class="right">
				<h2>'.$row['nomarticle'].'</h2>
					<div class="details">
					<h2>'.$row['nomarticle'].'</h2>
					<p>'.$row['description'].'</p>
					<button pid="'.$row['reference'].'" id="product" style="float:right;"><i class="fas fa-cart-plus"></i></button>
				</div>
				</div>
			</div>';
	}

}





	if(isset($_POST["addToCart"])){
			
			$p_id = $_POST["proId"];
			$sql = "SELECT id FROM panier WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);

            

			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Article déja existant..!</b>
					</div>";
					exit("this");
			}


			$sql = "INSERT INTO panier (p_id,ip_add,user_id,qty) VALUES ('$p_id','$ip_add','-1','1')";

			
			echo $ip_add;
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Votre article est ajouté..!</b>
					</div>
				";
				exit("that");
			}
	
		
	}


//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM panier WHERE ip_add = '$ip_add' AND user_id < 0";
	
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

		//When user is not logged in this query will execute
		$sql = "SELECT a.reference,a.nomarticle,a.margedeprix,a.image,b.id,b.qty FROM article a,panier b WHERE a.reference=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$reference = $row["reference"];
				$nomarticle = $row["nomarticle"];
				$margedeprix = $row["margedeprix"];
				$image = $row["image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="../backend/views/image/'.$row['image'].'" /></div>
						<div class="col-md-3">'.$nomarticle.'</div>
						<div class="col-md-3">$'.$margedeprix.'</div>
					</div>';
				
			}
			?>
				<a style="float:right;" href="panier.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			//echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$reference = $row["reference"];
					$nomarticle = $row["nomarticle"];
					$margedeprix = $row["margedeprix"];
					$image = $row["image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$reference.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$reference.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$reference.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="../backend/views/image/'.$image.'"></div>
								<div class="col-md-2">'.$nomarticle.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$margedeprix.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$margedeprix.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				echo '<button type="submit" style="float:right;"name="login_user_with_product" class="btn btn-info btn-lg" value="Commander"  ><a href="commande.html">Commander</a></button></form>';
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	
		$sql = "DELETE FROM panier WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Article supprimé du panier..!</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	
		$sql = "UPDATE panier SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Article modifié..!</b>
				</div>";
		exit();
	}
}




?>






