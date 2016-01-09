<h2>Welcome <?php echo $username; ?>!   <a href="<?php echo base_url('home/logout');?>">Logout</a></h2> 
<div id="success-message"></div> <?php $attributes = array('class' => 'gcm', 'id' => 'myform');

echo form_open_multipart('home/SendMessage', $attributes);
echo form_label('Select app', 'select app');

$data = array(
              'name'        => 'link',
              'id'          => 'link',
             
              'style'       => 'width:50%',
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
              'style'       => 'width:50%',
            );

echo form_input($data);


echo form_label('Title', 'Title');
$data = array(
              'name'        => 'title',
              'id'          => 'title',
              
              
              'style'       => 'width:50%',
            );

echo form_input($data);



echo form_label('Link', 'Link');
$data = array(
              'name'        => 'link',
              'id'          => 'link',
              
              'style'       => 'width:50%',
            );

echo form_input($data);


echo form_label('Banner', 'Banner');
$data = array(
              'name'        => 'banner',
              'id'          => 'banner',
              'style'       => 'width:50%',
            );

echo form_input($data);


echo form_label('Icon', 'Icon');
$data = array(
              'name'        => 'icon',
              'id'          => 'icon',
              'style'       => 'width:50%',
            );

echo form_input($data);

echo "<br/>";
echo form_submit('mysubmit', 'Submit!');


?>

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
</script>