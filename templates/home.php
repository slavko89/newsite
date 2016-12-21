	
		
		<ul id = 'block_animals_search'>
		<?php
			$result = mysql_query("SELECT * FROM addanimals");
			
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_assoc($result);
				
				
				do
				{
					
					$result_foto = mysql_query("SELECT * FROM `foto_animals` WHERE id_animal=".$row['id']);
					$row_foto = mysql_fetch_assoc($result_foto);
						
							echo'
								<li>
								<div class = "block_images">
							';
							do{
								echo '<p><img src="'.$row_foto["url"].'" width="150" height="150" ></p>';
							}while($row_foto = mysql_fetch_assoc($result_foto));
							
							echo'
								</div>
								<p class = "name_of_animal"><a href = "">'.$row["name"].'</a></p>
								<div class = "description">
								'.$row['description'].'
								</div>
								</li>
									
							';
						
				}while($row = mysql_fetch_assoc($result));
			}
		?>
		</ul>
				
		
				