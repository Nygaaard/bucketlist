<?php
$title = "Bucketlist";

//Inkludera header
include("includes/header.php");
?>

<h2>Bucketlist</h2>

<div class="bucket-div">
    <?php

    //Skapa instans av Bucketlist
    $bucketlist = new Bucketlist();

    //Delete from bucketlist
    if (isset($_GET["deleteid"])) {
        $deleteid = intval($_GET['deleteid']);

        if ($bucketlist->deleteItem($deleteid)) {
            echo "<p>Raderad!</p>";
        } else {
            echo "<p class='error'>Något gick fel vid radering...</p>";
        }
    }

    //Hämta bucketlist
    $buckets = $bucketlist->getBucketlist();
    if (empty($buckets)) {
        echo "<p> Bucketlistan är tom...</p>";
        echo "<p>Gå till 'Lägg till nytt' för att lägga till något";
    } else {
        //Loopa igenom items i bucketlist
        foreach ($buckets as $b) {
            ?>
            <div class="bucket-item">
                <div class="bucket-details">
                    <div class="bucket-name">
                        <h3>Namn</h3>
                        <p><?= $b['name']; ?></p>
                    </div>
                    <div class="bucket-priority">
                        <h3>Prioritet</h3>
                        <p><?= $b['priority']; ?></p>
                    </div>
                </div>
                <div class="bucket-description">
                    <h3>Beskrivning</h3>
                    <p><?= $b['description']; ?></p>
                </div>
                <form method="get" action="bucketlist.php">
                    <input type="hidden" name="deleteid" value="<?= $b['id']; ?>">
                    <input type="submit" value="Radera" class="delete-btn">
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>



<?php include("includes/footer.php"); //Inkludera footer ?>