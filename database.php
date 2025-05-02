<?php
$host = "dpg-d0afdik9c44c73bra4g0-a.oregon-postgres.render.com";
$port = "5432";
$dbname = "registration_db_qa10";
$user = "registration_db_qa10_user";
$password = "0qDshkQ1T04MJIAhytEeAI5lK7ogEC9r";

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";


$conn = pg_connect($conn_string);

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// SQL to create the viewers table (only run once, ideally)
$sql = "CREATE TABLE IF NOT EXISTS viewers (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

// Execute the SQL query to create the table (if not already created)
$result = pg_query($conn, $sql);

/* if ($result) {
    echo "Table 'viewers' created successfully!";
} else {
    echo "Error creating table: " . pg_last_error($conn);
} */

// Do not close the connection here. Let reg.php handle it.
?>
