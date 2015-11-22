   <h2>Welcome <?php echo $username; ?>!   <a href="<?php echo base_url('home/logout');?>">Logout</a></h2> 
 <?php echo validation_errors(); ?> <?php $attributes = array('class' => 'gcm', 'id' => 'myform');

echo form_open_multipart('home/SendMessage', $attributes);
echo form_label('Select app', 'select app');

$data = array(
              'name'        => 'link',
              'id'          => 'link',
             
              'style'       => 'width:50%',
            );
echo form_dropdown('app_name', $appnames); 

echo form_label('Select Country', 'select app');
echo form_dropdown('country', $countries);



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


echo form_label('Icon', 'Icon');
$data = array(
              'name'        => 'icon',
              'id'          => 'icon',
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

echo "<br/>";
echo form_submit('mysubmit', 'Submit!');
?>
 