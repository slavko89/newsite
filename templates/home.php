	
		
		<ul id = 'block_animals_search'>
		<?php
			$result = mysql_query("SELECT * FROM animal");
			
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_assoc($result);
				
				
				do
				{
					
					$result_foto = mysql_query("SELECT * FROM `animal_foto` WHERE id_animal=".$row['id']);
					$row_foto = mysql_fetch_assoc($result_foto);
						
							echo'
								<li>
								<div class = "block_images">
							    <p><img src="../image/Data/upload/'.$row_foto["url"].'" width="150" height="150" ></p>
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
				
		
				