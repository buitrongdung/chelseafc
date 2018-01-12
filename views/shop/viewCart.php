<div class="container">
    <div id="yourCart" style="margin-top: 38px">
        <div style="padding-bottom: 63px;">
            <div style="float: left"><span style="font-size: 34px;color: white">Your Cart</span></div>
            <div style="float: left;margin-left: 643px"><button type="button" onclick="viewCart()"  class="btn contentBtn bigPadLR50">Continue to check out<i class="fa fa-angle-right fa-2"></i></button></div>
        </div>
        <div style="background: #e1e1e1; width: 100%; height: 55px;color: #333;font-size: 18px;margin: -8px 0 -8px 0;">
            <div style="width: 15%;float: left;">&nbsp;</div>
            <div style="width: 554px;float: left;">&nbsp;</div>
            <div style="width: 141px;float: left;margin-top: 18px;"><span>Unit Price</span></div>
            <div style="width: 80px;float: left;margin-top: 18px;"><span>Qty</span></div>
            <div style="width: 137px;float: left;margin-top: 18px;"><span>Price</span></div>
        </div>
        <div style="width: 100%">
            <table style="width: 100%" >
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($_SESSION['products']) && count($_SESSION['products']) > 0 ) : ?>
                    <?php $total = 0; ?>
                   <?php foreach ($_SESSION['products'] as $product) : ?>
                    <div id="invoice_item">
                        <tr class="invoice_item" >
                            <td>
                                <div style="width: 15%;float: left;margin-left: -2px;">
                                    <img width="147px" src="<?=BASE_DIR?>/products/<?=$product['image']?>" alt="<?=$detailProduct['name']?>">
                                </div>
                                <div style="width: 554px;float: left" class="name">
                                    <h3><?=$product['name']?></h3>
                                    <dl style="margin-top: 16px;">
                                        <dt style="text-align: left;width: 120px; white-space: normal;float: left;"><span>Size : </span>
                                        </dt>
                                        <dd
                                            <span style="margin-left: 120px;">
                                                <?php if ($product['size'] === '0') : ?>
                                                    <?="-"?>
                                                <?php else: ?>
                                                    <?=$product['size']?>
                                                <?php endif; ?>
                                            </span>
                                        </dd>
                                        <dt style="float: left;text-align: left;width: 120px;">Code : </dt>
                                        <dd data-id="id"><?=$product['id']?></dd>
                                        <input value="<?=$product['id']?>" name="idProduct" type="hidden">
                                        <input value="<?=$product['size']?>" name="size" type="hidden">
                                    </dl>
                                    <div style="margin-top: 21px;">
                                        <a href="#" style="color: white;" onclick="removeProduct(this)" class="removeProduct" data-id="<?=$product['id']?>"><span>Remove</span></a>
                                    </div>
                                </div>
                                <div style="width: 141px;float: left">
                                    U$<span id="price"> <?=$product['price']?></span>

                                </div>
                                <div style="width: 80px;float: left">
                                    <input onblur="myFunction(this)" value="<?=$product['quantity']?>" type="text" name="quantity" style="width: 28px; height: 24px; text-align: center;" required />
                                </div>
                                <div style="width: 137px;float: left">
                                    <span id="total" style="display: none;"><?=$product['price'] * $product['quantity']?></span>
                                    U$&nbsp;<span id="a"><?=$product['price'] * $product['quantity']?></span>
                                </div>
                            </td>
                        </tr>
                    </div>
                    <?php
                        $subtotal = $product['quantity'] * $product['price'];
                        $total += $subtotal;
                    ?>
                    <?php endforeach; ?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <div style="background: #e1e1e1; width: 100%; height: 40px;color: #333;font-size: 18px;margin: 8px 0 8px 0;">
            <div style="width: 15%;float: left;">&nbsp;</div>
            <div style="width: 554px;float: left;">&nbsp;</div>
            <div style="width: 141px;float: left;margin-top: 11px;"><span>Total</span></div>
            <div style="width: 80px;float: left;margin-top: 18px;"><span>&nbsp;</span></div>
            <div style="width: 137px;float: left;margin-top: 11px;"><span id="totalAmount">US$ <?php if(isset($total) ? $total : '') ?></span></div>
        </div>
        <div style="position: relative">
            <div style="float: left; width: 50%;position: absolute;margin-left: 19px;">
                <a href="/shop/list-all-products" style="background: #041e42; border: #041e42; color: white; text-transform: uppercase;font-family: arial;width: 200px;" class="btn contentBtn bigPadLR50">Back to previous</a>
            </div>
            <div style="float: left;margin-left: 774px; width: 50%;position: absolute">
                <button type="button" onclick="viewCart()" class="btn contentBtn bigPadLR50" value="">Continue to check out</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript" src="../../../public/js/viewCart.js"></script>
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