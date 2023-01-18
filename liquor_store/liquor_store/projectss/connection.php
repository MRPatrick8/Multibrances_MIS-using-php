<?php
 $db = mysqli_connect("localhost","mrstnbfg_mis","Mis@tkay2022") or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'mrstnbfg_mis' ) or die(mysqli_error($db));
?>