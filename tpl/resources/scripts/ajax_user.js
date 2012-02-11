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
var user_email=document.user_search_form.user_search.value;
//var applicant=document.form_list.applicant.value;
//var use_status=document.form_list.use_status.value;
//alert(tag);
var xmlhttp;
if (user_email.length==0)
  { 
  document.getElementById("user_search_div").innerHTML="无数据";
//	alert(use_status);
  return;
  }
var xmlhttp=getHTTPObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("user_search_div").innerHTML=xmlhttp.responseText;
    }
  }
//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
//xmlhttp.send();
xmlhttp.open("POST","./user/user_search.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("user_email="+user_email);
//xmlhttp.send("tag="+tag+"&applicant="+applicant+"&use_status="+use_status);
}