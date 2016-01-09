<h2>Welcome <?php echo $username; ?>!   <a href="<?php echo base_url('home/logout');?>">Logout</a></h2>

<div class="grid_8"> 
<div id="success-message"></div> <?php $attributes = array('class' => 'gcm', 'id' => 'myform');

echo form_open_multipart('home/SendMessage', $attributes);
echo form_label('Select app', 'select app');

$data = array(
              'name'        => 'link',
              'id'          => 'link',
             
              
            );
array_unshift($appnames, "All Apps");
echo form_dropdown('app_name', $appnames); 

echo form_label('Select Country', 'select app');

array_unshift($countries, "All Countires");
echo form_dropdown('country', $countries);



echo form_label('App Name', 'app name');
$data = array(
              'name'        => 'new_app_name',
              'id'          => 'new_app_name',
                );

echo form_input($data);


echo form_label('Title', 'Title');
$data = array(
              'name'        => 'title',
              'id'          => 'title',
              
              
            );

echo form_input($data);



echo form_label('Link', 'Link');
$data = array(
              'name'        => 'link',
              'id'          => 'link',
              
            );

echo form_input($data);


echo form_label('Banner', 'Banner');
$data = array(
              'name'        => 'banner',
              'id'          => 'banner',
            );

echo form_input($data);


echo form_label('Icon', 'Icon');
$data = array(
              'name'        => 'icon',
              'id'          => 'icon',
            );

echo form_input($data);

echo "<br/>";
echo form_submit(array('name'=>'mysubmit', 'value'=> 'Submit!','class'=>'myButton','style'=>'margin-top:5px;'));


?>
</div>
<div class="grid_8"> 
<div id="success-delete-message"></div> 
<div class="box">
<h2>Stats</h2>
<table >
<thead>
<tr><th></th><th>S.no</th><th>App Name</th><th>Users</th></tr>
<thead>
<tbody>
<?php $total=0; $i=1; foreach($stats as $state) {
$total += $state['totalusers'];
?>
<tr id="delete_<?=$state['app_name']?>">
<td style="width:15%"><input type="checkbox" style="width:40%" class="inbox_check" value="<?php echo $state['app_name']?>" name="app_ids[]" id="app_id"></td>
<td style="width:5%"><?=$i?></td>
<td ><?=$state['app_name']?></td>
<td><?=$state['totalusers']?></td></tr>
<?php $i++; } ?>

<tr><td colspan='2'> <a id="delete" class="myButton">Delete</td><td > <b>Total</b></td><td> <?=$total?></td></tr>
</tbody>
</table>
</div>
</div>
<script type="text/javascript">
$('form#myform').submit(function(e) {

    var form = $(this);

    e.preventDefault();
	$('#success-message').html('<img src="<?php echo base_url("image/loader.gif") ?>" >');
    $.ajax({

        type: "POST",
        url: "<?php echo site_url('home/SendMessage'); ?>",
        data: form.serialize(), // <--- THIS IS THE CHANGE
        dataType: "html",
        success: function(data){
            $('#success-message').html(data);
			
        },
        error: function() { $('#success-message').html("Error posting feed."); }
   });

});

$('#delete').click(function() {
if (window.confirm("Are you sure?")) {

		var checked = $('.inbox_check:checked');
		var ids = checked.map(function() {
			return this.value;  // why not store the message id in the value?
		}).get().join(",");
		
		if (ids) {
			
			$('#success-delete-message').html('<img src="<?php echo base_url("image/loader.gif") ?>" >');
		$.ajax({

			type: "POST",
			url: "<?php echo site_url('home/DeleteApp'); ?>",
			data: {"ids": ids}, // <--- THIS IS THE CHANGE
			dataType: "html",
			success: function(data){
				$('#success-delete-message').html(data);
				ids = ids.split(',');
				$.each(ids, function( index, value ) {
				 // alert( index + ": " + value );
				  $('#delete_'+value).hide();
				});
				
				
			},
			error: function() { $('#success-delete-message').html("<div class='error'>Problem in deleteing.</div>"); }
	   });
			
		}
		else {
			$('#success-delete-message').html("<div class='error'>Please Select At Least Record.</div>");
		}
	}
});
</script>