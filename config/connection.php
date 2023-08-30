<?php
$conn =  mysqli_connect('localhost', 'Davide', '12345', 'recipes_pro');
if (!$conn) {
    echo 'Connection error' .  mysqli_connect_error();
}
?>