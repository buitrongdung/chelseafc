<div class="container">
    <?php include( __DIR__ . "/menuProducts.php");?>
    <div class="main">
        <div id="mi-slider" class="mi-slider">
            <ul>
                <?php if (!empty($listProducts)) : ?>
                    <?php foreach ($listProducts as $list) : ?>
                        <?php if (!empty($list['id_categories'])) : ?>
                            <li><a href="/shop/detail-product/<?=$list['id']?>/<?=$list['alias']?><?=HTML?>">
                                    <img src="<?=BASE_DIR?>/products/<?=$list['image']?>" alt="<?=$list['name']?>"><br>
                                    <a href="/cart/add-to-cart" style="font-size: 14px"><?=$list['name']?></a>
                                    <h5 style="color: #888">U$<?=$list['price']?></h5>
                            </a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $( '#mi-slider' ).catslider();
    });
</script>