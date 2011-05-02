<?php
  include("config.php");
  $ip=$_SERVER['REMOTE_ADDR']; 
  $id = $_GET['ID'];
  $voting = $_GET['VOTING'];
  $id = new MongoId($id);
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->data;

  // access collection
  $collection = $db->items;

  $cursor = $collection->find(array( '_id' => $id));
  
  if ($voting == "TRUE") {
	foreach ($cursor as $obj) { 
		/*if ($cursor2) {
		 break;
		} else {*/
			//$ipData = array('$addToSet' => array('ips' => $ip), '$inc' => array('votes' => 1));
			$ipData = array('$inc' => array('votes' => 1));
			$collection->update(array( '_id' => $id), $ipData);
		//}
  	}
  	
	foreach ($cursor as $obj) {
		echo "<font color='red'><i>" . $obj['votes'] . " vote(s)</i></font>";
  	}
  } else {
  	foreach ($cursor as $obj) { 
  		if ($obj['ip'] == $ip) {
  	 		echo "<font color='red'><i>" . $obj['votes'] . " vote(s)</i></font>";
  		} else {
  	 		echo "<a href='#' onClick='vote($(this).parent()[0].id);'>" . $obj['votes'] . " Vote(s)</a>";
  		}
  	}
  }
  // disconnect from server
  $conn->close();

?>

