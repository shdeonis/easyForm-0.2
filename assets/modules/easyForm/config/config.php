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
				<td class="gridHeader" style="text-align:right;">Действие</td>
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
		<td class="gridItem widget-stage" style="text-align:right;">
		<a class="btn btn-sm" title="Просмотр" href="[+moduleurl+]&fid=[+id+]&action=pole"><i class="fa fa-list fa-fw"></i> Поля</a>
		<a class="btn btn-sm" title="Редактировать" href="[+moduleurl+]&fid=[+id+]&action=edit"><i class="fa fa-edit fa-fw"></i> Редактировать</a>
		<a class="btn btn-sm" title="Удалить" onclick="document.delform.delform1.value=[+id+];document.delform.submit();"><i class="fa fa-trash fa-fw"></i> Удалить</a>
		</td>
	</tr>
';

$formEditTpl='
	<div id="actions">
        <ul class="actionButtons">
            <li id="Button1"><a href="[+moduleurl+]">К списку форм</a></li>
            </ul>
    </div>
	<form action="" method="post" class="actionButtons">
		<input type="hidden" name="action" value="updateForm">
		Название: <br><input type="text" value=\'[+name+]\' name="name" size="50"><br> 
		Описание: <br><input type="text" value=\'[+title+]\' name="title" size="50"><br>
		Email: <br><input type="text" value=\'[+email+]\' name="email" size="50"><br><br>
		<input type="submit" value="Сохранить">
	</form>
';

$fieldListTpl='
	<div id="actions">
        <ul class="actionButtons">
            <li id="Button1"><a href="[+moduleurl+]">К списку форм</a></li>
            </ul>
    </div>
	<div class="table-responsive">
	<form id="sortpole" action="" method="post" class="actionButtons1">
		<table class="grid" cellpadding="1" cellspacing="1">
			<thead>
				<tr>
					<td class="gridHeader">Имя</td>
					<td class="gridHeader">Тип</td>
					<td class="gridHeader">Значение</td>
					<td class="gridHeader">Порядок</td>
					<td class="gridHeader" style="text-align:right;">Действие</td>
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
';

$fieldRowTpl='
		<tr>
			<td class="gridItem">[+title+] [+required+]</td>
			<td class="gridItem"> [+type+] </td>
			<td class="gridItem"> [+value+] </td>
			<td class="gridItem"><input type="text" name="sortpole[[+id+]]" value="[+sort+]" class="sort small"></td>
			<td class="gridItem widget-stage" style="text-align:right;"> 
		<a class="btn btn-sm" title="Редактировать" href="[+moduleurl+]&fid=[+parent+]&pid=[+id+]&action=pole"><i class="fa fa-edit fa-fw"></i> Изменить</a>
		<a class="btn btn-sm" title="Удалить" onclick="document.delpole.delpole1.value=[+id+];document.delpole.submit();"><i class="fa fa-trash fa-fw"></i> Удалить</a>
			</td>
		</tr>
';

$fieldEditTpl='
	<div id="actions">
        <ul class="actionButtons">
            <li id="Button1"><a href="[+moduleurl+]&fid=[+parent+]&action=pole">К списку полей</a></li>
            </ul>
    </div>
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
';
?>
