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

function showDeliver()
{
var search_deliver_ip=document.deliver_search_form.search_deliver_ip.value;
var pro_id=document.deliver_search_form.selectProvince.value;
var city_id=document.deliver_search_form.selectCity.value;
var dis_id=document.deliver_search_form.selectArea.value;
var str_id=document.deliver_search_form.selectStreet.value;
//alert(search_ipqam_ip);
//alert(pro_name);
//alert(selectCity);
//alert(selectArea);
//alert(selectStreet);

var xmlhttp;
//if (search_ipqam_ip.length==0)
//  { 
// // document.getElementById("ipqam_search_div").innerHTML="无数据";
////	alert(use_status);
//  return;
//  }
var xmlhttp=getHTTPObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("deliver_search_div").innerHTML=xmlhttp.responseText;
    }
  }
//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
//xmlhttp.send();
xmlhttp.open("POST","./deliver/deliver_search.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("search_deliver_ip="+search_deliver_ip+"&pro_id="+pro_id+"&city_id="+city_id+"&dis_id="+dis_id+"&str_id="+str_id);
//alert(search_ipqam_ip);
//xmlhttp.send("tag="+tag+"&applicant="+applicant+"&use_status="+use_status);
}

function deliver_edit_tab(deliver_id)
{
var xmlhttp=getHTTPObject();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("edit_tab2_bottom").innerHTML=xmlhttp.responseText;
    }
  }
//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
//xmlhttp.send();
xmlhttp.open("POST","./deliver/deliver_edit.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("deliver_id="+deliver_id);
//xmlhttp.send("tag="+tag+"&applicant="+applicant+"&use_status="+use_status);
}