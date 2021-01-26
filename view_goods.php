<?php
require_once '_top.php';
?>
<a href="/" class="btn">Главная</a> <a href="/?action=new" class="btn">Добавить новый товар</a>
<h1><?= $this->model->output[0]['description'] ?? '' ?></h1>
<div class="row">
    <section class="sidebar">
        <img class="big-img" src="<?= $this->model->output[0]['img'] ?? '' ?>" alt="<?= $this->model->output[0]['description'] ?? '' ?>">
        <p>Cредняя оценка: <?= $this->model->output[0]['avg'] ? round($this->model->output[0]['avg'], 1) : 'отсутствует' ?></p>
    </section>
    <section class="content">
        <table>
            <tr>
                <th>Имя</th>
                <th>Оценка</th>
                <th>Комментарий</th>
                <th>Дата</th>
            </tr>

            <?php foreach ($this->model->output as $value) { ?>
                <tr>
                    <td>
                        <?= $value['name'] ?? '' ?>
                    </td>
                    <td>
                        <?= $value['rating'] ?? '' ?>
                    </td>
                    <td>
                        <?= $value['comment'] ?? '' ?>
                    </td>
                    <td>
                        <?= date('d.m.Y', strtotime($value['insert_date'])) ?>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </section>
</div>


<h1>Отзыв о товаре</h1>
<form action="" method="post" id="ratingform">
    <p>
        <input class="input" type="text" name="name" value="" placeholder="Ваше имя ... " required="">
    <p>
        <input class="input" type="number" name="rating" min="1" max="10"  placeholder="оценка" required="">
    <p>
        <textarea rows="4" cols="50" name="comment" form="ratingform" placeholder="Ввведите ваш комментарий..." required=""></textarea>
    </p>

    <input type="hidden" name="goods_id" value="<?= $_GET['id'] ?? '' ?>">
    <p><input class="btn" type="submit" value="Добавить"></p>
</form>
<?php
require_once '_bottom.php';

