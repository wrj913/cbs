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
var user_name=document.client_search_form.user_name.value;
var pro_id=document.client_search_form.selectProvince.value;
var city_id=document.client_search_form.selectCity.value;
var dis_id=document.client_search_form.selectArea.value;
var str_id=document.client_search_form.selectStreet.value;
//alert(user_name);
//alert(pro_name);
//alert(selectCity);
//alert(selectArea);
//alert(selectStreet);

var xmlhttp;
//if (search_ipqam_ip.length==0)
//  { 
// // document.getElementById("client_search_div").innerHTML="无数据";
////	alert(use_status);
//  return;
//  }
var xmlhttp=getHTTPObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("client_search_div").innerHTML=xmlhttp.responseText;
    }
  }
//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
//xmlhttp.send();
xmlhttp.open("POST","./client/client_search.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("user_name="+user_name+"&pro_id="+pro_id+"&city_id="+city_id+"&dis_id="+dis_id);
//xmlhttp.send("tag="+tag+"&applicant="+applicant+"&use_status="+use_status);
}