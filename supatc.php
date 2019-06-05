<?php
/*
Made by Admin#0001
Learn more: https://discord.gg/uJ8edAM
Execute visiting: your.url/supatc.php?product_id=xxxxxx&style_id=xxxxxx&size_id=xxxxxx
*/
//setting headers
header("Connection: keep-alive");
header("Keep-Alive: timeout=5, max=100");
//check if parameters set
(isset($_REQUEST['product_id']) && isset($_REQUEST['style_id']) && isset($_REQUEST['size_id'])) ? ($check = true) : exit("Please input all fields!");
if ($check) {
?>
<html>
	<body>
        <iframe style='display:none;' name='i' id='i'></iframe>
        <form id='form' action='https://www.supremenewyork.com/shop/<?= $_REQUEST['product_id'] ?>/add.json' method='post' target='i'>
            <input type='hidden' name='st' value='<?= $_REQUEST['style_id'] ?>'>
            <input type='hidden' name='s' value='<?= $_REQUEST['size_id'] ?>'>
            <input type='hidden' name='qty' value='1'>
        </form>
        <script>
            document.getElementById('form').submit();
            document.getElementById('i').onload = () => { window.location.href = `https://www.supremenewyork.com/checkout?order[terms]=1`; };
		</script>
	</body>
</html>
<?php
} else {
}
?>
