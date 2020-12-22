
<main class="ps-main">
      <div class="ps-banner">
        <div class="rev_slider fullscreenbanner" id="home-banner">
          <ul>
            <li class="ps-banner" data-index="rs-2972" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="../Backend/assets/uploads/<?php echo $imgSlider[1]['avatar'] ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
            </li>
            <li class="ps-banner ps-banner--white" data-index="rs-100" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="../Backend/assets/uploads/<?php echo $imgSlider[0]['avatar'] ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
            </li>
          </ul>
        </div>
      </div>
      <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
            <ul class="ps-masonry__filter">
              <li class="current"><a href="#" data-filter="*">All</a></li>
              <?php foreach ($_SESSION['categories_name'] as $category): ?>
                <li>
                <a href="#" data-filter=".<?php echo $category['name']; ?>"><?php echo $category['name']; ?> </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="6" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
              <div class="ps-masonry">
                <div class="grid-sizer"></div>
                <?php foreach ($productsNew as $product): ?>
                <div class="grid-item <?php echo $product['name']; ?>">
                  <div class="grid-item__content-wrapper">
                    <div class="ps-shoe mb-30">
                      <div class="ps-shoe__thumbnail">
                        <div class="ps-badge"><span>New</span></div>
                        <?php if($product['original_price'] != 0): ?>
                        <div class="ps-badge ps-badge--sale ps-badge--2nd">
                          <span>-<?php echo round((1 - $product['current_price']/$product['original_price']) * 100, 0)?>%</span>
                        </div>
                        <span class="ps-shoe__favorite add-to-cart" data-id="<?php echo $product['id']; ?>">
                          <i class="ps-icon-shopping-cart"></i>
                        </span>
                        <img src="../Backend/assets/uploads/<?php echo $product['avatar'] ?>" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                        <?php endif; ?>
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
                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#"><?php echo $product['title'] ?></a>
                            <span>
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
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner -->
      <div class="ps-section--offer">
        <?php foreach ($imgBanner as $img): ?>
        <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="../Backend/assets/uploads/<?php echo $img['avatar'] ?>" alt=""></a></div>
        <?php endforeach; ?>
      </div>
      <!-- End Banner -->
      <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="BEST SALE">- Top Sales</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              <?php foreach ($productsTopSale as $product): ?>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge ps-badge--sale"><span>-<?php echo $product['salePrice'] ?>%</span></div>
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
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html"><?php echo $product['title'] ?></a>
                    <span class="ps-shoe__price">
                      <del><?php echo number_format($product['original_price']) ?></del> <?php echo number_format($product['current_price']) ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-home-blog pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="News">- Our Story</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="#">View all post<i class="fa fa-long-arrow-right"></i></a></div>
          </div>
          <div class="ps-section__content">
            <div class="row">
                <?php foreach($news as $new): ?>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="../Backend/assets/uploads/<?php echo $new['avatar']?>" alt=""></div>
                      <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html"><?php echo $new['title']?></a>
                        <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                        <p><?php echo $new['summary']; ?></p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-home-contact">
        <div id="contact-map" data-address="New York, NY" data-title="BAKERY LOCATION!" data-zoom="17"></div>
        <div class="ps-home-contact__form">
          <header>
            <h3>Contact Us</h3>
            <p>Learn about our company profile, communityimpact, sustainable motivation, and more.</p>
          </header>
          <footer>
            <form action="product-listing.html" method="post">
              <div class="form-group">
                <label>Name<span>*</span></label>
                <input class="form-control" type="text">
              </div>
              <div class="form-group">
                <label>Email<span>*</span></label>
                <input class="form-control" type="email">
              </div>
              <div class="form-group">
                <label>Your message<span>*</span></label>
                <textarea class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group text-center">
                <button class="ps-btn">Send Message<i class="fa fa-angle-right"></i></button>
              </div>
            </form>
          </footer>
        </div>
      </div>