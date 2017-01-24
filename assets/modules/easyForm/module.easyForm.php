<?php
/* author webber   web-ber12@yandex.ru */
// version 0.1
// визуальное создание и редактирование простых форм на основе сниппета eForm
// создать модуль с названием easyForm и кодом 
// require_once MODX_BASE_PATH."assets/modules/easyForm/module.easyForm.php";

if(!defined('MODX_BASE_PATH')){die('What are you doing? Get out of here!');}

include_once('easyForm.class.php');
$eF=new easyFormModule($modx);
$eF->Run();



/********************* шаблон вывода в модуль ************************/
$output=<<<OUT
<!doctype html>
<html lang="ru">
<head>
	<title>Управление формами</title>
	<link rel="stylesheet" type="text/css" href="media/style/{$eF->theme}/style.css" />
</head>
<body>
	<h1>Управление формами</h1>
	<div class="sectionHeader">{$eF->zagol}</div>
	<div class="sectionBody">
		<div class="action_info">{$eF->info}</div>
			
		{$eF->eBlock}
				
		<form action="" method="post" id="delform" name="delform"> 
			<input type="hidden" name="delform1" value="">
		</form>
		<form action="" method="post" id="delpole" name="delpole"> 
			<input type="hidden" name="delpole1" value="">
		</form>
	</div>
</body>
</html>
OUT;

/****************** конец формирования шаблона в модуль ************/


//выводим все в область контента модуля
echo $output;
?>
