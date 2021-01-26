<?php

class Model {

    public $output;
    public $db;

    public function getGoodsInfo($id) {
        $this->output = $this->db->query("SELECT `goods`.`id`,`goods`.`description`,`goods`.`img`,(SELECT AVG(rating) FROM `reviews` WHERE `goods_id`= `goods`.`id`) as avg,`reviews`.`name` as name,`reviews`.`rating` as rating,`reviews`.`comment` as comment,`reviews`.`insert_date` as insert_date FROM `goods` LEFT JOIN reviews ON reviews.goods_id=goods.id WHERE `goods`.`id`=$id")->fetchAll();
    }

    public function firstPageContent() {
        $this->output = $this->db->query('SELECT `goods`.`id`,`goods`.`description`,`goods`.`img`,`username`,`goods`.`insert_date`,(SELECT COUNT(id) FROM `reviews` WHERE `goods_id`= `goods`.`id`) as cnt FROM `goods` LEFT JOIN user ON goods.user_id=user.id')->fetchAll();
    }

    public function firstPageContentOrderBy($orderby, $desc) {
        $this->output = $this->db->query('SELECT `goods`.`id`,`goods`.`description`,`goods`.`img`,`username`,`goods`.`insert_date`,(SELECT COUNT(id) FROM `reviews` WHERE `goods_id`= `goods`.`id`) as cnt FROM `goods` LEFT JOIN user ON goods.user_id=user.id ORDER BY ' . $orderby . ' ' . $desc)->fetchAll();
    }

    public function getUserList() {
        $this->output = $this->db->query('SELECT * FROM `user`')->fetchAll();
    }

    public function insertNewGoods($POST) {
        $insert = $this->db->query('INSERT INTO `goods` (`description`,`img`,`price`,`user_id`,`insert_date`) VALUES (?,?,?,?,?)', $POST['description'], $POST['img'], $POST['price'], $POST['user_id'], date('Y-m-d'));
        return $insert->affectedRows();
    }

    public function insertNewRating($POST) {
        $insert = $this->db->query('INSERT INTO `reviews` (`goods_id`,`name`,`rating`,`comment`,`insert_date`) VALUES (?,?,?,?,?)', $POST['goods_id'], $POST['name'], $POST['rating'], $POST['comment'], date('Y-m-d'));
        return $insert->affectedRows();
    }

}
