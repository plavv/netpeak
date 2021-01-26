<?php
require_once '_top.php';
?>
<a href="/" class="btn">Главная</a>
<h1>Добавить новый товар</h1>
<form action="?action=new" method="post">
    <p>
        <input class="input" type="text" name="description" value="" placeholder="название товара ..." required="">
    <p>
        <input class="input" type="url" name="img" value="" placeholder="ссылка на товар" required="">
    <p>
        <input class="input" type="number" name="price" min="1" max="999999" value="" placeholder="средняя цена" required="">
    <p>
        <select class="input" name="user_id">
            <?php foreach ($this->model->output as $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['username'] ?></option>
            <?php } ?>
        </select>
    </p>

    <p><input class="btn" type="submit" value="Добавить"></p>
</form>
<?php
require_once '_bottom.php';

