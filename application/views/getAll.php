<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<title>get ALl</title>
	<style>
		.box{
			width: 100%;
			max-width: 650px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
<div class="container box">
	<br/>
	<label>Category</label>
	<div class="form-group">
		<select  id="cat_id" name="cat_id" class="form-control">
			<option value="0">Select</option>
			<?php
			foreach ($cat as $cat1)
			{
				echo '<option value="'.$cat1['id'].'">'.$cat1['cat_name'].'</option>';
			}
			?>

		</select>
	</div>
	<br/>

	<label>Sub Category</label>
	<div class="form-group">
		<select id="sub_cat" name="sub_cat" class="form-control">
			<option value="">Select Sub</option>
		</select>
	</div>

	<br/>

	<label>Sub Sub Category</label>
	<div class="form-group">
		<select  id="sub_sub_cat" name="sub_sub_cat" class="form-control">

		</select>
	</div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function ()
	{
		$('#cat_id').change(function(){

			var cat_id = $('#cat_id').val();
			// + cat_id
			if(cat_id != '')
			{
				$.ajax({
					url: '<?=base_url('index.php/Categories/get_sub/') ?>' + cat_id,


					success: function( result )
					{
						$('#sub_cat').html(result);
					}
				});
			}

		});

		$('#sub_cat').change(function()
		{
			// alert("gggg");
			var sub_cat = $('#sub_cat').val();
			// + cat_id
			if(sub_cat != '')
			{
				$.ajax({
					url: '<?=base_url('index.php/Categories/get_sub_sub/') ?>' + sub_cat,
					// method : "POST",
					// data: {sub_cat : sub_cat},
					success: function( data )
					{
						$('#sub_sub_cat').html(data);
					}
				});
			}
		});

	});




</script>
</body>
</html>
