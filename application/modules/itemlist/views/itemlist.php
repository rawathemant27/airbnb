<!-- Page title -->
<?php  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];  ?>
        <!-- <section id="page-title" data-parallax-image="images/parallax/5.jpg">
            <div class="container">
                <div class="page-title">
                    <h1>Shop</h1>
                    <span>Sidebar Left</span>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Shop</a>
                        </li>
                        <li class="active"><a href="#">Sidebar Left</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section> -->
        <!-- end: Page title -->

        <!-- Shop products -->
        <section id="page-content" class="sidebar-left">
            <div class="container">
                <div class="row">
                    <!-- Content-->
                    <div class="content col-md-9">

                        <!-- <div class="row m-b-20">
                            <div class="col-md-6 p-t-10 m-b-20">
                                <h3 class="m-b-20">A Monochromatic Spring ’15</h3>
                                <p>Lorem ipsum dolor sit amet. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias.</p>
                            </div>
                            <div class="col-md-3">
                                <div class="order-select">
                                    <h6>Sort by</h6>
                                    <p>Showing 1&ndash;12 of 25 results</p>
                                    <form method="get">
                                        <select>
                                            <option selected="selected" value="order">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="order-select">
                                    <h6>Sort by Price</h6>
                                    <p>From 0 - 190$</p>
                                    <form method="get">
                                        <select>
                                            <option selected="selected" value="">0$ - 50$</option>
                                            <option value="">51$ - 90$</option>
                                            <option value="">91$ - 120$</option>
                                            <option value="">121$ - 200$</option>
                                        </select>
                                    </form>
                                </div>
                            </div>


                        </div> -->
                        <!--Product list-->
                        <div class="shop">
                            <div class="grid-layout grid-3-columns" data-item="grid-item">
                            <?php if(!empty($productList)){
                              foreach ($productList as $key => $value) {

                               $getNumberOfReview = getNumberOfReview($value->itemId); 
                                $avgRating = avgRating($value->itemId); 
                                $avgRating = round($avgRating);   
                                if(isset($_SESSION['userId']) && $_SESSION['userId'] != '')
                                 $checkAlreadyAdded = checkAlreadyAdded($value->itemId,$_SESSION['userId']);

                                ?>
                                <div class="grid-item">
                                    <div class="product">
                                        <div class="product-image">
                                            <a href="#"><img alt="image" src="<?php echo base_url('uploads/thumb/').$value->image; ?>" >
                                            </a>
                                            <a href="#"><img alt="image" src="<?php echo base_url('uploads/thumb/').$value->image; ?>">
                                            </a>
                                            <span class="product-wishlist">
                                            <a href="javascript:void(0)" onclick="savefav(<?php echo $value->itemId; ?>)"><i class="fa fa-heart"></i></a>
                                            </span>
                                            <!-- <div class="product-overlay">
                                                <a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
                                            </div> -->
                                        </div>

                                        <div class="product-description">
                                            <div class="product-category"><?php echo $value->categoryName; ?></div>
                                            <div class="product-title">
                                                <h3><a href="<?php echo base_url('home/product_detail/').$value->itemId; ?>"><?php echo $value->itemName; ?></a></h3>
                                            </div>
                                            <div class="product-price"><ins><?php echo $value->price; ?></ins>
                                            </div>
                                            <div class="product-rate">
                                                <?php 
                                                 for ($i=0; $i < 5; $i++) { 
                                               
                                               if($i >= $avgRating){
                                                    echo '<i class="fa fa-star-o"></i>';
                                                 }else{
                                                    echo '<i class="fa fa-star"></i>';
                                                     }
                                                  }
                                             ?>
                                            </div>
                                            <div class="product-reviews"><a href="#"><?php echo $getNumberOfReview; ?> customer reviews</a>
                                            </div>

                                        <form action="<?php echo site_url('home/addtocart'); ?>" role="form" id="addtocart" method="post" class="validate form-horizontal" enctype="multipart/form-data">
                                             <div class="col-md-6">
                                             <input type="hidden" name="qty" value="1">
                                             <input type="hidden" name="itemId" value="<?php echo $value->itemId; ?>">
                                            <h6><?php if( isset($value->itemType) && $value->itemType > 1 ){ echo "Bundle($value->numOfItem)"; }else{ echo 'Single'; } ?></h6>
                                             <button type="submit" value="submit" name="submit" <?php echo isset($checkAlreadyAdded) && $checkAlreadyAdded == '1' ? 'disabled' : ''; ?>  class="btn">
                                             <i class="fa fa-shopping-cart">
                                             </i> <?php echo isset($checkAlreadyAdded) && $checkAlreadyAdded == '1' ? 'Added' : 'Add to cart'; ?> </button>
                                        </div>

                                         <input type="hidden" name="totalCredit" value="<?php echo $totalcredit; ?>">
                                         <input type="hidden" name="itemCredit" value="<?php echo $value->credits; ?>">

                                        </form>

                                        </div>
                                    </div>
                                </div>
                                 <?php } }else{ ?>
                                 <p>Sorry, nothing here today. Please browse for other items</p>
                                 <p>
                                     <div id="top-search">
                                          <form  method="get" action="<?php echo base_url('itemlist/bykeyword'); ?>">
                                             <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">

                                           <div class="col-md-12 form-group">
                                            
                                            <button type="submit" name="submit" class="btn btn-default">Search</button>

                                         </div>

                                          </form>
                                       </div>

                                 </p>
                            <?php } ?>
                            </div>
                            <!--  <hr>
                            <!-- Pagination -->
                          <!--   <div class="pagination">
                                <ul>
                                    <li>
                                        <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left"></i></span> </a>
                                    </li>
                                    <li><a href="#">1</a> </li>
                                    <li><a href="#">2</a> </li>
                                    <li class="active"><a href="#">3</a> </li>
                                    <li><a href="#">4</a> </li>
                                    <li><a href="#">5</a> </li>
                                    <li>
                                        <a href="#" aria-label="Next"> <span aria-hidden="true"><i class="fa fa-angle-right"></i></span> </a>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- end: Pagination -->
                        </div>
                        <!--End: Product list-->
                    </div>
                    <!-- end: Content-->

                    <!-- Sidebar-->
                    <div class="sidebar col-md-3">
                        <!--widget newsletter-->
                        <div class="widget clearfix widget-archive">
                            <h4 class="widget-title">Product categories</h4>
                            <ul class="list list-lines">
                             <?php if(!empty($categoryData)){
                                 foreach ($categoryData as $key => $value) {
                                  ?>
                                 <li><a href="<?php echo base_url('itemlist/byid/').$value->categoryId; ?>"><?php echo $value->categoryName; ?></a> <span class="count">(<?php echo $value->NumberOfProduct; ?>)</span>
                                </li>
                                <?php }  } ?>
                            </ul>
                        </div>

        
                        <!-- <div class="widget clearfix widget-newsletter">
                            <form class="form-inline" method="get" action="#">
                                <h4 class="widget-title">Subscribe for Latest Offers</h4>
                                <small>Subscribe to our Newsletter to get Sales Offers &amp; Coupon Codes etc.</small>
                                <div class="input-group">

                                    <input type="email" placeholder="Enter your Email" class="form-control required email" name="widget-subscribe-form-email" aria-required="true">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div> -->


                    </div>
                    <!-- end: Sidebar-->
                </div>
            </div>
        </section>
        <!-- end: Shop products -->


        <!-- DELIVERY INFO -->
      <!--   <section class="background-grey p-t-40 p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-gift"></i></a>
                            </div>
                            <h3>Free shipping on orders $60+</h3>
                            <p>Order more than 60$ and you will get free shippining Worldwide. More info.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-plane"></i></a>
                            </div>
                            <h3>Worldwide delivery</h3>
                            <p>We deliver to the following countries: USA, Canada, Europe, Australia</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-history"></i></a>
                            </div>
                            <h3>60 days money back guranty!</h3>
                            <p>Not happy with our product, feel free to return it, we will refund 100% your money!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end: DELIVERY INFO -->
