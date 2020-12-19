<main class="ps-main">
      <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
        <div id="list-cart">
          <div class="ps-cart-listing">
            <table class="table ps-cart__table">
                <thead>
                <tr>
                    <th>Ảnh sản phẩm</th>
                    <th>Thông tin</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION['cart'] as $product_id => $cart):?>
                <tr>
                    <td>
                    <a class="ps-product__preview" href="chi-tiet-san-pham/<">
                        <img class="mr-15" src="../Backend/assets/uploads/<?php echo $cart['avatar']?>" alt="" width="100">
                    </a>
                    </td>
                    <td><?php echo $cart['name']; ?></td>
                    <td><?php echo number_format($cart['current_price']);?></td>
                    <td>
                    <div class="form-group--number">
                        <span>
                            <input class="form-control" data-id="<?php echo $product_id ?>" id="update-<?php echo $product_id; ?>" type="number" min="1" value="<?php echo $cart['quantity']; ?>">
                        </span>
                    </div>
                    </td>
                    <td> <?php echo number_format($_SESSION['totalItemPrice'][$product_id]); ?><td>
                    <span>
                        <a class="ps-remove" data-id="<?php echo $product_id ?>"></a>
                    </span>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="ps-cart__actions">
                <div class="ps-cart__promotion">
                <div class="form-group">
                    <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                    <input class="form-control" type="text" placeholder="Promo Code">
                    </div>
                </div>
                <div class="form-group">
                    <button class="ps-btn ps-btn--gray">Tiếp tục mua hàng</button>
                </div>
                </div>
                <div class="ps-cart__total">
                <h3>Tổng tiền: 
                    <span> 
                    <?php echo number_format($_SESSION['totalPrice']); ?>
                    </span>
                </h3>
                <a class="ps-btn" href="checkout.html">Tiền hành đặt hàng
                    <i class="ps-icon-next"></i>
                </a>
                </div>
            </div>                         
          </div>
          </div>
        </div>
      </div>
</main>
