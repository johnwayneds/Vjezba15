<?php
$MySQL = mysqli_connect("localhost", "root", "", "vjezba15") or die('Error connecting to MySQL server.');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = mysqli_real_escape_string($MySQL, $_POST['search']);

    $query = "SELECT * FROM users WHERE user_firstname LIKE '%$search%' OR user_lastname LIKE '%$search%'";
    $result = mysqli_query($MySQL, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<p>" . $row['user_firstname'] . " " . $row['user_lastname'] . "</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
}

mysqli_close($MySQL);
?>

<form method="POST" action="">
    <input type="text" name="search" placeholder="Pretraži korisnike..." required>
    <button type="submit">Pošalji</button>
</form>
