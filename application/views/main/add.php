<?php

use application\models\Main;

$this->title = 'Добавление статьи';
?>
<form action="add" method="post">
	<fieldset class="form-group">
		<h2>Добавление новой статьи</h2>
		<br>
		<input type="title" name="title" id="title" class="form-control"placeholder="Введите тему статьи">
		<div class="invalid-feedback"></div>
	</fieldset>
	<fieldset class="form-group">
		<input type="date" name="date" id="date" class="form-control" placeholder="date">
		<div class="invalid-feedback"></div>
	</fieldset>
	<fieldset class="form-group">
		<select name="tag" class="form-control">
            <?php foreach ($tags as $key => $val) : ?>
                <option value="<?= $val['id_tag'] ?>"><?= $val['tag'] ?></option>
                    <?php endforeach; ?>
        </select>
	</fieldset>
	
	<fieldset class="form-group">
		<textarea class="form-control" name="text" id="text" placeholder="Введите текст статьи" rows="8"></textarea>
		<div class="invalid-feedback"></div>
	</fieldset>
	<button type="submit" name="submit" class="btn btn-primary">Добавить статью</button>
</form>
