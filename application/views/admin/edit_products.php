<script type="text/javascript">
$( document ).ready(function() {

$('[name=category] option').filter(function() 
{ 
    return ($(this).text() == '<?php echo $category ?>'); //To select Blue
}).prop('selected', true);

$('[name=sub_category] option').filter(function() 
{ 
    return ($(this).text() == '<?php echo $sub_category ?>'); //To select Blue
}).prop('selected', true);

$('[name=quantity] option').filter(function() 
{ 
    return ($(this).text() == '<?php echo $quantity ?>'); //To select Blue
}).prop('selected', true);

$('[name=popularity] option').filter(function() 
{ 
    return ($(this).text() == '<?php echo $popularity ?>'); //To select Blue
}).prop('selected', true);

 $('[name=featured]').val(<?php echo $featured ?>);//To select Blue
  $('[name=new]').val(<?php echo $new ?>);//To select Blue

});


</script>

<h1  class="text-center"> Edit Product </h1>

<form action="<?php echo base_url();?>/admin/products/edit_product" method = "POST">
<input name ="id" type="hidden" value="<?php echo $id;?>">
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>New price</th>
        <th>Old price</th>
        <th>New</th>
        <th>Featured</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Popularity</th>
      </tr>
    </thead>
    <tbody>
			<tr>
			<td><input name ="name" type="text" maxlength="20" value="<?php echo $name;?>"></td>
			<td><textarea name="description" rows="10" ><?php echo $description;?></textarea></td>
			<td><input name="new_price" type="numeric" value="<?php echo $old_price;?>" ></td>
			<td><input name="old_price" type="numeric" value="<?php echo $new_price;?>"></td>

			<td><select name="new"><option value="1">Yes</option><option value="0">No</option></select></td>
			<td><select name="featured"><option value="0">No</option><option value="1">Yes</option></select></td>

			<td><select name="quantity">
			<option value="100">100</option>
			<option value="75">75</option>
			<option value="50">50</option>
			<option value="25">25</option>
			<option value="10">10</option>
			<option value="5">5</option>
			<option value="1">1</option>
			</select></td>

			<td><select name="category">
			<option>Biryani rice</option>
			<option>Boiled rice</option>
			<option>Kerala rice (Rosekar)</option>
			<option>Organic rice</option>
			<option>Raw rice</option>
			<option>Steam rice</option>
			<option>Tiffin rice</option>
			</select></td>

			<td><select name="sub_category">
			<option>ignore</option>
			<option>Broken rice</option>
			<option>Full rice</option>
			<option>Seeraga Samba</option>
			<option>Ponni B.P.T</option>
			<option>Sona (Karnataka)</option>
			<option>White ponni</option>
			<option>P.L Raw rice (Maavu)</option>
			<option>Pongal rice (Seasonal)</option>
			<option>Sona Ponni</option>
			<option>ADT-36</option>
			<option>Idly rice</option>
			<option>Puttu rice</option>
			</select></td>
			
			<td><select name="popularity">
			<option>9</option>
			<option>8</option>
			<option>7</option>
			<option>6</option>
			<option>5</option>
			<option>4</option>
			<option>3</option>
			<option>2</option>
			<option>1</option>
			<option>0</option>
			</select></td>

			<td><a ><button class="btn-xs btn-primary" type="submit">Update</button></a></td>
			</tr>

	</tbody>
	</table></form>

