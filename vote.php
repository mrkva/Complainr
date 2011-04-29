<?php

  $vote = $_POST['VOTE'];
  $id = $_GET['ID'];
  $id = new MongoId($id);
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->data;

  // access collection
  $collection = $db->items;
  
  $cursor = $collection->find(array( '_id' => $id));
  foreach ($cursor as $obj) {
  	echo $obj['first_name'];
  	echo $obj['complaint'];
  	}
  
  $conn->close();

?>

