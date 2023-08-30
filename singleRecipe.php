<?php
include('config/connection.php');

// if we have clicked the button the superGlobal post come true and activate the if stament

if (isset($_POST['delete'])) {

    // we store the info coming from the page and sanitaze with the function real_escape_string 
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    //create the query and use the id to delete 
    $query = "DELETE FROM recipes WHERE id = $id_to_delete";

    // re-direct to the listing page 
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo 'query error' . mysqli_error($conn);
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$query = "SELECT * FROM recipes WHERE id = $id";

$result = mysqli_query($conn, $query);

$recipe = mysqli_fetch_assoc($result);



?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/navbar.php') ?>

<section class="container-sm m-5 mx-auto">
    <div class=" card text-center ">
        <div class="card-header">
            <h3><?php echo $recipe['name'] ?></h3>
        </div>
        <div class="card-body ">
            <h4 class="card-text mb-4"><strong>Created by:</strong> <?php echo $recipe['chef'] ?> </h4>
            <p class="card-text ">
                <strong>Ingredients:</strong> <?php echo $recipe['ingridents'] ?>
            </p>
            <p class="card-text mb-4 ">
                <strong>Process:</strong><?php echo $recipe['process'] ?>
            </p>
        </div>

        <!-- form that serves to delete the recipe by id  -->

        <form action="singleRecipe.php" method="POST">
            <!-- is created an hidden input to take the info about the id from the _POST at the name of id_to_delete  -->
            <input type="hidden" name="id_to_delete" value="<?php echo $recipe['id'] ?>">
            <!-- use this'button 'to submit the form at the name of _POST['delete'] displaying Delete into the button  -->
            <input type="submit" name="delete" value="Delete" class="btn btn-primary  mb-2">
        </form>

        <div class="card-footer text-body-secondary">
            <?php echo $recipe['created_at'] ?>
        </div>
    </div>
</section>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

<?php include("templates/footer.php") ?>

</html>