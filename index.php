<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaliczenie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "comment_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>
    <header>
        <h1>mikolaj henzel zaliczenie php</h1>
    </header>
    <main>
        <section class="formContainer">
            <form action="addComment.php" method="POST">
                <input type="text" placeholder="Nazwa użytkownika" required name="username" id="username">
                <br><br>
                <textarea name="comment" id="comment" placeholder="Komentarz" required cols="30" rows="10"></textarea>
                <br><br>
                <input type="submit" value="Dodaj komentarz">
            </form>
        </section>
        <section>
            <h2>Komentarze:</h2>
            <div class="commentsContainer">
                <?php
                    // SQL query to retrieve records
                    $sql = "SELECT * FROM comments ORDER BY submit_date DESC";
                    $result = $conn->query($sql);

                    // Check if the query was successful
                    if ($result === false) {
                        die("Error executing the query: " . $conn->error);
                    }

                    // Check if there are rows in the result set
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="comment">
                                <p class="usernameP"><?php echo htmlspecialchars($row['name']) ?></p>
                                <p class="commentP"><?php echo htmlspecialchars($row["comment"]) ?></p>
                                <p class="dateP"><?php echo htmlspecialchars($row["submit_date"]) ?></p>
                            </div>
                        <?php
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </section>
    </main>
    <footer></footer>
</body>
</html>
