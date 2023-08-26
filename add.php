<?php
 $submit = isset($_POST['submit']);
 $user= $_POST['username'];
 $name= $_POST['recipeName'];
 $ingridients= $_POST['ingridients'];
 $process= $_POST['process'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/navbar.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<div class="container-sm">
    <form class="" action="add.php" method="post" class=" d-flex flex-column mx-auto ">
        <div class="m-4 d-flex flex-column">
            <label>Chef Creator:</label>
            <input type='text' name="username"></input>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Recipe Name:</label>
            <input type='text' name="recipeName"></input>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Ingridients:</label>
            <input type='text' name="ingridients"></input>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Process:</label>
            <textarea name="process"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block  m-4 mb-4" name="submit">Send</button>
    </form>
</div>
<?php 

echo $submit;
echo $user;
echo $name;
echo $ingridients;
echo $process;
?>
<?php include("templates/footer.php") ?>

</html>