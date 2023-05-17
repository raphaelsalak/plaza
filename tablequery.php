<?php
					//where can you style it?
					$username="webuser";
					$password=".kzI[OojMi_cT_p6";
					$host="localhost";
					$db="products";
					//create new mysql connection
					$dblink=new mysqli($host, $username, $password, $db);//make the actual connection connection
					$sql="select * from `entries`";
					$results=$dblink->query($sql) or
						die("<p>Something went wrong with: $sql<br>".$dblink->error);
					while($data=$results->fetch_array(MYSQLI_ASSOC)){
						echo '<tr>';
						echo '<td>' .$data['auto_id'].'</td>';
						echo '<td>' .$data['product_name'].'</td>';
						echo '<td>' .$data['product_price'].'</td>';
						echo '<td>' .$data['product_description'].'</td>';
						echo '<td>' .$data['product_image'].'</td>';
						echo '</tr>';
					}
?>