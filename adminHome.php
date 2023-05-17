<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="assets/js/jquery-3.5.1.js"></script>
<title>Untitled Document</title>
</head>
<style>
	#myButton{
		background-color: #000000;
        color: #FFFFFF;
        padding: 10px;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        margin:10px;
		width: 90px;
        height: 40px;
		
	}
	</style>


<body>
	<h1>admin functionality goes here</h1>
	<?php
		if(!isset($_POST['submit'])){
			echo '<form method="post" action="">';
			echo '<p>product name: ';
			echo '<input type="text" name="name"/>';
			echo '</p>';
			echo '<p>price: ';
			echo '<input type="number" step="any" name="price"/>';
			echo '</p>';
			echo '<p>description: ';
			echo '<input type="text" name="description"/>';
			echo '</p>';
			echo '<p>url: ';
			echo '<input type="text" name="image"/>';
			echo '</p>';
			echo '<p><button type="submit" name="submit" value="submit">Submit</button>';
			echo '</form>';
		}
		if (isset($_POST['submit'])){
			$name=addslashes($_POST['name']);
			$description=addslashes($_POST['description']);
			$image=addslashes($_POST['image']);
			$price=$_POST['price'];
			echo '<h3> Data received:</h3>';
			echo "<p>product name: $name</p>";
			echo "<p>description: $description</p>";
			echo "<p>image url: $image</p>";
			//db connection paramterers
			$username="webuser";
			$password=".kzI[OojMi_cT_p6";
			$host="localhost";
			$db="products";
			//create new mysql connection
			$dblink=new mysqli($host, $username, $password, $db);//make the actual connection connection
			$sql="Insert into `entries` 
			(`product_name`, `product_price`, `product_description`, `product_image`) values
			('$name', '$price', '$description', '$image')";
			$dblink->query($sql) or
				die("<p>Something went wrong with: $sql<br>".$dblink->error);
			echo "<h3>Data entered into the database successfully!</h3>";
			header("Refresh:0");
		}
	?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php
					echo '<h3 align="center">Current products in the database</h3>';
					echo '<table border="1" width="100%">';
					echo '<tr>';
					echo '<th> Record #</th><th>Product name</th><th>Price</th><th>Description</th><th>Image url</th>';
					echo '</tr>';
					echo '<tbody id="results">';
					echo '</tbody>';
					echo '</table?';
				?>
			</div>
	</div>
	</body>	
	<button onclick="location.href = 'index.html';" id="myButton" class="float-left submit-button" >Home</button>
</html>
<script>
	function refresh_div(){
		$.ajax({
			type: 'post',
			url: 'https://ec2-18-220-52-116.us-east-2.compute.amazonaws.com/ui/tablequery.php',
			success: function(data){
				$('#results').html(data);
			}
			
		});
	};
	setInterval(function(){ refresh_div(); }, 2000);

</script>
