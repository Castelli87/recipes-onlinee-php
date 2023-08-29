<?php

$userErr = $recipeErr = $ingridientsErr= $processErr = '';
$user =$recipe = $ingridients =$process = '';

if (isset($_POST['submit'])) {
    
    if (empty($_POST['username'])) {
        $userErr = "You need enter a username please";
    } else {
        $user = $_POST['username'];
        echo $user;
    }
    
    if (empty($_POST['recipeName'])) {
        $recipeErr = "You need enter a Name of the recipe please";
    } else {
        $recipe = $_POST['recipeName'];
        echo $recipe;
    }
    
    if (empty($_POST['ingridients'])) {
        $ingridientsErr = "You need enter a list of ingridients separate by comma";
    } else {
        $ingridients = $_POST['ingridients'];
        echo $ingridients;
    }
    
    if (empty($_POST['process'])) {
        $processErr = "You need enter the process to make this recipe";
    } else {
        $process = $_POST['process'];
        echo $process;
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
    <form class="" action="add.php" method="post" class=" d-flex flex-column mx-auto ">
        <div class="m-4 d-flex flex-column">
            <label>Chef Creator:</label>
            <input type='text' name="username" value="<?php echo htmlspecialchars($user)?>"> </input>
            <div class="text-danger">
                <?php echo $userErr ?>
            </div>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Recipe Name:</label>
            <input type='text' name="recipeName" value="<?php echo htmlspecialchars($recipe)?>"> </input>
            <div class="text-danger">
                <?php echo $recipeErr ?>
            </div>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Ingridients:</label>
            <input type='text' name="ingridients" value="<?php echo htmlspecialchars($ingridients) ?>"></input>
            <div class="text-danger">
                <?php echo $ingridientsErr ?>
            </div>
        </div>
        <div class="m-4 d-flex flex-column">
            <label>Process:</label>
            <textarea name="process"> <?php echo htmlspecialchars($process)?> </textarea>
            <div class="text-danger">
                <?php echo $processErr ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block  m-4 mb-4" name="submit">Send</button>
    </form>
</div>
<?php 

?>
<?php include("templates/footer.php") ?>

</html>