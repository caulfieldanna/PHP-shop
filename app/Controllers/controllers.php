<?php

function indexAction() {
//    echo 'All Goods';
    generateView('all_goods_view.php', 'template.php', [
        'app_title' => 'Главная',
        'goods_data' => getAllGoods(),
    ]);

}

function descriptionAction() {
//    echo 'Good"s Description';
    $comments = getAllComments();
    $good = getGoodById(isset($_GET['id']) ? $_GET['id'] : '');
    generateView('good_info_view.php', 'template.php', [
        'app_title' => $good['title'],
        'current_good' => $good,
        'comments' => $comments,
        'auth' => is_session(),
    ]);
}





function accountLoginAction() {
    $login = (isset($_POST['login']) ? $_POST['login'] : '');
    $pwd = (isset($_POST['pwd']) ? $_POST['pwd'] : '');
    if (login($login, $pwd) || is_session()) {
        echo 'ok';
    } else {
        echo "auth error";
    }

}

function accountLogoutAction() {
    setcookie('user_id');
    unset($_SESSION['username']);
    session_unset();
    session_destroy();
    echo "logout";
}

function accountAction() {
//    echo "ACCOUNT";
    $admin = is_admin($_SESSION['username']);
    generateView('account.php', 'template.php', [
        'app_title' => 'Личный кабинет',
        'username' => $_SESSION['username'],
        'admin' => $admin
    ]);
}


function addCommentsAction() {
    $comment = (isset($_POST['comment']) ? $_POST['comment'] : '');
    if (commentAdded($comment)) {
        echo 'add'; //TODO передавать json c данными для вставки комментария на js
    } else {
        echo "adding error";
    }
}


function cartAction() {
    echo "Корзинка";
}

function orderAction() {
    echo "Заказ";
}



function contactsAction() {
    echo "Контакты";
}



function generateView($contentView, $template, $data=[]) {
    if ($data) {
        extract($data);
    }

    require_once '../app/views/' . $template;
}
