<?php

  $f_name = $_GET['F_NAME'];
  $complaint = $_GET['COMPLAINT'];
  $ts = $_GET['TS'];
  $limit = $_GET['LIMIT'];
  $noentry = $_GET['NOENTRY'];

  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->data;

  // access collection
  $collection = $db->items;

  echo '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mrqwa"></script>';
 if ($noentry == TRUE || ($noentry == null &&  $complaint == null)) {
 	$cursor = $collection->find();
  	$cursor = $cursor->sort(array('ts' => -1))->limit($limit);  
	foreach ($cursor as $obj) {
		echo '<div style="line-height:130%;height:20px;" id="' . $obj['_id'] . '"><span class="date">' . date('d.m.y', $obj['ts']) . '</span>';
		echo '<span class="name"><b> ' . $obj['first_name'] . '</b></span>: ';
		echo '<span class="complaint">' . $obj['complaint'] . '</span>&nbsp;&nbsp;&nbsp;';
		if ($obj['votes'] > 0) {
			echo ' <div id="' . $obj['_id'] . '-v" style="display:inline;"><font color=red><i>' . $obj['votes'] . ' vote(s)</i></font> ';
			} else {
		echo ' <div id="' . $obj['_id'] . '-v" style="display:inline;"><a href="#" onClick="vote($(this).parent()[0].id);">Vote</a></div> ';
		}
		echo '<a href="id/' . $obj['_id'] . '">Link and Share</a><br />';
	}
  } else {
 
  $person = array(
 'first_name' => $f_name,
 'ts' => $ts,
 'complaint' => $complaint,
 'votes' => 0
  );

	$safe_insert = true;
	$collection->insert($person, $safe_insert);
	$person_identifier = $person['_id'];
	$cursor = $collection->find();
	$cursor = $cursor->sort(array('ts' => -1))->limit($limit);
  // iterate through the result set
  // print each document 
	foreach ($cursor as $obj) {
		echo '<div style="line-height:130%;height:20px;" id="' . $obj['_id'] . '"><span class="date">' . date('d.m.y', $obj['ts']) . '</span>';
		echo '<span class="name"><b> ' . $obj['first_name'] . '</b></span>: ';
		echo '<span class="complaint">' . $obj['complaint'] . '</span>&nbsp;&nbsp;&nbsp;';
		if ($obj['votes'] > 0) {
			echo ' <div id="' . $obj['_id'] . '-v" style="display:inline;"><font color=red><i>' . $obj['votes'] . ' vote(s)</i></font> ';
			} else {
		echo ' <div id="' . $obj['_id'] . '-v" style="display:inline;"><a href="#" onClick="vote($(this).parent()[0].id);">Vote</a></div> ';
		}
		echo '<a href="id/' . $obj['_id'] . '">Link and Share</a><br />';
	}
  }
  // disconnect from server
  $conn->close();

?>

