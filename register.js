function showHintFirst(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintF").innerHTML="";
  return;
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
    document.getElementById("txtHintF").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hint.php?f="+str,true);
xmlhttp.send();
}

function showHintLast(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintL").innerHTML="";
  return;
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
    document.getElementById("txtHintL").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hint.php?l="+str,true);
xmlhttp.send();
}

function showHintEmail(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintE").innerHTML="";
  return;
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
    document.getElementById("txtHintE").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hint.php?e="+str,true);
xmlhttp.send();
}

function showHintPassword(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintP").innerHTML="";
  return;
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
    document.getElementById("txtHintP").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hint.php?p="+str,true);
xmlhttp.send();
}

function showHintIns(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintI").innerHTML="";
  return;
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
    document.getElementById("txtHintI").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hint.php?i="+str,true);
xmlhttp.send();
}

function showHintNumber(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHintN").innerHTML="";
  return;
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
    document.getElementById("txtHintN").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hint.php?n="+str,true);
xmlhttp.send();
}