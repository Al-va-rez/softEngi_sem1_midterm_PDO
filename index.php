<?php require_once "core/dbconfig.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Data Objects</title>
    </head>
    <body>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM Player"); // send query to database

            if($stmt->execute()) {
                echo "<pre>";
                print_r($stmt->fetchAll()); // gets all avaiable records in the table
                echo "<pre>";
            }
        ?>

        <?php
            $stmt = $pdo->prepare("SELECT * FROM Player
                                    WHERE player_id = 5"); // send query to database

            if($stmt->execute()) {
                echo "<pre>";
                print_r($stmt->fetch()); // gets one specific record from the table
                echo "<pre>";
            }
        ?>

        <?php
            // insert a record
            $insertQuery = "INSERT INTO Inventory (inv_id, num_slots, isFull, weight) VALUES (?, ?, ?, ?)";
            $insertStmt = $pdo->prepare($insertQuery);
            $execInsert = $insertStmt->execute(21, 186, false, 264.0);

            // get the new record
            $fetchQuery = "SELECT * FROM Inventory WHERE inv_id = 21";
            $fetchStmt = $pdo->prepare($fetchQuery);
            $execFetch = $fetchStmt->execute();

            if($execInsert) { // if insert was successful
                echo "<pre>";
                print_r($execFetch->fetch()); // print new record
                echo "<pre>";
            }
        ?>

        <?php
            // delete a record
            $deleteQuery = "DELETE FROM Inventory WHERE inv_id = 21";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $execDelete = $deleteStmt->execute();

            // get all records
            $fetchQuery = "SELECT * FROM Inventory";
            $fetchStmt = $pdo->prepare($fetchQuery);
            $execFetch = $fetchStmt->execute();

            if($execDelete) { // if delete was successful
                echo "<pre>";
                print_r($execFetch->fetchALL()); // print new record
                echo "<pre>";
            }
        ?>
    </body>
</html>