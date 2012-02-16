/**
 * 检查各个字段的值是否合法 
 */
//alert("sedsfd");
function check_null(obj,name){
	if(obj.value==""){
		 alert('提示: '+name+'不可为空');
		 obj.focus();
		 return false;
	}else{
		return true;
	}
}
function check_ip(obj,name){
	var   ip = /^([1-9]|[1-9]\d|1\d{2}|2[0-1]\d|22[0-3])(\.(\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])){3}$/;  
	if( !ip.test(obj.value)){
		alert('提示:'+name+'格式不正确');
		obj.focus();
		return false;
	  }else{
		return true;
	}
}
function is_num(obj,name){
	if(isNaN(obj.value)){
		  alert('提示:'+name+'必须是数字！');
		  obj.focus();
		  return false;
	}else{
		return true;
	} 
}

function check_len(obj,name,min,max){
	if(obj.value.length<min || obj.value.length>max){
		  alert('提示: 输入的'+name+'位数不正确,请检查！');
		  obj.focus();
		   return false;
	}else{
		return true;
	}
}

function check_email(obj,name){
	var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
	 if(!reyx.test(obj.value)){ 
		 alert("请输入正确格式的"+name+"!") 
		 obj.focus(); 
		 return false; 
	 }else{
			return true;
		}
}

//检查user页面
function check_user_create(){
	
	var user_email = document.user_create.user_email;
	if(!check_null(user_email,'用户邮箱')){
		return false;
	}
	
	if(!check_email(user_email,'用户邮箱')){
		return false;
	}
	
	var user_password = document.user_create.user_password;
	if(!check_null(user_password,'用户密码')){
		return false;
	}
	
	confirm_password = document.user_create.confirm_password;
	if(!check_null(confirm_password,'确认密码')){
		return false;
	}
	if(user_password.value != confirm_password.value){
		alert("两次输入的密码不相同!");
		return false;
	}
	
	var user_permission = document.user_create.user_permission;
	if(!check_null(user_permission,'用户权限')){
		return false;
	}	
}

function user_edite_password(){
	
	var user_password = document.user_edite_password.user_password;
	if(!check_null(user_password,'用户密码')){
		return false;
	}
	
	confirm_password = document.user_edite_password.confirm_password;
	if(!check_null(confirm_password,'确认密码')){
		return false;
	}
	if(user_password.value != confirm_password.value){
		alert("两次输入的密码不相同!");
		return false;
	}
}

function check_area_form(){
	
	var provinc_id = document.area_form.provinc_id;
	if(!check_null(provinc_id,'省')){
		return false;
	}
	
	var city_id = document.area_form.city_id;
	if(!check_null(city_id,'市')){
		return false;
	}
	
	var dis_id = document.area_form.dis_id;
	if(!check_null(dis_id,'县')){
		return false;
	}
	
	var street = document.area_form.street;
	if(!check_null(street,'街道')){
		return false;
	}
}

//检查ipqam页面

function check_ipqam_cteate(){
	
	var ipqam_ip = document.ipqam_cteate.ipqam_ip;
	if(!check_null(ipqam_ip,'IPQAM_IP')){
		return false;
	}
	if(!check_ip(ipqam_ip,'IPQAM_IP')){
		return false;
	}
	
	var ipqam_port = document.ipqam_cteate.ipqam_port;
	if(!check_null(ipqam_port,'端口号')){
		return false;
	}
	if(!is_num(ipqam_port,'端口号')){
		return false;
	}
	
	var province_id = document.ipqam_cteate.province_id;
	if(!check_null(province_id,'省')){
		return false;
	}
	
	var city_id = document.ipqam_cteate.city_id;
	if(!check_null(city_id,'市')){
		return false;
	}
	
	var dis_id = document.ipqam_cteate.dis_id;
	if(!check_null(dis_id,'县')){
		return false;
	}
	
	var str_id = document.ipqam_cteate.str_id;
	if(!check_null(str_id,'街道')){
		return false;
	}
}

//检查deliver页面

function check_deliver_cteate(){
	
	var deliver_ip = document.deliver_cteate.deliver_ip;
	if(!check_null(deliver_ip,'服务器 IP')){
		return false;
	}
	if(!check_ip(deliver_ip,'服务器 IP')){
		return false;
	}
	
	var vpn_port = document.deliver_cteate.vpn_port;
	if(!check_null(vpn_port,'端口号')){
		return false;
	}
	if(!is_num(vpn_port,'端口号')){
		return false;
	}
	
	var province_id = document.deliver_cteate.province_id;
	if(!check_null(province_id,'省')){
		return false;
	}
	
	var city_id = document.deliver_cteate.city_id;
	if(!check_null(city_id,'市')){
		return false;
	}
	
	var dis_id = document.deliver_cteate.dis_id;
	if(!check_null(dis_id,'县')){
		return false;
	}
	
	var str_id = document.deliver_cteate.str_id;
	if(!check_null(str_id,'街道')){
		return false;
	}
	if(str_id.value == 0 ){
		alert("街道不可为空！");
		return false;
	}
}