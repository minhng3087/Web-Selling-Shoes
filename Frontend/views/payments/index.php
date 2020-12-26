<?php
require_once 'helpers/Helper.php';
?>
<main class="ps-main">
        <div class="ps-checkout pt-80 pb-80">
            <div class="ps-container">
            <form class="ps-checkout__form" action="" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                        <h3>Billing Detail</h3>
                                <div class="form-group form-group--inline">
                                <label>Full Name<span>*</span>
                                </label>
                                <input class="form-control" name="fullname" type="text">
                                </div>
                                <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input class="form-control" name="email" type="email">
                                </div>
                                <div class="form-group form-group--inline">
                                <label>Phone<span>*</span>
                                </label>
                                <input class="form-control" name="mobile" type="text">
                                </div>
                                <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <input class="form-control" name="address" type="text">
                                </div>
                        <div class="form-group">
                            <div class="ps-checkbox">
                            <input class="form-control" type="checkbox" id="cb01">
                            <label for="cb01" href="register.html">Create an account?</label>
                            </div>
                        </div>
                        <h3 class="mt-40"> Addition information</h3>
                        <div class="form-group form-group--inline textarea">
                            <label>Order Notes</label>
                            <textarea class="form-control" name="note" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                        <header>
                            <h3>Your Order</h3>
                        </header>
                        <div class="content">
                            <table class="table ps-checkout__products" id="checkout__products" style=" border-bottom: 1px solid #4d4d4d;">
                            <thead>
                                <tr>
                                <th class="text-uppercase">Product</th>
                                <th class="text-uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  $total = 0;?>
                            <?php foreach ($_SESSION['cart'] AS $product_id => $cart): 
                            $product_link = 'san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                            ?>
                                <tr>
                                <td><?php echo $cart['name'];?></td>
                                <td>
                                <?php 
                                $price_total = $cart['current_price'] * $cart['quantity'];
        
                                ?>
                                <?php $total += $price_total;?>
                                <?php echo number_format($price_total,0,'.','.');?></td>
                                </tr>

                            <?php endforeach; ?>   
                                
                            </tbody>
                            <tr>
                                    <td></td>
                                    <td><?php echo number_format($total,0,'.','.');?></td>
                                </tr>
                            </table>
                        </div>
                        <footer>
                            <h3>Payment Method</h3>
                            <div class="form-group cheque">
                            <div class="ps-radio">
                                <input class="form-control" type="radio" id="rdo01" name="method" checked value="0" >
                                <label for="rdo01">COD</label>
                                <p>A type of transaction in which the recipient makes payment for a good at the time of delivery. </p>
                            </div>
                            </div>
                            <div class="form-group paypal">
                            <div class="ps-radio ps-radio--inline">
                                <input class="form-control" type="radio" name="method" id="rdo02" value="1">
                                <label for="rdo02">Paypal</label>
                            </div>
                            <ul class="ps-payment-method">
                                <li><a href="#"><img src="assets/images/payment/1.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/payment/2.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/payment/3.png" alt=""></a></li>
                            </ul>
                            <!-- <button class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button> -->
                            <input type="submit" name="submit" value="Place Order" class="ps-btn ps-btn--fullwidth"/>
                            </div>
                        </footer>
                        </div>
                        <div class="ps-shipping">
                        <h3>FREE SHIPPING</h3>
                        <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on every order, every time.</p>
                        </div>
                    </div>
                </div>
            </form>
            </div>