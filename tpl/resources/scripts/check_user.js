/**
 * 检查用户是否存在
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

function check_user(name) {
	var user_name = document.getElementById(name).value;
//		alert(client_user);
	if(user_name==""){
//		var user_tab4=document.getElementById("user_tab4");
//		user_tab4.style.display="block";
		alert(user_name);
		return false;
	}

	var xmlhttp=getHTTPObject();
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    if(xmlhttp.responseText==1){
	    //	document.getElementById("client_count_div").innerHTML=xmlhttp.responseText;
	    	return 1;
	    }else{
	    //	document.getElementById("client_count_div").innerHTML=xmlhttp.responseText;
	    	return 0;
	    }
	    }
	  }
	xmlhttp.open("POST","check_user.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("user_name="+user_name);
}