<?php 
// RFC4627-compliant header
header('Content-type: application/json');

// Encode data

	echo json_encode($response);

else
	echo json_encode(array('error' => true));

?>