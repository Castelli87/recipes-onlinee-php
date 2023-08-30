<?php
include('config/connection.php');

// $userErr = $recipeErr = $ingridientsErr= $processErr = '';

$user = $recipe = $ingridients = $process = '';
$errors = array('user' => '', 'recipe' => '', 'ingridients' => '', 'process' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['username'])) {
        $errors['user'] = "You need enter a username please";
    } else {
        $user = $_POST['username'];
    }

    if (empty($_POST['recipeName'])) {
        $errors['recipe'] = "You need enter a Name of the recipe please";
    } else {
        $recipe = $_POST['recipeName'];
    }

    if (empty($_POST['ingridients'])) {
        $errors['ingridients'] = "You need enter a list of ingridients separate by comma";
    } else {
        $ingridients = $_POST['ingridients'];
    }

    if (empty($_POST['process'])) {
        $errors['process'] = "You need enter the process to make this recipe";
    } else {
        $process = $_POST['process'];
    }


    if (array_filter($errors)) {
        echo 'Problemssss';
    } else {

        //check if there is a malicious attack from the user 
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $recipe = mysqli_real_escape_string($conn, $_POST['recipeName']);
        $ingridients = mysqli_real_escape_string($conn, $_POST['ingridients']);
        $process = mysqli_real_escape_string($conn, $_POST['process']);

        //create an sql query
        $query = "INSERT INTO recipes(chef,name,ingridents,process) VALUES ('$user','$recipe','$ingridients','$process')";

        if (mysqli_query($conn, $query)) {
            header('Location: index.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        }
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/navbar.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<div class="container-sm">
    <form class="" action="add.php" method="POST" class=" d-flex flex-column mx-auto ">

        <div class="m-4 d-flex flex-column">
            <label>Chef Creator:</label>
            <input type='text' name="username" value="<?php echo htmlspecialchars($user) ?>"> </input>
            <div class="text-danger">
                <?php echo $errors['user'] ?>
            </div>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Recipe Name:</label>
            <input type='text' name="recipeName" value="<?php echo htmlspecialchars($recipe) ?>"> </input>
            <div class="text-danger">
                <?php echo $errors['recipe'] ?>
            </div>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Ingridients:</label>
            <input type='text' name="ingridients" value="<?php echo htmlspecialchars($ingridients) ?>"></input>
            <div class="text-danger">
                <?php echo $errors['ingridients'] ?>
            </div>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Process:</label>
            <textarea name="process"> <?php echo htmlspecialchars($process) ?> </textarea>
            <div class="text-danger">
                <?php echo $errors['process'] ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block  m-4 mb-4" name="submit">Send</button>
    </form>
</div>
<?php

?>
<?php include("templates/footer.php") ?>

</html>