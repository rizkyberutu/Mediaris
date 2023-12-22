<?php
	include '../includes/config.php';
	$customer_id = $_REQUEST['customer_id'];
	$query = "UPDATE rentals SET status = 'Approved' WHERE customer_id = '$customer_id'";
	$result = $config->query($query);
	if($result === TRUE){
		echo 'Request has Successfully been Approved';
	?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
	<?php
	}
?>