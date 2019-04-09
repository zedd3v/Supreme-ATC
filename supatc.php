<?php
/*
Made by Admin#0001
Learn more: https://discord.gg/uJ8edAM
Execute visiting: your.url/supatc.php?product_id=xxxxxx&style_id=xxxxxx&size_id=xxxxxx
*/
//setting headers
header("Connection: keep-alive");
header("Keep-Alive: timeout=5, max=100");
//response functions
function response($status, $message) {
	$response = array();
	$response["status"] = $status;
	$response["message"] = $message;
	echo json_encode($response);
}
//declaring variables from request parameters
$product_id = (isset($_REQUEST['product_id'])) ? $_REQUEST['product_id'] : "";
$style_id = (isset($_REQUEST['style_id'])) ? $_REQUEST['style_id'] : "";
$size_id = (isset($_REQUEST['size_id'])) ? $_REQUEST['size_id'] : "";
//checking if parameters are empty
if (empty($product_id) || empty($style_id) || empty($size_id)) {
	response(0, "Please input all fields!");
	exit;
} else {
?>
<html>
	<body>
		<iframe style='display:none;' name='i' id='i'></iframe>
		<form id='form' action='https://www.supremenewyork.com/shop/<?= $product_id ?>/add.json' method='post' target='i'>
		    <input type='hidden' name='st' value='<?= $style_id ?>'>
		    <input type='hidden' name='s' value='<?= $size_id ?>'>
		    <input type='hidden' name='qty' value='1'>
		</form>
		<script>
		    document.getElementById('form').submit();
		    document.getElementById('i').onload = () => { window.location.href = `https://www.supremenewyork.com/checkout?order[terms]=1`; };
		</script>
	</body>
</html>
<?php
}
?>
