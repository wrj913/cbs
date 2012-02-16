function delcfm() {
    if (!confirm("确认要删除？")) {
      
        return false;
    }
}

var xmlHttp;
function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}    
function addSelect(sid,elementID,lx) {
//不用var声明变量，并将其最先执行，该变量就具有了全局性
//	alert(sid);
//	alert(lx);
    oElement = document.getElementById(elementID);
    sArea=document.getElementById("selectArea");
    initSelect(oElement);

    
    if(elementID=="selectCity"){
        initSelect(sArea);
        sArea.options[0].innerHTML="--------";
    }
    
    if(sid==""){
        oElement.options[0].innerHTML="--------";
    }else{
        createXMLHttpRequest();
        var url = "getData.php?type="+lx+"&sid=" + sid;
        xmlHttp.onreadystatechange = function(){onStateChange(oElement,sArea)};
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    }
}

function initSelect(oElement) {
    while(oElement.options.length > 0) {
        oElement.remove(oElement.options.length-1);
    }
    var op=new Option("数据加载中...");        
    oElement.options.add(op);
    op.value="";
}

function onStateChange(oElement) {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
            showSelect(xmlHttp.responseXML);
        }
    }
}
function showSelect(xmlData) {
//	zip = xmlData.getElementsByTagName("Name")[0].firstChild.nodeValue;
//	alert(zip);
    if(xmlData.documentElement.hasChildNodes()){
        oElement.options[0].innerHTML="--请选择--";
    }else{
        oElement.options[0].innerHTML="暂无数据";
    }
    var names = xmlData.getElementsByTagName("Name");
    var ids = xmlData.getElementsByTagName("ID");
    for(var i = 0; i < names.length; i++) {
        var op=new Option(names[i].firstChild.nodeValue);       
        oElement.options.add(op);
	    op.value=ids[i].firstChild.nodeValue;
	   
    }
}


