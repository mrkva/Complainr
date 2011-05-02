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
xmlhttp.open("GET","../submit.php?NOENTRY=TRUE&LIMIT=7");
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
xmlhttp.open("GET","../submit.php?F_NAME="+first_name+"&COMPLAINT="+complaint+"&TS="+date,true);
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
xmlhttp.open("GET","../submit.php?LIMIT="+amount+"&NOENTRY=TRUE",true);
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
xmlhttp.open("POST","../vote.php?ID="+realid+"&VOTING=TRUE",true);
xmlhttp.send();
}