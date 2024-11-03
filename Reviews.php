<?php
$servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$dbname = "rospl";


// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch reviews
$result = $conn->query("SELECT name, review, created_at FROM reviews ORDER BY created_at DESC");
?>
<ul id="review-list">
    <?php while ($row = $result->fetch_assoc()): ?>
        <li>
            <strong><?php echo htmlspecialchars($row['name']); ?></strong>
            <p><?php echo htmlspecialchars($row['review']); ?></p>
            <small><?php echo $row['created_at']; ?></small>
        </li>
    <?php endwhile; ?>
</ul>


<?php
$conn->close();
?>
