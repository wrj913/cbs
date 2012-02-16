/**
 * 查询异常
 */

function getHTTPObject() {

	if(( typeof(XMLHttpRequest) == "object")|| (typeof(XMLHttpRequest) == "undefined")) {	
		XMLHttpRequest=function(){ 		
			try { return new ActiveXObject("Msxml2.XMLHTTP.6.0");}
				catch(e){}
			try { return new ActiveXObject("Msxml2.XMLHTTP.3.0");}
				catch(e){}
			try { return new ActiveXObject("Msxml2.XMLHTTP");}
				catch(e){}
			return false;
		};		
	}	
	return new XMLHttpRequest();
}

function showHint()
{
var mac=document.exception_search_form.mac.value.trim();
var client_type=document.exception_search_form.client_type.value;


//alert(selectCity);
//alert(selectArea);
//alert(selectStreet);

var xmlhttp;
if (mac.length==0 || client_type=="" )
  { 
	document.getElementById("exception_search_div").innerHTML="无数据!!!";
//	alert(use_status);
  return false;
  }
var xmlhttp=getHTTPObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("exception_search_div").innerHTML=xmlhttp.responseText;
  
    }
  }
//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
//xmlhttp.send();
xmlhttp.open("POST","./exception/exception_search.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("mac="+mac+"&client_type="+client_type);
//alert(mac);
//alert(client_type);
//xmlhttp.send("tag="+tag+"&applicant="+applicant+"&use_status="+use_status);
}

function client_exception(obj){
	var client_type = obj.value;
	
	var xmlhttp;

	var xmlhttp=getHTTPObject();
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("client_exception_div").innerHTML=xmlhttp.responseText;
	  
	    }
	  }
	//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
	//xmlhttp.send();
	xmlhttp.open("POST","./exception/exception_count.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("client_type="+client_type);

	
}