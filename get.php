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
  echo '<script type="text/javascript" src="../script.js"></script>';
  echo '<script type="text/javascript" src="../jquery-1.5.2.min.js"></script>';
  echo '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mrqwa"></script>';
  echo 'back to <a href="http://complainr.syx.sk"><h1>Complainr</h1></a>';
  echo '<i>Ultimate web2.0 complaining and whining system.</i><br /><br />';
  
  $cursor = $collection->find(array( '_id' => $id));
  foreach ($cursor as $obj) {
		echo '<div style="line-height:130%;height:20px;" id="' . $obj['_id'] . '"><span class="date">' . date('d.m.y', $obj['ts']) . '</span>';
		echo '<span class="name"><b> ' . $obj['first_name'] . '</b></span>: ';
		echo '<span class="complaint">' . $obj['complaint'] . '</span>&nbsp;&nbsp;&nbsp;';
		echo ' <div id="' . $obj['_id'] . '-v" style="display:inline;">';
		/*if ($obj['ips'] == $ip) {
  	 		echo "<font color='red'><i>" . $obj['votes'] . " vote(s)</i></font> ";
  		} else {*/
  	 		echo "<a href='#' onClick='vote($(this).parent()[0].id);'>" . $obj['votes'] . " Vote(s)</a> ";
  		//}
  		  		echo '</div>';

		echo '<!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style " style="float:right; display:inline; width:600px;"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet" tw:text="What I hate about web2.0: '. $obj['complaint'] .' via #complainr "></a><a class="addthis_counter addthis_pill_style"></a></div><!-- AddThis Button END --></div><br />';
	}
  
  $conn->close();

?>

