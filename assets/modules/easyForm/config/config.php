<?php
if(!defined('MODX_BASE_PATH')){die('What are you doing? Get out of here!');}

//список доступных форм
$formListTpl='
	<div class="table-responsive">
	<table class="grid" cellpadding="1" cellspacing="1">
		<thead>	
			<tr>
				<td class="gridHeader">id</td>
				<td class="gridHeader">Имя</td>
				<td class="gridHeader">Описание</td>
				<td class="gridHeader">Email</td>
				<td class="gridHeader">Поля</td>
				<td class="gridHeader">Изменить</td>
				<td class="gridHeader">Удалить</td>
				<td class="gridHeader text-right">Действие</td>
			</tr>
		</thead>
		<tbody>
			[+formRows+]
		</tbody>
	</table>
	</div>
	<br><br>
	<!--форма для создания новой формы-->
	<form action="" method="post" class="actionButtons"> 
		<input type="hidden" name="action" value="newForm">
		Название: <br><input type="text" value="" name="name"><br>
		Описание: <br><input type="text" value="" name="title"><br>
		Email: <br><input type="text" value="" name="email"><br><br>
		<input type="submit" value="Добавить форму">
	</form>		
';

//строка формы в таблице списка форм
$formRowTpl='
	<tr>
		<td class="gridItem">[+id+]</td>
		<td class="gridItem">[+name+]</td>
		<td class="gridItem">[+title+]</td>
		<td class="gridItem">[+email+]</td>
		<td class="actionButtons"><a href="[+moduleurl+]&fid=[+id+]&action=pole" class="button choice"> <img src="[+iconfolder+]page_white_copy.png" alt=""> Список полей</a></td>
		<td class="actionButtons"><a href="[+moduleurl+]&fid=[+id+]&action=edit" class="button edit"> <img alt="" src="[+iconfolder+]page_white_magnify.png" > Изменить</a></td>
		<td class="actionButtons"><a onclick="document.delform.delform1.value=[+id+];document.delform.submit();" style="cursor:pointer;" class="button delete"> <img src="[+iconfolder+]delete.png" alt=""> удалить</a></td>
		<td class="gridItem">
		<a class="btn btn-xs btn-info" title="Просмотр" href="[+moduleurl+]&fid=[+id+]&action=pole"><i class="fa fa-eye fa-fw"></i></a>
		<a class="btn btn-xs btn-success" title="Редактировать" href="[+moduleurl+]&fid=[+id+]&action=edit"><i class="fa fa-edit fa-fw"></i></a>
		<a onclick="document.delform.delform1.value=[+id+];document.delform.submit();" class="btn btn-xs btn-danger" title="Удалить" href="index.php?a=6&amp;id=1"><i class="fa fa-trash fa-fw"></i></a>
		</td>
	</tr>
';

$formEditTpl='
	<form action="" method="post" class="actionButtons">
		<input type="hidden" name="action" value="updateForm">
		Название: <br><input type="text" value=\'[+name+]\' name="name" size="50"><br> 
		Описание: <br><input type="text" value=\'[+title+]\' name="title" size="50"><br>
		Email: <br><input type="text" value=\'[+email+]\' name="email" size="50"><br><br>
		<input type="submit" value="Сохранить">
	</form><br><br>
	<a href="[+moduleurl+]">К списку форм</a>
';

$fieldListTpl='
	<div class="table-responsive">
	<form id="sortpole" action="" method="post" class="actionButtons">
		<table class="grid" cellpadding="1" cellspacing="1">
			<thead>
				<tr>
					<td class="gridHeader">Имя</td>
					<td class="gridHeader">Тип</td>
					<td class="gridHeader">Значение</td>
					<td class="gridHeader">Порядок</td>
					<td class="gridHeader">Изменить</td>
					<td class="gridHeader">Удалить</td>
				</tr>
			</thead>
			<tbody>
				[+fieldRows+]	
			</tbody>
		</table>
		<br>
		<input type="submit" value="Сохранить порядок">
	</form>
	</div>
	<br><br>
	<h2>Добавление нового поля</h2>
	<form action="" method="post" class="actionButtons">
		<input type="hidden" name="action" value="newField">
		Название <br><input type="text" value="" name="title"><br>
		Тип поля <br>	
		<select name="type">[+typeOptions+]</select><br>
		Значение (для типа "список","переключатель","флажок") в формате "значение==подпись" либо просто "подпись", если значение и подпись совпадают (каждый вариант - с новой строки):<br>
		<textarea name="value"></textarea>
		<br>
		Обязательно <input type="checkbox" name="require" value="1"><br><br>
		<input type="submit" value="Добавить поле">
	</form>
	<br><br>
	<a href="[+moduleurl+]">К списку форм</a>
';

$fieldRowTpl='
		<tr>
			<td>[+title+] [+required+]</td><td> [+type+] </td><td> [+value+] </td>
			<td><input type="text" name="sortpole[[+id+]]" value="[+sort+]" class="sort small"></td>
			<td> <a href="[+moduleurl+]&fid=[+parent+]&pid=[+id+]&action=pole" class="button edit"><img alt="" src="[+iconfolder+]page_white_magnify.png" > Изменить</a> </td>
			<td> <a onclick="document.delpole.delpole1.value=[+id+];document.delpole.submit();" style="cursor:pointer;" class="button delete"> <img src="[+iconfolder+]delete.png" alt=""> Удалить</a> </td>
		</tr>
';

$fieldEditTpl='
	<form action="" method="post" class="actionButtons">
		<input type="hidden" name="action" value="updateField">
		Название: <br><input type="text" value=\'[+title+]\' name="title"><br> 
		Тип: <br>
		<select name="type">[+options+]</select>
		<br>
		Значение (для типа "список","переключатель","флажок") в формате "значение==подпись" либо просто "подпись", если значение и подпись совпадают (каждый вариант - с новой строки): 
		<br>
		<textarea name="value">[+value+]</textarea><br>
		Обязательно: <input type="checkbox" value="1" name="require" [+checked+]><br><br>
		<input type="submit" value="Сохранить изменения">
	</form>
	<br><br>
	<a href="[+moduleurl+]&fid=[+parent+]&action=pole">К списку полей</a>
';








?>
