<div class="goods-row">
    <div class="wrapper">
        <div class="container-fluid padding-less first-row">
            <div class="col-md-6 col-sm-4">
                <div class="thumbnail">
                    <img src="/public/static/img/<?php echo $current_good['preview'] ?>">
                    <h1><?php echo $current_good['title'];  ?></h1>
                    <p><?php echo $current_good['description']; ?></p>
                    <p class="text-right">
                        Цена: <?php echo $current_good['price']; ?>
                    </p>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-md-10 col-md-offset-1">
                    <div class="comments">
                        <h3 class="title-comments">Комментарии (<?php echo count($comments); ?>)</h3>

                        <ul class="media-list">
                            <?php foreach ($comments as $key => $value): ?>
                            <li class="media">
                                <div class="media-left">
                                        <img class="avatar media-object img-circle" src="/public/static/img/<?php echo $comments[$key]['avatar']; ?>" alt="<?php echo $comments[$key]['username']; ?>">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="author"><?php echo $comments[$key]['username']?></div>
                                        <div class="metadata">
                                            <span class="date"><?php echo $comments[$key]['date'] ?></span>
                                        </div>
                                    </div>
                                    <div class="media-text text-justify">
                                        <?php echo $comments[$key]['comment'] ?>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                    <?php if ($auth): ?>
                        <form id="comment_form" class="row" role="form">
                            <div class="form-group">
                                <textarea id="comment" rows="3" class="form-control comment-form" placeholder="Ваш комментарий"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Отправить</button>
                            </div>
                        </form>

                    <?php else: ?>
                        <p>Вы не можете оставлять комментарии</p>
                    <?php endif; ?>
                </div>



            </div>




        </div>
    </div>
</div>







