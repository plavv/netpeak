<?php
require_once '_top.php';
?>
<a href=""><h1>Список товаров</h1></a> <a href="/?action=new" class="btn">Добавить новый товар</a>
<table>
    <tr>
        <th>Товар <a href="?action=index&orderby=1&desc=1">&uarr;</a> <a href="?action=index&orderby=1&desc=2">&darr;</a></th>
        <th>Изобр.</th>
        <th>Дата <a href="?action=index&orderby=2&desc=2">&uarr;</a> <a href="?action=index&orderby=2&desc=1">&darr;</a></th>
        <th>Имя</th>
        <th>Кол.отз.</th>
    </tr>

    <?php foreach ($this->model->output as $value) { ?>
        <tr>
            <td>
                <a href="/?action=goods&id=<?= $value['id'] ?? '' ?>"><?= $value['description'] ?? '' ?></a>
            </td>
            <td>
                <img class="preview" src="<?= $value['img'] ?? '' ?>">
            </td>
            <td>
                <?= date('d.m.Y', strtotime($value['insert_date'])) ?? '' ?>
            </td>
            <td>
                <?= $value['username'] ?? '' ?>
            </td>
            <td>
                <?= $value['cnt'] ?? '' ?>
            </td>
        </tr>
    <?php } ?>

</table>
<?php
require_once '_bottom.php';

