<?php
$title = "Lägg till";
include("includes/header.php");
?>

<h2>Lägg till</h2>

<?php
//Default-värden på formulärvariabler
$name = "";
$message = "";

//Läs in formulär
if (isset($_POST["name"])) {
    $name = $_POST['name'];
    $priority = $_POST['priority'];
    $message = $_POST['message'];

    $bucketlist = new Bucketlist();

    //Skapa array för error-meddelanden
    $errors = [];

    if(!$bucketlist->setName($name)) {
        array_push($errors, "Du måste fylla i namnfältet");
    }
    if(!$bucketlist->setDescription($message)) {
        array_push($errors, "Du måste fylla i beskrivning!");
    }

    //Anropa metod för att lagra kurs
    if ($bucketlist->addItem($name, $message, $priority)) {
        echo "<p class'message'>'$name' är lagrad i din bucketlist!</p>";
        //Default-värden på formulärvariabler
        $name = "";
        $message = "";
    } else {
        echo "<p class='error'>Något gick fel...";
    }
}

?>

<form method="post" action="addToBucketlist.php">
    <?php
        if(isset($errors)) {
            ?>
                <ul class="error">
                    <?php
                        foreach($errors as $e) {
                            echo "<li class='errors'>" . $e . "</li>";
                        }
                    ?>
                </ul>
            <?php
        }
    ?>
    <label for="name">Namn:</label>
    <input type="text" id="name" name="name" value="<?= $name; ?>">
    <br>
    <label for="priority">Prioritet:</label>
    <select name="priority" id="priority">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <br>
    <label for="message">Beskrivning:</label>
    <textarea name="message"><?= $message; ?></textarea>
    <br>
    <input type="submit" value="Lägg till" class="add-btn" id="message">
</form>




<?php include("includes/footer.php"); ?>