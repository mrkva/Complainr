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

  // execute query
  // retrieve all documents
  
  
 if ($noentry == TRUE || ($noentry == null &&  $complaint == null)) {
 	$cursor = $collection->find();
  	$cursor = $cursor->sort(array('ts' => -1))->limit($limit);  
	foreach ($cursor as $obj) {
		echo '<div style="line-height:130%;height:20px;"><span class="date">' . date('d.m.y', $obj['ts']) . '</span>';
		echo '<span class="name"> ' . $obj['first_name'] . '</span>: ';
		echo '<span class="complaint">' . $obj['complaint'] . '</span>&nbsp;&nbsp;&nbsp;';
		echo '<!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style " style="float:right; display:inline; width:600px;"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet" tw:text="What I hate about web2.0: '. $obj['complaint'] .' via #complainr "></a><a class="addthis_counter addthis_pill_style"></a></div><script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mrqwa"></script><!-- AddThis Button END --></div><br />';
	}
  } else {
 
  $person = array(
 'first_name' => $f_name,
 'ts' => $ts,
 'complaint' => $complaint
  );

	$safe_insert = true;
	$collection->insert($person, $safe_insert);
	$person_identifier = $person['_id'];
	$cursor = $collection->find();
	$cursor = $cursor->sort(array('ts' => -1))->limit($limit);
  // iterate through the result set
  // print each document 
	foreach ($cursor as $obj) {
		echo '<div style="line-height:130%;height:20px;"><span class="date">' . date('d.m.y', $obj['ts']) . '</span>';
		echo '<span class="name"> ' . $obj['first_name'] . '</span>: ';
		echo '<span class="complaint">' . $obj['complaint'] . '</span>&nbsp;&nbsp;&nbsp;';
		echo '<!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style " style="float:right; display:inline; width:600px;"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet" tw:text="What I hate about web2.0: '. $obj['complaint'] .' via #complainr "></a><a class="addthis_counter addthis_pill_style"></a></div><script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mrqwa"></script><!-- AddThis Button END --></div><br />';
	}
}

  // disconnect from server
  $conn->close();

?>

