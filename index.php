<?php

$hostname = "sql.njit.edu";
$username = "hb247";
$password = "6KE8uwH7I";
try {
	    $conn = new PDO("mysql:host=$hostname;dbname=hb247",
	    $username, $password);
	    echo "Connected successfully!<br><br>";
	    $sql = "select id,email,fname,lname,phone,birthday,gender,password from accounts where id < 6";
	    $q = $conn->prepare($sql);
	    $q->execute();
	    $results = $q->fetchAll();

	    if($q->rowCount()){

	    	echo "<table border=\"1\"><tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";
	    	foreach ($results as $row) {
        		echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["password"]."</td></tr>";
    		}
	    }else{
	    	echo '0 results';
	    } 

    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
$conn = null;

?>