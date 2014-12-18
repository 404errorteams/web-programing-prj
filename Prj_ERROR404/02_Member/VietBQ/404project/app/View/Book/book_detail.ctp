<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$session_id_user = $this->Session->read(SESSION_ID_USER);
?>
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2>Book Detail</h2>
            <span class="h-line"></span>
        </div>
        <!-- Start Main Content -->
        <section class="span9 first">
            <!-- Start Ad Slider Section -->
            <div class="blog-sec-slider">
                <div class="bx-wrapper" style="max-width: 870px;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 273px;"><div class="slider5" style="width: 645%; position: relative; left: -1740px;"><div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image36.jpg" alt=""></a></div>
                            <div class="slide" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div></div></div><div class="bx-controls bx-has-pager bx-has-controls-direction"><div class="bx-pager bx-default-pager"><div class="bx-pager-item"><a href="" data-slide-index="0" class="bx-pager-link">1</a></div><div class="bx-pager-item"><a href="" data-slide-index="1" class="bx-pager-link active">2</a></div><div class="bx-pager-item"><a href="" data-slide-index="2" class="bx-pager-link">3</a></div></div><div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next" href="">Next</a></div></div></div>
            </div>
            <!-- End Ad Slider Section -->

            <!-- Strat Book Detail Section -->
            <section class="b-detail-holder">
                <article class="title-holder">
                    <div class="span6">
                        <h4><strong><?php echo $Book['Book']['name']; ?></strong> by <?php echo $Book['Author']['name']; ?></h4>
                    </div>
                    <div class="span6 book-d-nav">
                        <ul>
                            <li><a href="#">2 Reviews</a></li>
                            <li><i class="icon-envelope"></i><a href="#">  Email to a Friend</a></li>
                        </ul>
                    </div>
                </article>
                <div class="book-i-caption">
                    <!-- Strat Book Image Section -->
                    <div class="span6 b-img-holder">
                        <span class="zoom" id="ex1" style="position: relative; overflow: hidden;">
                            <?php
                            if( isset($Book['Book']['img']) && !empty($Book['Book']['img']))
                            {
                            echo '<a href="book/book_detail/'.$Book['Book']['id_book'].'">';
                                $img_path =  IMAGE_UPLOAD_PATH_BOOK . $Book['Book']['img'];

                                if(file_exists($img_path)){
                                echo "<img".' height="219" width="300" '." alt='' src='" . IMAGE_UPLOAD_BOOK.$Book['Book']['img']. "' display: inline; visibility: visible;' />";
                                echo '<img src="'. IMAGE_UPLOAD_BOOK.$Book['Book']['img'].'" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 398px; height: 530px; border: none; max-width: none;">';
                                    }
                                    else{
                                    echo '<img '.'style="height: 325px;width: 244px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                    }
                                    else{
                                    echo '<img '.'style="height: 325px;width: 244px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                    echo '</a>';
                            ?>
                        </span>
                    </div>
                    <!-- Strat Book Image Section -->

                    <!-- Strat Book Overview Section -->    
                    <div class="span6">
                        <strong class="title">Quick Overview</strong>
                        <p><?php echo substr($Book['Book']['description'],0,2000)."..."; ?> </p>
                        <p>Availability: <a href="#">In stock</a></p>
                        <div class="comm-nav">
                            <strong class="title2">Quantity</strong>
                            <ul>
                                <li><input name="" type="text"></li>
                                <li class="b-price"><?php echo ($Book['Book']['price']*(100-$Book['Book']['sale'])/100)." Đ"; ?></li>
                                <li><a href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$Book['Book']['id_book'] ?>" class="more-btn">+ Add to Cart</a></li>
                            </ul>
                            <a href="#">Add to Wishlist</a>
                        </div>
                    </div>
                    <!-- End Book Overview Section -->
                </div>

                <!-- Start Book Summary Section -->
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#pane1" data-toggle="tab">Description</a></li>
                        <li><a href="#pane2" data-toggle="tab">Description by 404</a></li>
                        <li><a href="#pane2" data-toggle="tab">Description by Pro</a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="pane1" class="tab-pane active">
                            <p><?php echo $Book['Book']['description']; ?></p>
                        </div>
                        <div id="pane2" class="tab-pane">

                            <p><?php echo $Book['Book']['description404']; ?></p>
                        </div>
                        <div id="pane3" class="tab-pane">

                            <p><?php echo $Book['Book']['descriptionpro']; ?></p>
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- /.tabbable -->
                <!-- End Book Summary Section -->

                <!-- Start BX Slider holder -->  
                <section class="related-book">
                    <div class="heading-bar">
                        <h2>Related Books</h2>
                        <span class="h-line"></span>
                    </div>
                    <?php if(isset($RelateBook)){ ?>
                    <div class="bx-wrapper" style="max-width: 674px;">
                        <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 319px;">
                            <div class="slider6" style="width: 860%; position: relative; -webkit-transition: 0s; transition: 0s; -webkit-transform: translate3d(-844px, 0px, 0px);">
                                <?php foreach ($RelateBook as $relateBook) ?>
                                <div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 155px; margin-right: 18px;">
                                    <a href="book/book_detail/<?php echo $relateBook['Book']['id_book'] ?>">
                                        <?php
                                        if( isset($relateBook['Book']['img']) && !empty($relateBook['Book']['img']))
                                        {
                                            $img_path =  IMAGE_UPLOAD_PATH_BOOK . $relateBook['Book']['img'];

                                            if(file_exists($img_path)){
                                            echo "<img".' style="height: 200px;width: 140px" '." alt='' src='" . IMAGE_UPLOAD_BOOK.$relateBook['Book']['img']. "' display: inline; visibility: visible;' />";
                                                }
                                                else{
                                                echo '<img '.'style="height: 200px;width: 140px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                                }
                                                }
                                                else{
                                                echo '<img '.'style="height: 200px;width: 140px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                                }
                                               
                                        ?>
                                    </a>
                                    <span class="title"><a href="book/book_detail/<?php echo $relateBook['Book']['id_book'] ?>"><?php echo substr($relateBook['Book']['name'],0,30)."..." ?></a></span>
                                    <span class="rating-bar"><img src="img/test/rating-star.png" alt="Rating Star"></span>
                                    <div class="cart-price">
                                        <a class="cart-btn2" href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$relateBook['Book']['id_book'] ?>">Add to Cart</a>
                                        <span class="price"><?php echo ($relateBook['Book']['price']*(100-$relateBook['Book']['sale'])/100)." Đ"; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bx-controls bx-has-pager bx-has-controls-direction">
                            <div class="bx-pager bx-default-pager">
                                <div class="bx-pager-item">
                                    <a href="" data-slide-index="0" class="bx-pager-link active">1</a>
                                </div>
                            </div>
                            <div class="bx-controls-direction">
                                <a class="bx-prev disabled" >Prev</a>
                                <a class="bx-next disabled" >Next</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </section>
                <!-- End BX Slider holder -->

                <!-- Stsrt Customer Reviews Section -->
                <section class="reviews-section">
                    <figure class="right-sec">
                        <div class="r-title-bar">
                            <strong>Write Your Own Review</strong>
                        </div>
                        <ul class="review-f-list">
                            <li>
                                <label>Your name *</label>
                                <input name="" type="text">
                            </li>
                            <li>
                                <label>Summary of your review *</label>
                                <input name="" type="text">
                            </li>
                            <li>
                                <label>Your review *</label>
                                <textarea name="" cols="2" rows="20"></textarea>
                            </li>
                            <li>
                                <label>How do you rate this book? *</label>
                                <div class="rating-list">
                                    <div class="rating-box">
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Star 1
                                        </label>
                                    </div>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Star 2
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                        Star 3
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Star 4
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Star 5
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="grey-btn left-btn">Write Your Own Review</a>
                    </figure>
                </section>
                <!-- End Customer Reviews Section -->
            </section>
            <!-- Strat Book Detail Section -->
        </section>
        <!-- End Main Content -->

        <!-- Start Main Side Bar -->
        
        
        <?php echo $this->element("ebook_navbar_right"); ?>
        
        
        <!-- End Main Side Bar -->
    </section>
</section>