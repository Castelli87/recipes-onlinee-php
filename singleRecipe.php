<?php
include('config/connection.php');


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
            <a href="#" class="btn btn-primary ">Delete</a>
        </div>
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