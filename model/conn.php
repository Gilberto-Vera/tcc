<?php
	$conn=pg_connect("host=postgres port=5432 dbname=postgres user=postgres password=postgres") 
	or die("Cannot db,please check your connection string".pg_last_error());
?>
