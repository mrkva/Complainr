<?php

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
  	$newData = array('$inc' => array('votes' => 1));
	$collection->update(array( '_id' => $id), $newData);
  	}
  foreach ($cursor as $obj) {
  	echo "<font color='red'><i>" . $obj['votes'] . " vote(s)</i></font>";
  	}
  
  // disconnect from server
  $conn->close();

?>

