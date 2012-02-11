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

function client_area(sid, elementID, lx) {
	// 不用var声明变量，并将其最先执行，该变量就具有了全局性
	var xmlhttp=getHTTPObject();
	oElement = document.getElementById(elementID);
	sArea = document.getElementById("dis_id");
	sStreet = document.getElementById("str_id");
	initSelect(oElement);
	
	if (elementID == "city_id") {
		initSelect(sArea);
		initSelect(sStreet);
		sArea.options[0].innerHTML = "--------";
		sStreet.options[0].innerHTML = "--------";
	}

	if (elementID == "dis_id") {
		initSelect(sStreet);
		sStreet.options[0].innerHTML = "--------";
	}
	if (sid == "") {
		oElement.options[0].innerHTML = "--------";
	} else {
		createXMLHttpRequest();
		var url = "getData.php?type=" + lx + "&sid=" + sid;
		xmlHttp.onreadystatechange = function() {
			onStateChange(oElement)
		};
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	
	}
}

function initSelect(oElement) {
	while (oElement.options.length > 0) {
		oElement.remove(oElement.options.length - 1);
	}
	var op = new Option("数据加载中...");
	oElement.options.add(op);
	op.value = "";

}

function onStateChange(oElement) {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
			showSelect(xmlHttp.responseXML);
		}
	}
}

function showSelect(xmlData) {
	if (xmlData.documentElement.hasChildNodes()) {
		oElement.options[0].innerHTML = "--请选择--";
	} else {
		oElement.options[0].innerHTML = "暂无数据";
	}
	var names = xmlData.getElementsByTagName("Name");
	var ids = xmlData.getElementsByTagName("ID");
	for ( var i = 0; i < names.length; i++) {
		var op = new Option(names[i].firstChild.nodeValue);
		oElement.options.add(op);
		op.value = ids[i].firstChild.nodeValue;
	}
}

function client_count() {
	var pro_id=document.client_count_form.pro_id.value;
	var city_id=document.client_count_form.city_id.value;
	var dis_id=document.client_count_form.dis_id.value;
	var str_id=document.client_count_form.str_id.value;
	//alert(pro_id);
	
	var xmlhttp=getHTTPObject();
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("client_count_div").innerHTML=xmlhttp.responseText;
	    }
	  }
	//xmlhttp.open("GET","./m_search.php?q="+str+"&s="+str_select,true);
	//xmlhttp.send();
	xmlhttp.open("POST","./client/client_count_search.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pro_id="+pro_id+"&city_id="+city_id+"&dis_id="+dis_id);
	//xmlhttp.send("tag="+tag+"&applicant="+applicant+"&use_status="+use_status);
}

function user_login_count(days) {
	var xmlhttp=getHTTPObject();
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("login_count_div").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("POST","./client/client_count_search.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pro_id="+pro_id+"&city_id="+city_id+"&dis_id="+dis_id);
	alert(days);
	return false;
}