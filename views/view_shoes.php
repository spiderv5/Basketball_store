<?php

echo "<div class='category'>";
echo "<span class='categoryname'><h4>Category: ".$catname."</h4></span>";

foreach($result2 as $row){

			echo "<div class='shoes'>";
			echo "<form action = 'addtocart' id = ".$row->pid." method = 'POST'>";		
			echo "<img class = 'pics' src=".$row->pics. " height='100' width = '100'><br>";
			echo "<div class = 'describe' >Shoe: <span class='name'>" . $row->pname."</span><br>";
			echo "Category: " . $row->pcatname. "<br>";
			echo "Price: <span class='price'>$" . $row->pprice . "</span><br>";
			echo "Description: " . $row->pdesc. "<br>";
			echo "<input type = 'hidden' name='pid' value=".$row->pid.">";
			echo "<input type = 'hidden' name='sale' value='normal'>";
			echo "Qty: <select name=' ".$row->pname."'><option value='1' selected>1</option>
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
?>
