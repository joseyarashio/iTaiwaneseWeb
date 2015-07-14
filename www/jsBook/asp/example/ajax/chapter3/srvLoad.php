<?php
	$load = rand (0, 100);
?>

<script>
	$('load_left').setAttribute('width', <?php echo $load; ?>);
	$('load_right').setAttribute('width', <?php echo 100 - $load; ?>);
</script>
<?php echo $load; ?>
