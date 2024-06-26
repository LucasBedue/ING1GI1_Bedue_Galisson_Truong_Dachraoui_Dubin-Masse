<?php
// Connect to MySQL server
$conn = new mysqli('localhost', 'root', '');

// Check connection
if (mysqli_connect_errno()) {
    exit('Connect failed: ' . mysqli_connect_error());
}

// Check if "echoppe_de_doran" database exists, create if not
if (!mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS echoppe_de_doran')) {
    exit('Error creating database: ' . mysqli_error($conn));
}

// Select "echoppe_de_doran" database
mysqli_select_db($conn, 'echoppe_de_doran');

// Check if "item" table exists, create if not
$sql = "DESCRIBE item";
$result = $conn->query($sql);
if (!$result) {
    $createTable = mysqli_query($conn, 'CREATE TABLE item (
      nom varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
      prix int NOT NULL,
      stock int NOT NULL,
      categorie varchar(50) NOT NULL,
      stats_pv int NOT NULL,
      stats_ad int NOT NULL,
      stats_ap int NOT NULL,
      image varchar(50) NOT NULL,
      PRIMARY KEY (nom)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci');
    if (!$createTable) {
        exit('Error creating table: ' . mysqli_error($conn));
    }
}

// Read data from "item" table
$select = mysqli_query($conn, 'SELECT * FROM item');
if ($select) {
    // Afficher les données au format HTML
    echo "<table>";
    while ($row = $select->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>Nom : " . $row["nom"] . "</td>";
        echo "<td>Prix : " . $row["prix"] . "</td>";
        echo "<td>Stock : " . $row["stock"] . "</td>";
        echo "<td>Catégorie : " . $row["categorie"] . "</td>";
        echo "<td>Stats PV : " . $row["stats_pv"] . "</td>";
        echo "<td>Stats AD : " . $row["stats_ad"] . "</td>";
        echo "<td>Stats AP : " . $row["stats_ap"] . "</td>";
        echo "<td><img src='" . $row["image"] . "' alt='" . $row["nom"] . "'></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    exit('Error reading data: ' . mysqli_error($conn));
}

// Close connection
mysqli_close($conn);
?>
