<?php 
    require_once 'helpers/Helper.php';
?>
<main class="ps-main">
        <div class="ps-products-wrap pt-80 pb-80">
            <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div class="ps-product__filter">
                <form method="get" action="" class="assss"> 
                    <select class="ps-select selectpicker" name="orderBy">
                        <option value="">Mặc định</option>
                        <option value="price-asc" <?php if (isset($_GET['orderBy']) && $_GET['orderBy'] === 'price-asc') echo "selected";?>>Giá tăng dần</option>
                        <option value="price-desc" <?php if (isset($_GET['orderBy']) && $_GET['orderBy'] === 'price-desc') echo "selected";?>>Giá giảm dần</option>
                        <option value="alpha-asc"  <?php if (isset($_GET['orderBy']) && $_GET['orderBy'] === 'alpha-asc') echo "selected";?>>Từ A-Z</option>
                        <option value="alpha-desc" <?php if (isset($_GET['orderBy']) && $_GET['orderBy'] === 'alpha-desc') echo "selected";?>>Từ Z-A</option>
                    </select>
                    <input type="hidden" name="controller" value="<?php echo $_GET['controller'];?>"/>
                    <input type="hidden" name="action" value="<?php echo $_GET['action'];?>"/>
                    <input type="hidden" name="name" value="<?php echo $_GET['name'];?>"/>
                    <input type="submit" style="display: none;" value="submit">
                </form>
                </div>
                <!-- Phân trang -->
                <div class="ps-pagination">
                    <?php echo $pages; ?>
                </div>
                <!--  -->
            </div>
            <div class="ps-product__columns">
                <?php foreach ($products as $product): ?>
                    <div class="ps-product__column">
                        <div class="ps-shoe mb-30">
                            <div class="ps-shoe__thumbnail">
                                <?php if($product['new'] == 1 && $product['original_price']!=0): ?>
                                <div class="ps-badge"><span>New</span></div>
                                <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                    <span>-<?php 
                                        echo round((1 - $product['current_price']/$product['original_price']) * 100, 0)?>%
                                    </span>
                                </div>
                                <?php elseif($product['original_price']!=0): ?>
                                <div class="ps-badge ps-badge--sale">
                                    <span>-<?php 
                                        echo round((1 - $product['current_price']/$product['original_price']) * 100, 0)?>%
                                    </span>
                                </div>
                                <?php elseif($product['new'] ==1 ): ?>
                                    <div class="ps-badge"><span>New</span></div>
                                <?php endif; ?>
                                <span class="ps-shoe__favorite add-to-cart" data-id="<?php echo $product['id']; ?>">
                                    <i class="ps-icon-shopping-cart"></i>
                                </span>
                                <img src="../Backend/assets/uploads/<?php echo $product['avatar'] ?>" alt="">
                                <a class="ps-shoe__overlay" href="index.php?controller=product&action=detail&name=<?php echo Helper::getSlug($product['title'])?>"></a>
                                </div>
                                <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="../Backend/assets/uploads/<?php echo $product['avatar'] ?>" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="index.php?controller=product&action=detail&name=<?php echo Helper::getSlug($product['title'])?>"><?php echo $product['title']; ?></a>
                                    <span class="ps-shoe__price">
                                    <?php if($product['original_price'] !=0): ?>
                                    <del>
                                        <?php echo number_format($product['original_price']) ?>
                                    </del> 
                                    <?php endif; ?>
                                        <?php echo number_format($product['current_price']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="ps-product-action">
                <div class="ps-product__filter">
                
                <select class="ps-select selectpicker orderBy">
                    <option value="default">Mặc định</option>
                    <option value="price-asc">Giá tăng dần</option>
                    <option value="price-desc">Giá giảm dần</option>
                    <option value="alpha-asc">Từ A-Z</option>
                    <option value="alpha-desc">Từ Z-A</option>
                </select>
                </div>
                <div class="ps-pagination">
                    <ul class="pagination">
                        <?php echo $pages; ?>
                    </ul>
                </div>
            </div>
            </div>
            <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Life(521)</a></li>
                    <li><a href="product-listing.html">Running(76)</a></li>
                    <li><a href="product-listing.html">Baseball(21)</a></li>
                    <li><a href="product-listing.html">Football(105)</a></li>
                    <li><a href="product-listing.html">Soccer(108)</a></li>
                    <li><a href="product-listing.html">Trainning & game(47)</a></li>
                    <li><a href="product-listing.html">More</a></li>
                </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--filter">
                <div class="ps-widget__header">
                <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                <form method="get" action="">
                <ul class="ps-list--checked">
                    <li><input type="checkbox" name="price1" value="1" <?php if (isset($_GET['price1']) && $_GET['price1'] === 1) echo "checked"; ?>  /> < 1,000,000 VND  
                    <br/></li>
                    <li><input type="checkbox" name="price2" value="2" <?php if (isset($_GET['price2']) && $_GET['price2'] === 2) echo "checked"; ?>/>    1,000,000 - 2,000,000 VND
                    <br/></li>
                    <li><input type="checkbox" name="price3" value="3" <?php if (isset($_GET['price3']) && $_GET['price3'] === 3) echo "checked"; ?>  /> 2,000,000 - 3,000,000 VND
                    <br/>  </li>
                    <li><input type="checkbox" name="price4" value="4" <?php if (isset($_GET['price4']) && $_GET['price4'] === 4) echo "checked"; ?>  /> > 3,000,000 VND  
                    <br/>  </li>
                    <li>  <input type="submit" name="filterPrice" value="Filter" class="ac-slider__filter ps-btn"/></li>
                <input type="hidden" name="controller" value="<?php echo $_GET['controller'];?>"/>
                <input type="hidden" name="action" value="<?php echo $_GET['action'];?>"/>
                <input type="hidden" name="name" value="<?php echo $_GET['name'];?>"/>
                </ul>
                </form>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                <h3>Sky Brand</h3>
                </div>
                <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Adidas</a></li>
                    <li><a href="product-listing.html">Domba</a></li>
                    <li><a href="product-listing.html">Reebok</a></li>
                </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                <h3>Width</h3>
                </div>
                <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Narrow</a></li>
                    <li><a href="product-listing.html">Regular</a></li>
                    <li><a href="product-listing.html">Wide</a></li>
                    <li><a href="product-listing.html">Extra Wide</a></li>
                </ul>
                </div>
            </aside>
            <div class="ps-sticky desktop">
                <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                    <h3>Size</h3>
                </div>
                <div class="ps-widget__content">
                    <table class="table ps-table--size">
                    <tbody>
                        <tr>
                        <td class="active">3</td>
                        <td>5.5</td>
                        <td>8</td>
                        <td>10.5</td>
                        <td>13</td>
                        </tr>
                        <tr>
                        <td>3.5</td>
                        <td>6</td>
                        <td>8.5</td>
                        <td>11</td>
                        <td>13.5</td>
                        </tr>
                        <tr>
                        <td>4</td>
                        <td>6.5</td>
                        <td>9</td>
                        <td>11.5</td>
                        <td>14</td>
                        </tr>
                        <tr>
                        <td>4.5</td>
                        <td>7</td>
                        <td>9.5</td>
                        <td>12</td>
                        <td>14.5</td>
                        </tr>
                        <tr>
                        <td>5</td>
                        <td>7.5</td>
                        <td>10</td>
                        <td>12.5</td>
                        <td>15</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </aside>
                <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                    <h3>Color</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--color">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    </ul>
                </div>
                </aside>
            </div>
            </div>
        </div>
</main>