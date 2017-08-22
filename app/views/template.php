<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="/public/static/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/public/static/css/bootstrap.css">
    <link  rel="stylesheet" href="/public/static/css/style.css">
    <title><!-- <?php //echo $app_title; ?> --></title>
</head>
<body>
    <nav class="navbar navbar-fixed-top">
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/public/">
                        PHP.SHOP
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav ">
                        <li>
                            <a href="/public/">Главная</a>
                        </li>
                        <li>
                            <a href="/public/cart">Корзина</a>
                        </li>
                        <li>
                            <a href="/public/contacts">Контакты</a>
                        </li>
                        <li>
                            <a id="login_btn">Личный кабинет</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </nav>


    <div class="modal fade" id="auth_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header mod-title">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Вход в личный кабиенет</h4>
                </div>
                <div class="modal-body mod-form">
                    <form id="auth_form" role="form">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="login" type="text" class="form-control" placeholder="Логин" required autofocus/>
                        </div>

                        <div class="input-group form-margin">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="pwd" type="password" class="form-control" placeholder="Пароль" required />
                        </div>
                        <button type="submit" class="btn-form-margin btn btn-gray btn-block" ><span class="glyphicon glyphicon-off"></span>Войти</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Отмена</button>
                    <p>У Вас еще нет аккаунта? <a href="#" id="reg_btn" data-dismiss="modal">Зарегестрироваться</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reg_modal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header mod-title">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Регистрация</h4>
                </div>
                <div class="modal-body mod-form">
                    <form id="reg_form" role="form">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="reg_login" type="text" class="form-control" placeholder="Логин" required autofocus/>
                        </div>
                        <div class="input-group form-margin">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="input-group form-margin">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="reg_pwd" type="password" class="form-control" placeholder="Пароль" required />
                            <br/>
                            <input type="password" class="form-control" id="psw2" placeholder="Повтор пароля">
                        </div>
                        <button type="submit" class="btn-form-margin btn btn-gray btn-block" ><span class="glyphicon glyphicon-off"></span> Зарегистрироваться</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Отмена</button>
                </div>
            </div>

        </div>
    </div>



<?php include $contentView; ?>

<script src="/public/static/js/modal.js"></script>
<script src="/public/static/js/add_comments.js"></script>
<script src="/public/static/js/add_goods.js"></script>

</body>
</html>

