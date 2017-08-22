<div class="goods-row">
    <div class="wrapper">
        <div class="container-fluid padding-less first-row">
            <?php foreach ($goods_data as $key => $value):?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="goods img-rounded" src="/public/static/img/<? echo $goods_data[$key]['preview'] ?>" alt="<?php echo $goods_data[$key]['title']; ?>">
                    <div class="caption">
                        <h3 class="text-center"><?php echo $goods_data[$key]['title']; ?></h3>
                        <p class="text-center">
                            <?php echo $goods_data[$key]['description']; ?>
                        </p>
                        <p class="text-right">
                            Цена: <?php echo $goods_data[$key]['price']; ?>
                        </p>
                        <p><a href="/public/description/<?php echo $goods_data[$key]['id'];?>" class="btn btn-block btn-default" role="button">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>



