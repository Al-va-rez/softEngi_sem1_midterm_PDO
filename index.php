<?php require_once "core/dbConfig.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Data Objects</title>
    </head>
    <body>
        <!-- GET ALL RECORDS -->
        <?php
            $stmt = $pdo->prepare("SELECT * FROM Player"); // send query to database

            if($stmt->execute()) {
                echo "<pre>";
                print_r($stmt->fetchAll()); // gets all avaiable records in the table
                echo "<pre>";
            }
        ?>

        <!-- GET ONE RECORD -->
        <?php
            $stmt = $pdo->prepare("SELECT * FROM Player WHERE player_id = 5"); // send query to database

            if($stmt->execute()) {
                echo "<pre>";
                print_r($stmt->fetch()); // gets one specific record from the table
                echo "<pre>";
            }
        ?>

        <!-- INSERT A NEW RECORD -->
        <?php
            $insertQuery = "INSERT INTO Inventory (inv_id, num_slots, isFull, weight) VALUES (?, ?, ?, ?)";
            $insertStmt = $pdo->prepare($insertQuery);
            $execInsert = $insertStmt->execute([21, 186, false, 264.0]);

            if($execInsert) { // if insert was successful
                echo 'Insert successfull';
            } else {
                echo 'AAAAAAAA';
            }
            ?>

            <!-- get the newly inserted record -->
            <?php
                $fetchQuery = "SELECT * FROM Inventory WHERE inv_id = 21";
                $fetchStmt = $pdo->prepare($fetchQuery);

                if($fetchStmt->execute()) {
                    echo "<pre>";
                    print_r($fetchStmt->fetch()); // print new record
                    echo "<pre>";
                } else {
                    echo 'AAAAAAAA';
                }
        ?>

        <!-- DELETE AN EXISTING RECORD -->
        <?php
            $deleteQuery = "DELETE FROM Inventory WHERE inv_id = 21";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $execDelete = $deleteStmt->execute();

            if($execDelete) { // if delete was successful
                echo 'Delete successfull';
            } else {
                echo 'AAAAAAAA';
            }
            ?>

            <!-- check if record was really deleted -->
            <?php
                $fetchQuery = "SELECT * FROM Inventory";
                $fetchStmt = $pdo->prepare($fetchQuery);

                if($fetchStmt->execute()) {
                    echo "<pre>";
                    print_r($fetchStmt->fetchAll());
                    echo "<pre>";
                } else {
                    echo 'AAAAAAAA';
                }
        ?>

        <!-- UPDATE AN ORIGINAL RECORD -->
	    <?php
            $updateQuery = "UPDATE Player SET username = ? WHERE player_id = 17";
            $updateStmt = $pdo->prepare($updateQuery);
            $execUpdate = $updateStmt->execute(['Blue Dawn']);

            if($execUpdate) { // if insert was successful
                echo 'Update successfull';
            } else {
                echo 'AAAAAAAA';
            }
            ?>

            <?php
                // get the updated record
                $fetchQuery = "SELECT * FROM Player WHERE player_id = 17";
                $fetchStmt = $pdo->prepare($fetchQuery);

                if($fetchStmt->execute()) {
                    echo "<pre>";
                    print_r($fetchStmt->fetch()); // print updated record
                    echo "<pre>";
                } else {
                    echo 'AAAAAAAA';
                }
        ?>

        <!-- TABULATE QUERY RESULTS -->
	    <?php
            // get records (all players with less than 5 hours of average playtime every week)
            $fetchQuery = "SELECT
                                player_id,
                                username,
                                total_playtime,
                                weekly_playtime
                            FROM
                                Player
                            WHERE
                                weekly_playtime <= 5.00
                            GROUP BY
                                player_id;";

            $fetchStmt = $pdo->prepare($fetchQuery);

            if($fetchStmt->execute()) {
                // store records on a local variable
                $player_info = $fetchStmt->fetchAll();
            } else {
                echo 'AAAAAAAA';
            } ?>
            <table>
                <tr>
                    <th>player_id</th>
                    <th>username</th>
                    <th>total_playtime</th>
                    <th>weekly_playtime</th>
                </tr>
                <?php foreach ($player_info as $row) { ?> <!-- Print in a table each record found -->
                    <tr>
                        <td><?= $row['player_id'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['total_playtime'] ?></td>
                        <td><?= $row['weekly_playtime'] ?></td>
                    </tr>
                <?php } ?>
            </table><?php
        ?>
    </body>
</html>