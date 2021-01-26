<?php

class Controller {

    private $model;
    public $view;

    public function __construct($model) {
        $this->model = $model;
    }

    public function goods() {
        if ($_POST && $this->model->insertNewRating($_POST)) {
            //  header('Location: /');
        };

        $this->model->getGoodsInfo(intval($_GET['id']));
        $this->view = 'goods';
    }

    public function new() {

        if ($_POST && $this->model->insertNewGoods($_POST)) {
            header('Location: /');
        };

        $this->model->getUserList();
        $this->view = 'new';
    }

    public function index() {

        if ($_GET && intval($_GET['orderby']) && intval($_GET['desc'])) {
            switch ($_GET['orderby']) {
                case 1:
                    $orderby = 'description';
                    break;
                case 2:
                    $orderby = 'insert_date';
                    break;
                default:
                    $orderby = 'insert_date';
            }
            switch ($_GET['desc']) {
                case 1:
                    $desc = 'DESC';
                    break;
                case 2:
                    $desc = 'ASC';
                    break;
                default:
                    $desc = 'ASC';
            }
            $this->model->firstPageContentOrderBy($orderby, $desc);
        } else {
            $this->model->firstPageContent();
        }

        $this->view = 'index';
    }

}
