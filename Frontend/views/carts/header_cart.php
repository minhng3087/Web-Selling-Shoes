
<div class="ps-cart__content">
<?php if (!isset($_SESSION['totalQuantity'])||$_SESSION['totalQuantity'] == 0): ?>
    <p>Chưa có sản phẩm trong giỏ hàng</p>
<?php else: ?>
<?php 
    foreach($_SESSION['cart'] as $product_id => $cart):
?>
    <div class="ps-cart-item">
        <span><a class="ps-cart-item__close" data-id="<?php echo $product_id;?>"></a></span>
    <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="../Backend/assets/uploads/<?php echo $cart['avatar'] ?>" alt=""></div>
        <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html"><?php echo $cart['name'] ?></a>
            <p>
            <span>Số lượng:<i><?php echo $cart['quantity']?></i></span>
                <span>Tổng:<i><?php echo number_format($_SESSION['totalItemPrice'][$product_id]) ?></i></span>
            </p>
        </div>
    </div>
<?php endforeach; ?>
<div class="ps-cart__total">
    <p>Tổng số lượng:<span class="cart-amount"><?php echo $_SESSION['totalQuantity']?></span></p>
    <p>Tổng tiền:
        <span><?php echo number_format($_SESSION['totalPrice']) ?></span>
    </p>
</div>
<div class="ps-cart__footer"><a class="ps-btn" href="cart.html">Check out<i class="ps-icon-arrow-left"></i></a></div>
<?php endif; ?>
</div>