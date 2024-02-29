<?php
// getSearchSuggestions.php

// Connect to your database
include "connect.php";

// Get the keyword from the request
$keyword = $_GET["keyword"];

// Fetch suggestions from the database or any other source
$sql = "SELECT * FROM thuoc WHERE TenThuoc LIKE '%$keyword%'";
$result = $conn->query($sql);
// Close the database connection
$conn->close();
?>