<?php
// create the connection 
$conn =  mysqli_connect('localhost', 'Davide', '12345', 'recipes_pro');
if (!$conn) {
    echo 'Connection error' .  mysqli_connect_error();
}
//create the query 
$query = 'SELECT id,name, chef, ingridents FROM recipes';

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

<?php include('templates/navbar.php') ?>

<section class="">
    <div class="row m-4">
        <?php foreach ($recipes as $recipe) : ?>
        <div class="col-sm-6 mb-3">
            <div class="card  h-100">
                <div class=" card-header"><?php echo htmlspecialchars($recipe['name']) ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($recipe['chef']) ?></h5>
                    <!-- <p class="card-text"><?php echo htmlspecialchars( $recipe['ingridents'] )?></p> -->
                    <ul>
                        <?php foreach (explode(',', $recipe['ingridents']) as $ing) : ; ?>
                        <li><?php echo htmlspecialchars($ing) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class='m-3 text-end'>
                    <a href="singleRecipe.php?id= <?php echo $recipe['id'] ?>" class="btn btn-primary">More Info</a>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<?php include("templates/footer.php") ?>

</html>