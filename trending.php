
<!DOCTYPE html>

<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Plaza | Shoes</title>

	<!-- Site Icon -->
	<link rel="shortcut Icon" type="image/png" href="img/favicon.png">

	<!-- Font Awesome Icons -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Google Fonts -->
	<!--<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link href="assets/css/parthstyle.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		  $(function(){
		  	$("#navbar").load("navbar.html");
		});
	</script>
	<!--link rel="stylesheet" type="text/css" href="parthstyle.css"/-->
	<link rel="stylesheet" type="text/css" href="assets/css/raphaelstyle.css"/>

</head>
<body>
	<div id="navbar"></div>
	<div class="page-section masthead2" style="font-family: 'Inter',sans-serif;">
		<div class="container h-50">
				<h1 style="color: black; text-align: center;"> Trending </h1>
				<input type="text" id="search-input">
				<button onclick="search()">Search</button>
				<ul id="results-list"></ul>
		</div>
	</div>

	<section class="page-section" style="font-family: 'Inter',sans-serif;">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 blog-form">
					<h2 class="blog-sidebar-title"><b>Accessories</b></h2>
					<hr />
					<!--<p class="blog-sidebar-text">No products in the cart...</p>-->
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Shoes</b></p>
					<p class="blog-sidebar-text"><b><span class="list-icon"> > </span> Watches</b></p>
					<p class="blog-sidebar-text"><b><span class="list-icon"> > </span> Sunglasses</b></p>
					<p class="blog-sidebar-text"><b><span class="list-icon"> > </span> Jewlry</b></p>
					<p class="blog-sidebar-text"><b><span class="list-icon"> > </span> Belts</b></p>
					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<h2 class="blog-sidebar-title"><b>Categories</b></h2>
					<hr />
					
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Brands</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Gender</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Price</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Color</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Size</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Features</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> > </span> Occasion</b></p>

					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<button type="button" class="btn btn-dark btn-lg">Filter</button>

					<div>&nbsp;</div>
					<div>&nbsp;</div>


				</div>
				<!--END  <div class="col-lg-3 blog-form">-->

				<div class="col-lg-9" style="padding-left: 30px;">
					<div class="row">
						<div class="col" style="font-weight: 800;">
						</div>

						<div class="col">
						<form action="" method="post" >
							<label for="category">Sort By: </label>
							<select name="category" id="my-dropdown" class="form-control">
								<option value=""></option>
								<option value="name">Sorted by name</option> 
								<option value="low">Sorted by ascending price</option>
								<option value="high">Sorted by descending price</option>
							</select>
							<br>
						</form>
							<script>
							  document.getElementById("my-dropdown").onchange = function() {
								this.form.submit();
							  };
							</script>
							
						</div>

					</div>
					<div id="resultDiv"></div>

<?php
// check if the form has been submitted
	$username="webuser";
	$password=".kzI[OojMi_cT_p6";
	$host="localhost";
	$db="products";
	//create new mysql connection
	$dblink=new mysqli($host, $username, $password, $db);//make 
	$sql="";
if (isset($_POST['category'])) {
  // get the selected category from the form data
  $category = $_POST['category'];
	switch ($category) {
		case "low":
			$sql = "select * from entries order by product_price ASC";
			$results=$dblink->query($sql) or
			die("<p>Something went wrong with: $sql<br>".$dblink->error);
			while($data=$results->fetch_array(MYSQLI_ASSOC)){
			//echo '<div class="row">';
				echo '<div class="card">';
						echo '<img src='.$data['product_image']. ' class="product-image">';
						echo '<h4>'.$data['product_name'].'</h4>';
						echo '<p>'.$data['product_description'].'</p>';
						echo '<span>$' .$data['product_price']. '</span>';
				echo '</div>';
				//echo '</div>';
				echo '<div>&nbsp;</div>';
				echo '<div>&nbsp;</div>';
			}
			break;
		case "high":
			$sql = "select * from entries order by product_price DESC";
			$results=$dblink->query($sql) or
			die("<p>Something went wrong with: $sql<br>".$dblink->error);
			while($data=$results->fetch_array(MYSQLI_ASSOC)){
			//echo '<div class="row">';
				echo '<div class="card">';
						echo '<img src='.$data['product_image']. ' class="product-image">';
						echo '<h4>'.$data['product_name'].'</h4>';
						echo '<p>'.$data['product_description'].'</p>';
						echo '<span>$' .$data['product_price']. '</span>';
				echo '</div>';
				//echo '</div>';
				echo '<div>&nbsp;</div>';
				echo '<div>&nbsp;</div>';
			}
			break;
		case "name":
			$sql = "select * from entries order by product_name ASC";
			$results=$dblink->query($sql) or
			die("<p>Something went wrong with: $sql<br>".$dblink->error);
			while($data=$results->fetch_array(MYSQLI_ASSOC)){
			//echo '<div class="row">';
				echo '<div class="card">';
						echo '<img src='.$data['product_image']. ' class="product-image">';
						echo '<h4>'.$data['product_name'].'</h4>';
						echo '<p>'.$data['product_description'].'</p>';
						echo '<span>$' .$data['product_price']. '</span>';
				echo '</div>';
				//echo '</div>';
				echo '<div>&nbsp;</div>';
				echo '<div>&nbsp;</div>';
			}
			
			
			break;
		default:
			$sql = "SELECT * FROM entries";
			$results=$dblink->query($sql) or
			die("<p>Something went wrong with: $sql<br>".$dblink->error);
			while($data=$results->fetch_array(MYSQLI_ASSOC)){
			//echo '<div class="row">';
				echo '<div class="card">';
						echo '<img src='.$data['product_image']. ' class="product-image">';
						echo '<h4>'.$data['product_name'].'</h4>';
						echo '<p>'.$data['product_description'].'</p>';
						echo '<span>$' .$data['product_price']. '</span>';
				echo '</div>';
				//echo '</div>';
				echo '<div>&nbsp;</div>';
				echo '<div>&nbsp;</div>';
			}
			break;
	}
}
else{
	$sql = "SELECT * FROM entries";
	$results=$dblink->query($sql) or
	die("<p>Something went wrong with: $sql<br>".$dblink->error);
	while($data=$results->fetch_array(MYSQLI_ASSOC)){
	//echo '<div class="row">';
		echo '<div class="card">';
				echo '<img src='.$data['product_image']. ' class="product-image">';
				echo '<h4>'.$data['product_name'].'</h4>';
				echo '<p>'.$data['product_description'].'</p>';
				echo '<span>$' .$data['product_price']. '</span>';
		echo '</div>';
		//echo '</div>';
		echo '<div>&nbsp;</div>';
		echo '<div>&nbsp;</div>';
	}
}
  

  // close the database connection
  $dblink->close();

?>

					
				</div>
			</div>
		</div>
	</section>
</body>
</html>

<script>
	   const users = [
        { name: "Nike1", },
        { name: "Jordan2" },
        { name: "Nike3" },
        { name: "PG3" }
      ];
	
      function searchUsers(users, searchTerm) {
        return users.filter(user => {
          return user.name.toLowerCase().includes(searchTerm.toLowerCase());//the function is user.name.tolowercase.includes, the current value is searchterm.tolowercase
        });
      }

      function search() {
        const searchTerm = document.getElementById("search-input").value;
        const results = searchUsers(users, searchTerm);

        const resultsList = document.getElementById("results-list");
        resultsList.innerHTML = "";
        results.forEach(result => {
          const div = document.createElement("a");
		  const br = document.createElement("br");
          div.textContent = result.name;
		  div.setAttribute("href", `productdetails.html?name=${result.name}`);
          resultsList.appendChild(div);
		  resultsList.appendChild(br);
        });
      }
      function showProductDetails(productId) {
        window.location.href = `productdetails.html?id=${productId}`;
      }
    </script>