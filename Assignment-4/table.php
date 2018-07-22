<?php
    $servername = "localhost";
    $username = "id6403831_username";
    $password = "dbpass";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=id6403831_dbtest", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $sql="CREATE TABLE book(
        ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        book_name VARCHAR(30) NOT NULL,
        AVAILABLE INT NOT NULL
        )";
        $conn->exec($sql);
        echo "Table Created";
        }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
?>