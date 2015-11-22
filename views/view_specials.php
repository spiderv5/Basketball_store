<?php
foreach($result as $row){
				echo "<div class = 'special'>";

				echo "<form action = 'addtocart' id = ".$row->pid." method = 'POST'>";
				echo "<img class = 'pics' src=".$row->pics. " height='100' width = '100'><br>";
		 		echo "<div class = 'describe' > Shoe: <span class='name'>" . $row->pname. "</span><br>";
				echo "Start date: " . $row->startdate. "<br>";
				echo "End date: " . $row->enddate. "<br>";
				echo "<input type = 'hidden' name='pid' value=".$row->pid.">";
				echo "<input type = 'hidden' name='sale' value='sale'>";
				echo "Special price: <span class='price'>$" . $row->specpprice. "</span><br>";
				echo "Qty: <select name='".$row->pname."'><option value='1' selected>1</option>			
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												</select><br>";
				echo "<input class = 'submit' type='submit' value = 'Add to cart'>";
				echo "</form></div>";
				echo "</div>";


}
echo "</div>";
echo "<div class='second'>";
echo "<h2>Kakaxi's Shoes</h2>";



?>