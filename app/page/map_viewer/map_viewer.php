<?php

$result = mysqli_query($connection , "SELECT * FROM store WHERE id = '".$_SESSION["view_id"]."'");

$data = mysqli_fetch_array($result);

?>