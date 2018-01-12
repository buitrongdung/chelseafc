<div class="container" >
    <div style="margin-top: 56px;">
        <form class="formAddToCart">
            <div style="float: left;height: 555px;width: 456px;position: relative">
                <div><?php (!empty($detailProduct)) ? $detailProduct : '' ?>
                    <img src="<?=BASE_DIR?>/products/<?=$detailProduct['image']?>" alt="<?=$detailProduct['name']?>" style="height: 474px;width: 456px;">
                    <input type="hidden" value="<?=$detailProduct['image']?>" name="image">
                </div>
            </div>
            <div style="float: right;height: 555px;width: 600px;">
                <div style="margin-bottom: 15px;">
                    <span>
                        <h2><?=$detailProduct['name']?></h2>
                    </span>
                </div>
                <div style="margin-bottom: 15px">
                    <h3>U$ <?=$detailProduct['price']?></h3>

                </div>
                <div style="margin-bottom: 15px">
                    <h3 style="background: white;color: #333;">Choose Size & Quantity</h3>
                    <div style="float: left;margin-top: 10px">
                        <h4>Size</h4>
                        <?php if ($detailProduct['id_categories'] == 1) : ?>
                            <select name="size">
                                <option value="0">Select Size</option>
                                <option value="M">M</option>
                                <option value="X">X</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        <?php else: ?>
                            One Size Only
                            <input type="hidden" value="0" name="size">
                        <?php endif; ?>
                    </div>
                    <div style="float: left;margin: 10px 0 0 104px; ">
                        <h4>Quantity</h4>
                        <select name="quantity">
                            <?php  for ($i = 1; $i <= 10; $i++) : ?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div style="float: left; margin: 60px 0 0 -252px;">
                    <div>
                        <input type="hidden" name="id" value="<?=$detailProduct['id']?>">
                        <button type="submit" class="btn contentBtn bigPadLR50">Add To Cart<i class="fa fa-angle-right fa-2"></i></button>
                    </div>

                </div>
                <div style="margin: 134px 0 15px 0;">
                    <h3 style="background: white;color: #333;">Description</h3><br>
                    <span><?=$detailProduct['description']?></span>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    button.btn.contentBtn {
        border-color: #041e42;
        background: #041e42;
        color: #fff;
        text-transform: uppercase;
    }
    button.btn.contentBtn.bigPadLR50 {
        padding-left: 50px;
        padding-right: 50px;
    }
    .btn.contentBtn {
        border-radius: 30px;
        background: #ffd700;
        padding: 10px 10px;
        color: #001489;
        border-color: #ffd700;
        font-weight: bold;
    }
    .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>