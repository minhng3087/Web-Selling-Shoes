<main class="ps-main">
        <div class="ps-products-wrap pt-80 pb-80">
            <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div class="ps-product__filter">
                <select class="ps-select selectpicker">
                    <option value="1">Shortby</option>
                    <option value="2">Name</option>
                    <option value="3">Price (Low to High)</option>
                    <option value="3">Price (High to Low)</option>
                </select>
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
                                <a class="ps-shoe__overlay" href="product-detail.html"></a>
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
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#"><?php echo $product['title']; ?></a>
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
                <select class="ps-select selectpicker">
                    <option value="1">Shortby</option>
                    <option value="2">Name</option>
                    <option value="3">Price (Low to High)</option>
                    <option value="3">Price (High to Low)</option>
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
                <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                <h3>Sky Brand</h3>
                </div>
                <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                    <li><a href="product-listing.html">Adidas(76)</a></li>
                    <li><a href="product-listing.html">Baseball(69)</a></li>
                    <li><a href="product-listing.html">Gucci(36)</a></li>
                    <li><a href="product-listing.html">Dior(108)</a></li>
                    <li><a href="product-listing.html">B&G(108)</a></li>
                    <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
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