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
//    ddz=document.getElementById("ddZip");
  //  ddc=document.getElementById("ddCode");
    sArea=document.getElementById("selectArea");
    initSelect(oElement);
//    initZipCode();
    initSelect(sArea);
    
    if(elementID=="selectCity"){
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
    
function onStateChange(oElement) {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
            showSelect(xmlHttp.responseXML);
        }
    }
}
function showSelect(xmlData) {
    if(xmlData.documentElement.hasChildNodes()){
        oElement.options[0].innerHTML="--请选择--";
    }else{
        oElement.options[0].innerHTML="暂无数据";
        sArea.options[0].innerHTML="暂无数据";
    }
    var names = xmlData.getElementsByTagName("Name");
    var ids = xmlData.getElementsByTagName("ID");
    for(var i = 0; i < names.length; i++) {
        var op=new Option(names[i].firstChild.nodeValue);       
        oElement.options.add(op);
	    op.value=ids[i].firstChild.nodeValue;
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

//function addZipCode(sid) {
//    initZipCode();
//    if(sid!=""){
//        ddz.innerHTML="数据加载中...";
//        createXMLHttpRequest();
//        var url = "getData.php?type=3&sid=" + sid;
//        xmlHttp.onreadystatechange = handleStateChange;
//        xmlHttp.open("GET", url, true);
//        xmlHttp.send(null);   
//    }
//}

function handleStateChange() {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
            showZipCode(xmlHttp.responseXML);
        }
    }
}
//
//function showZipCode(xmlData) {
//    var zip,code
//    if(xmlData.documentElement.hasChildNodes()){
//        zip = xmlData.getElementsByTagName("Zip")[0].firstChild.nodeValue;
//        code = xmlData.getElementsByTagName("Code")[0].firstChild.nodeValue;
//    }else{
//        zip = "暂无数据";
//        code = "暂无数据";
//    }
//    ddz.innerHTML = "邮编：" + zip;   
//    ddc.innerHTML = "区号：" + code; 
//}
//function initZipCode(){
//    ddz.innerHTML="";
//    ddc.innerHTML="";
//}