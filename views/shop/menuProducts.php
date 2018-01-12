<div id="menu2" style="height: 30px;margin-left: 143px;">
    <ul>
        <?php if (!empty($listProducts)) : ?>
            <?php foreach ($listProducts as $listCategories) : ?>
                <?php if ($listCategories ['id_categories'] == 0) : ?>
                    <li><a id="a"
                           href="<?= BASE_URL ?>shop/detail-categories/<?= $listCategories['id'] ?>/<?= $listCategories['alias'] ?><?= HTML ?>"><?= $listCategories['name'] ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
<style>
    #menu2 ul {
        margin: 0 -41px 0 0;
        list-style-type: none;
        text-align: center;
    }

    #menu2 li {
        color: #f1f1f1;
        display: inline-block;
        width: 120px;
        height: 29px;
        line-height: 40px;
        margin-left: -5px;
        margin-top: -5px;
    }

    #menu2 a:hover {
        background: #f1f1f1;
        color: #1269ff;
        height: 40px;
    }

    #menu2 a {
        text-decoration: none;
        color: #fff;
        display: block;
        height: 40px;
        border-right: 1px solid #FFF;
        border-right-width: 1px;
        border-right-style: solid;
        border-right-color: rgb(255, 255, 255);
        transform: skewX(-20deg);

    }

    #menu2 li {
        position: relative;
    }

    #menu2 li:hover .sub-menu {
        display: block;
    }

    .sub-menu2 li {
        margin-left: 0 !important;
    }

    .sub-menu2 > ul {
        display: none !important;
    }
</style>