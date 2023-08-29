<?php
// create the connection 
$conn =  mysqli_connect('localhost','Davide','12345','recipes_pro');
if(!$conn){
    echo 'Connection error' .  mysqli_connect_error();
}
//create the query 
$query= 'SELECT name, chef, ingridents FROM recipes';

// use the query created at that connection 
$result = mysqli_query($conn, $query);

//fecth all in at once and create an associate array 
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

//clean the data 
mysqli_free_result($result);

//close the connection 
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<h1 class=" text-center p-3 m-3">Hello World this is a Recipes online book</h1>

<?php include('templates/navbar.php')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<?php include("templates/footer.php")?>

</html>