<?php
$query = "SELECT * FROM users";
$result = $db->query($query);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Surname</th><th>Email</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["user_name"]."</td>";
        echo "<td>".$row["user_surname"]."</td>";
        echo "<td>".$row["user_email"]."</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}
