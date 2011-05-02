<?php
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->data;

  // access collection
  $collection = $db->items;

 $cursor = $collection->find();
 $cursor = $cursor->sort(array('votes' => -1))->limit(10);
  	
  	  
	foreach ($cursor as $obj) {
	    echo "<a href='#' style=\"font-size:20px;\" onClick='vote($(this).parent()[0].id);'>" . $obj['votes'] . "</a> ";
		echo '<span class="complaint"><MARQUEE width="80%">' . $obj['complaint'] . '</MARQUEE></span>&nbsp;&nbsp;&nbsp;';
		echo ' <div id="' . $obj['_id'] . '-v" style="display:inline;">';
  		echo '</div>';
		echo '<small><a href="id/' . $obj['_id'] . '">Link and Share</a></small><br />';
	}
  $conn->close();

?>

