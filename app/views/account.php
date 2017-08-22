<div class="goods-row">
    <div class="wrapper">
        <div class="container-fluid padding-less first-row">
            <h1>Welcome, <?php echo $username; ?></h1>
            <a id="logout">Выйти</a>
        </div>
    </div>
</div>

<?php if($admin): ?>
<div class="wrapper">
    <div class="container-fluid padding-less first-row">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#panel1">Добавить товар</a></li>
            <li><a data-toggle="tab" href="#panel2">Изменить товар</a></li>
        </ul>

        <div class="tab-content">
            <div id="panel1" class="tab-pane fade in active">
                <h3>Добавление товара</h3>

                <div class="col-md-6">
                    <form id="add_good_form" role="form">
                    <div class="form-group row">
                        <label for="title" class="col-2 col-form-label">Название</label>
                        <div class="col-8">
                            <input class="form-control" type="text" placeholder="Название товара" id="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-2 col-form-label">Описание</label>
                        <div class="col-8">
                            <div class="form-group">
                                <textarea id="description" rows="4" class="form-control comment-form" placeholder="Описание товара" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-2 col-form-label">Цена</label>
                        <div class="col-8">
                            <input class="form-control" type="number" min="1" placeholder="Стоимость товара" id="price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="count" class="col-2 col-form-label">Количество</label>
                        <div class="col-8">
                            <input class="form-control" type="number" min="1" placeholder="Количество товара" id="count" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="preview" class="col-2 col-form-label">Фото товара</label>
                        <div class="col-8">
                            <div class="input-group">
                                <label class="input-group-btn">
                            <span class="btn btn-default">
                                Выбрать<input id="preview" type="file" style="display: none;" multiple>
                            </span>
                                </label>
                                <input id="choosen_file" type="text" class="form-control" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row text-right btn-add-good">
                        <button type="submit" class="btn btn-default">Добавить</button>
                    </div>
                </div>
                </form>
            </div>
            <div id="panel2" class="tab-pane fade">
                <h3>Изменение товара</h3>
                <!--TODO реализовать изменение товара -->
            </div>
        </div>



    </div>
</div>
<?php endif; ?>


<!--{"id":6,
"title":"Волынка",
"description":
"Long description 6",
"preview":"piano.jpg",
"price":170,
"count":7}-->