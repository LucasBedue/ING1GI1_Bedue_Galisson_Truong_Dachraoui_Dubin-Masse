<?php
// Connect to MySQL server
$conn = new mysqli('localhost', 'root', '');

// Check connection
if ($conn->connect_error) {
    exit('Connect failed: ' . $conn->connect_error);
}

// Check if "echoppe_de_doran" database exists, create if not
if (!$conn->query('CREATE DATABASE IF NOT EXISTS echoppe_de_doran')) {
    exit('Error creating database: ' . $conn->error);
}

// Select "echoppe_de_doran" database
$conn->select_db('echoppe_de_doran');

// Check if "item" table exists, create if not
$tableExists = $conn->query('SHOW TABLES LIKE "item"')->num_rows > 0;
if (!$tableExists) {
    $createTable = $conn->query('CREATE TABLE item (
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
        exit('Error creating table: ' . $conn->error);
    }
}

// Read data from "item" table
$result = $conn->query('SELECT * FROM item');

// Display data if table exists
if ($result && $result->num_rows > 0) {
    // Afficher les données au format HTML
    echo "<table>";
    while ($row = $result->fetch_assoc()) { 
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
    echo "La table 'item' est vide.";
}

// Close connection
$conn->close();
?>
