<?php
require "../config/smarty.inc.php";
require "../config/db.class.php";
require_once ("../config/pChart/pData.class.php");
require_once ("../config/pChart/pChart.class.php");

//测试
//$db = new DB () ;
//	$sql = "SELECT COUNT(mac) as login_count
//				FROM clients where 
//				(updated_at
//				BETWEEN '2011-06-15'
//				AND '2011-06-25 '
//				)";
//	print_r($sql);	
//	$data = $db -> select($sql);
//print_r($data);	

//$client_user=2;
//$login_day=2;

$client_user=$_POST['client_user'];
$login_day=$_POST['login_day'];


if ($login_day == 1) {
		$day_begin = time () - ( 60 * 60 * 24);
		$day_end = time ();
}elseif ($login_day == 2){
	$day_begin = time () - (7 * 60 * 60 * 24);
	$day_end = time ();
}elseif ($login_day == 3){
	$day_begin = time () - (30 * 60 * 60 * 24);
	$day_end = time ();
}

$count = array ();
$params = array ();
$d = 1;
$db = new DB () ;
while ( $day_begin <= $day_end ) {

	$day = date ( "Y-m-d ", $day_begin );
	$day_next = date ( "Y-m-d", ($day_begin + (24 * 60 * 60)) );
	$sql = "SELECT COUNT(mac) as login_count
				FROM clients where 
				(updated_at
				BETWEEN '$day'
				AND '$day_next'
				)";
//	echo $sql."<br>";
	$data = $db -> select($sql);						
	$count [$d - 1] = $data[0]['login_count'];

	$params [$d - 1] = $day_begin;
	
	
	$d ++;
	$day_begin = $day_begin + (24 * 60 * 60);

}


$DataSet = new pData ();
$DataSet->AddPoint ( $count, "Serie1" );
$DataSet->AddPoint ( $params, "Serie2" ); //横坐标的数据
$DataSet->AddSerie ( "Serie1" );
$DataSet->SetAbsciseLabelSerie ( "Serie2" );
$DataSet->SetSerieName ( "Count", "Serie1" );
//	$DataSet->SetXAxisName("横坐标：日期"); //横坐标上显示的文字
$DataSet->SetXAxisFormat ( "date" ); //横坐标的数据类型


// Initialise the graph
$Test = new pChart ( 900, 430 );
$Test->setDateFormat ( 'j号' ); //横坐标显示的日期格式
$Test->setColorPalette ( 0, 109, 136, 173 );

$Test->setFontProperties ( "../config/Fonts/arialuni.ttf", 8 );
$Test->setGraphArea ( 50, 30, 880, 400 );
//后三位是图片背景颜色
$Test->drawFilledRoundedRectangle ( 7, 7, 893, 423, 5, 240, 240, 240 );
// 外边框设置
$Test->drawRoundedRectangle ( 5, 5, 895, 425, 5, 109, 136, 173 );
$Test->drawGraphArea ( 255, 255, 255, TRUE );

//刻度线设置 
//function drawScale($Data,$DataDescription,$Divisions,$R,$G,$B,$DrawTicks=TRUE,$Angle = 0,$Decimals = 1,$WithMargin = FALSE,$SkipLabels=1)
$Test->setFixedScale ( 0, 500, 10 );
//刻度线设置
$Test->drawScale ( $DataSet->GetData (), $DataSet->GetDataDescription (), 50, 150, 150, 150, TRUE, 0, 2, TRUE );

$Test->drawGrid ( 4, TRUE, 230, 230, 230, 50 );
//显示柱形框的值
$Test->writeValues ( $DataSet->GetData (), $DataSet->GetDataDescription (), "Serie1" );
// Draw the 0 line
$Test->setFontProperties ( "../config/Fonts/tahoma.ttf", 6 );
$Test->drawTreshold ( 0, 143, 55, 72, TRUE, TRUE );

// Draw the bar graph
$Test->drawBarGraph ( $DataSet->GetData (), $DataSet->GetDataDescription (), TRUE );

// Finish the graph
$Test->setFontProperties ( "../config/Fonts/tahoma.ttf", 8 );
//注释框坐标
$Test->drawLegend ( 596, 8, $DataSet->GetDataDescription (), 255, 255, 255 );
$Test->setFontProperties ( "../config/Fonts/arialuni.ttf", 10 );
$Test->drawTitle ( 50, 22, "用户登陆次数", 0, 67, 140, 585 );
// $Test->Render("lizi.png");


$word = rand ( 0, 10 );
$imageFile = "example" . time () . ".png";
$Test->Render ( $imageFile );
echo '<img src="./client/' . $imageFile . '">';
?>