<?php

require('connect.php');


$db = $conn->select_db("comfort_furniture");

if (!$db) {
	/* echo 'Nope'; <-- for error checking */
} else {
	/* echo 'Yup';  <-- for error checking */
}


$thing = "CREATE TABLE user_menu (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
home VARCHAR(30),
living_room VARCHAR(30),
kitchen VARCHAR(30),
bedroom VARCHAR(30),
bathroom VARCHAR(30),
dining_room VARCHAR(30),
outdoor VARCHAR(30)
)";


if ($conn->query($thing) === True) {
	
	/* die('Table Bad'); <-- Error Checking */
	
} else {

	
$question = $conn->query
("SELECT bedroom FROM user_menu;"); 
	
$array = array();

while ($result = $question->fetch_assoc()) {
	
	$array[] = $result['bedroom'];
	
	}
	
/* print_r($array);  <-- Print array for checking */


$count = count($array);
	
for ($x = 0; $x <= $count -1; $x++) {

	echo '<a class="dropdown-item" href="'
	.str_replace(' ', '', strtolower($array[$x]))
	.'">'.$array[$x].'</a>';
	
	} 
}

$conn->close();

?>