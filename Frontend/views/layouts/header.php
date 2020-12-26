<div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>460 West 34th Street, 15th floor, New York  -  Hotline: 804-377-3580 - 804-399-3580</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <?php if (isset($_SESSION['user'])): ?>
                  <div class="header__actions"><a href="index.php?controller=login&action=logou">Logout</a>
                  <?php else: ?>
                  <div class="header__actions"><a href="index.php?controller=login&action=login">Login & Regiser</a>
                  <?php endif; ?>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#"><img src="assets/images/flag/usa.svg" alt=""> USD</a></li>
                        <li><a href="#"><img src="assets/images/flag/singapore.svg" alt=""> SGD</a></li>
                        <li><a href="#"><img src="assets/images/flag/japan.svg" alt=""> JPN</a></li>
                      </ul>
                    </div>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">English</a></li>
                        <li><a href="#">Japanese</a></li>
                        <li><a href="#">Chinese</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="index.php?controller=home"><img src="assets/images/logo.png" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="home">Home</a></li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="#">Thương hiệu</a>
                    <ul class="sub-menu">
                        <?php 
                        foreach ($_SESSION['categories_name'] as $categoryName): ?>
                          <li class="menu-item"><a href="index.php?controller=product&action=showAllProductsByCategory&name=<?php echo $categoryName['name']; ?>">
                          <?php echo $categoryName['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                  </li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="giam-gia.html">Giảm giá</a></li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="do_action" method="post">
              <input class="form-control" type="text" placeholder="Search Product…">
              <button><i class="ps-icon-search"></i></button>
            </form>
            <div class="ps-cart">
              <a class="ps-cart__toggle" href="gio-hang-cua-ban.html">
                <span><i id="change-amount-cart">
                  <?php if($_SESSION['totalQuantity'] <0 || !isset($_SESSION['totalQuantity'])): ?>
                  0
                  <?php else: ?>
                    <?php echo $_SESSION['totalQuantity']; ?>
                  <?php endif; ?>
                </i></span>
                <i class="ps-icon-shopping-cart"></i>
              </a>
              <div class="ps-cart__listing">
                <!-- Item cart -->
                <div id="change-item-cart">
                  <?php if (!isset($_SESSION['totalQuantity'])||$_SESSION['totalQuantity'] == 0): ?>
                    <p>Chưa có sản phẩm trong giỏ hàng</p>
                  <?php else: ?>
                    <?php foreach($_SESSION['cart'] as $product_id => $cart):?>
                        <div class="ps-cart-item">
                            <span ><a class="ps-cart-item__close" data-id="<?php echo $product_id;?>"></a></span>
                        <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="../Backend/assets/uploads/<?php echo $cart['avatar'] ?>" alt=""></div>
                            <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html"><?php echo $cart['name'] ?></a>
                                <p>
                                <span>Số lượng:<i><?php echo $cart['quantity']?></i></span>
                                    <span>Tổng:<i><?php echo number_format($_SESSION['totalItemPrice'][$product_id]) ?></i></span>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if($_SESSION['totalQuantity'] >= 0 ): ?> 
                        <div class="ps-cart__total">
                            <p>Tổng số lượng:<span class="cart-amount"><?php echo $_SESSION['totalQuantity']; ?></span></p>
                            <p>Tổng tiền:
                                <span><?php echo number_format($_SESSION['totalPrice']) ?></span>
                            </p>
                        </div>
                    <div class="ps-cart__footer"><a class="ps-btn" href="cart.html">Check out<i class="ps-icon-arrow-left"></i></a></div>
                    <?php else: ?>
                      <p>Chưa có sản phẩm trong giỏ hàng</p>
                    <?php endif; ?>
                  <?php endif; ?>                        
                </div>
                <!-- End Item cart -->
              </div>
            </div>
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
<div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
      </div>
</div>
