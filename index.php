<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Complainr: The ultimate web2.0 complaining tool</title>
<script type="text/javascript" src="jquery-1.5.2.min.js"></script>
<script language="Javascript">
$(document).ready(function() {if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    $("txtHint").animate({ opacity: "show" }, "slow"); 
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","submit.php?NOENTRY=TRUE&LIMIT=7");
xmlhttp.send();
});


function complain()
{
var first_name, last_name, complaint;


var date = Math.round(new Date().getTime()/1000.0);
if (document.getElementById("F_NAME").value != undefined) { 
  first_name = document.getElementById("F_NAME").value;
} else {
  document.getElementById("txtHint").innerHTML = "<h1>you didn't fill out first name</h1>"
  }  
  if (document.getElementById("COMPLAINT").value != undefined) { 
  complaint = document.getElementById("COMPLAINT").value;
} else {
  document.getElementById("txtHint").innerHTML = "<h1>you didn't fill out complaint</h1>"
  }
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    $("txtHint").animate({ opacity: "show" }, "slow"); 
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","submit.php?F_NAME="+first_name+"&COMPLAINT="+complaint+"&TS="+date,true);
xmlhttp.send();
}

function limit(amount)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    { 
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","submit.php?LIMIT="+amount+"&NOENTRY=TRUE",true);
xmlhttp.send();
}

function vote(id)

{
var realid = id.substring(0, id.length-2);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    { 
    document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","vote.php?ID="+realid+"&VOTING=TRUE",true);
xmlhttp.send();
}

</script>
</head>
<body id="main_body" >
	<table border=2>

<tr><td align="left" valign="top" width=350>
<div id="form_container">
	<h1>Complainr</h1>
		<i>Ultimate web2.0 complaining and whining system.</i><br /><br />
		<!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style "><a class="addthis_button_facebook_like" fb:like:layout="button_count" addthis:url="http://complainr.syx.sk" addthis:title="Complainr" addthis:description="Web2.0 complaining platform. Share with us what you DON'T like"></a><a class="addthis_button_tweet" addthis:url="http://complainr.syx.sk" addthis:title="Complainr" addthis:description="Web2.0 complaining platform. Share with us what you DON\'T like"></a><a class="addthis_counter addthis_pill_style" addthis:url="http://complainr.syx.sk" addthis:title="Complainr" addthis:description="Web2.0 complaining platform. Share with us what you DON'T like"></a>
</div><script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mrqwa"></script><!-- AddThis Button END -->
<p>Ever felt like you cannot comprehend all this new technologies? Ever felt "too old", because you cannot keep up the pace with web2.0, node.js, ruby and cool and fresh services, frameworks and templates every week? Complain, whine and share your tears with others - CSS3 gradients-free and &lt;MARQUEE&gt; positive.
</p>

		<form id="form_155585" class="appnitro" >
					<div class="form_description">
		</div>						
		<label class="description" for="NAME">Your name: </label>
		<span>
			<input id="F_NAME" name= "F_NAME" class="element text" maxlength="255" size="8" value=""/>
		</span> 
<br />
		<label class="description" for="element_1">Complain here: </label>
		<div>
			<textarea id="COMPLAINT" name="COMPLAINT" class="element textarea medium" rows="4" cols="30"></textarea> 
		</div> 

			    
				<input id="saveForm" class="button_text" type="button" onClick="complain()" name="submit" value="Complain" maxlength="15" />
<br /><br /> </form></div>

</td></tr><tr><td align="left" valign="top" width="850px" height="300">

<h3>Latest complaints</h3>
		last <a href="#" onClick="limit(20)">20</a> <a href="#" onClick="limit(50)">50</a> <a href="#" onClick="limit(100)">100</a><br /><br />
			<span id="txtHint"></span>
</td></tr><tr><td align="left" valign="top">

<h3>Top rated complaints</h3>
<div id="top">

<?php include("top.php"); ?></div>
</td></tr> 
		<tr><td><a href="http://mrkva.ovecka.be/">Mrkva</a> (CC) 2011 ∞ <a href="&#109;&#097;&#105;&#108;&#116;&#111;&#058; &#109;&#114;&#113;&#119;&#097;&#120;&#103;&#111;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">mail me</a></td></tr>
			
		
		
	</table>
	<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(66418508); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/66418508ns.gif" /></p></noscript>
	</body>
</html>