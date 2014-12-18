<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <section class="span12 slider">
            <section class="main-slider">
                <div class="bb-custom-wrapper">
                    <div id="bb-bookblock" class="bb-bookblock" style="perspective: 1500px;">
                        <div class="bb-item" style="display: block;">
                            <div class="bb-custom-content">
                                <div class="slide-inner">
                                    <div class="span4 book-holder"> 
                                        
                                        <?php
                                    if( isset($BookRand[0]['Book']['img']) && !empty($BookRand[0]['Book']['img']))
                                    {
                                        echo '<a href="book/book_detail/'.$BookRand[0]['Book']['id_book'].'">';
                                        $img_path =  IMAGE_UPLOAD_PATH_BOOK . $BookRand[0]['Book']['img'];

                                        if(file_exists($img_path)){
                                             echo "<img".' style="height: 325px ;width: 244px"'." alt='' src='" . IMAGE_UPLOAD_BOOK.$BookRand[0]['Book']['img']. "' display: inline; visibility: visible;' />";
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

                                        <div class="cart-price"> <a class="cart-btn2" href="cart.html">Add to Cart</a> <span class="price"><?php echo ($BookRand[0]['Book']['price']*(100-$BookRand[0]['Book']['sale'])/100) . " Đ" ?></span> </div>
                                    </div>
                                    <div class="span8 book-detail">
                                        <h2><?php echo $BookRand[0]['Book']['name'] ?></h2>
                                        <strong class="title"><?php echo 'By '.$BookRand[0]['Author']['name']  ?></strong> <span class="rating-bar"> <img src="img/test/raing-star2.png" alt="Rating Star"> </span> 
                                        <?php
                                        $session_id_user = $this->Session->read(SESSION_ID_USER);
                                        if($session_id_user){ ?>
                                        <a href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$BookRand[0]['Book']['id_book'] ?>" class="shop-btn">SHOP NOW</a>
                                        <?php } ?>
                                        <div class="cap-holder">
                                            <p><img src="img/test/image27.png" alt="Best Choice" align="right"> <?php echo substr($BookRand[0]['Book']['description'],0,100).'...'; ?></p>
                                            <a href="book-detail.html">Read More</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        for($i=1 ; $i< count($BookRand);$i++){
                        ?>
                        <div class="bb-item" style="display: none;">
                            <div class="bb-custom-content">
                                <div class="slide-inner">
                                    <div class="span4 book-holder"> 
                                        <a href="book/book_detail/<?php echo $BookRand[$i]['Book']['id_book']?>">;
                                            <?php
                                    if( isset($BookRand[$i]['Book']['img']) && !empty($BookRand[$i]['Book']['img']))
                                    {
                                        $img_path =  IMAGE_UPLOAD_PATH_BOOK . $BookRand[$i]['Book']['img'];

                                        if(file_exists($img_path)){
                                             echo "<img".' style="height: 325px ;width: 244px"'." alt='' src='" . IMAGE_UPLOAD_BOOK.$BookRand[$i]['Book']['img']. "' display: inline; visibility: visible;' />";
                                        }
                                        else{
                                            echo '<img '.'style="height: 325px;width: 244px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                        }
                                    }
                                    else{
                                        echo '<img '.'style="height: 325px;width: 244px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                    ?>
                                        </a>
                                        <div class="cart-price"> <a class="cart-btn2" href="cart.html">Add to Cart</a> <span class="price"><?php echo ($BookRand[$i]['Book']['price']*(100-$BookRand[$i]['Book']['sale'])/100) . " Đ" ?></span> </div>
                                    </div>
                                    <div class="span8 book-detail">
                                        <h2><?php echo $BookRand[$i]['Book']['name'] ?></h2>
                                        <strong class="title"><?php echo 'By '.$BookRand[$i]['Author']['name']  ?></strong> <span class="rating-bar"> <img src="img/test/raing-star2.png" alt="Rating Star"> </span> 
                                        <?php if($session_id_user){ ?>
                                        <a href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$BookRand[$i]['Book']['id_book'] ?>" class="shop-btn">SHOP NOW</a>
                                        <?php } ?>
                                        <div class="cap-holder">
                                            <p><img src="img/test/image27.png" alt="Best Choice" align="right"> <?php echo substr($BookRand[$i]['Book']['description'],0,100).'...'; ?></p>
                                            <a href="book-detail.html">Read More</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  } ?>

                    </div>
                </div>
                <nav class="bb-custom-nav"> <a href="#" id="bb-nav-prev" class="left-arrow">Previous</a> <a href="#" id="bb-nav-next" class="right-arrow">Next</a> </nav>
            </section>

            <section class="span12 wellcome-msg m-bottom first">
                <h2>WELCOME TO 404 EBOOK.</h2>
                <p>Offering a wide selection of books on thousands of topics at low prices to satisfy any book-lover!</p>
            </section>
        </section>
        <section class="row-fluid ">
            <?php foreach ($SaleBook as $saleBook){ ?>
            <figure class="span4 s-product">
                <div class="s-product-img"><a href="book/book_detail/<?php echo $saleBook['Book']['id_book']?>"><img style="height:128px; width:87px" src="<?php echo IMAGE_UPLOAD_BOOK .$saleBook['Book']['img']; ?>" alt="" class="pro-img"></a></div>
                <article class="s-product-det">
                    <h3><a href="book/book_detail/<?php echo $saleBook['Book']['id_book']?>"><?php echo substr($saleBook['Book']['name'],0,30); ?></a></h3>
                    <p><?php echo substr($saleBook['Book']['description'],0,150)."..."; ?></p>
                    <span class="rating-bar"><img src="img/test/rating-star.png" alt="Rating Star"></span>
                    <div class="cart-price"> <a href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$saleBook['Book']['id_book'] ?>" class="cart-btn2">Add to Cart</a> <span class="price"><?php echo $saleBook['Book']['price']." Đ";?></span> </div>
                    <span class="sale-icon">Sale<?php echo $saleBook['Book']['sale'].'%' ; ?></span> </article>
            </figure>
            <?php } ?>

        </section>
        <!-- Start BX Slider holder -->
        <section class="row-fluid features-books">
            <section class="span12 m-bottom">
                <div class="heading-bar">
                    <h2>Featured Books</h2>
                    <span class="h-line"></span> </div>
                <div class="bx-wrapper" style="max-width: 1262px;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 319px;">
                        <div class="slider1" style="width: 2795%; position: relative; -webkit-transition: 0s; transition: 0s; -webkit-transform: translate3d(-1584px, 0px, 0px);">
                        <?php foreach ($NewBook as $newBook){ ?>
                            <div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 142px; margin-right: 18px;">
                                <a href="book/book_detail/<?php echo $newBook['Book']['id_book']?>"><img style="height:207px; width:140px" src="<?php echo IMAGE_UPLOAD_BOOK .$newBook['Book']['img']; ?>" alt="" class="pro-img"></a> <span class="title"><a href="book-detail.html" title="<?php echo $newBook['Book']['name'] ?>"><?php echo substr($newBook['Book']['name'], 0,30)."..."; ?></a></span> <span class="rating-bar"><img src="img/test/rating-star.png" alt="Rating Star"></span>
                                <div class="cart-price"> <a class="cart-btn2" href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$newBook['Book']['id_book'] ?>">Add to Cart</a> <span class="price"><?php echo $newBook['Book']['price']." Đ"; ?></span> </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="bx-controls bx-has-pager bx-has-controls-direction">
                        <div class="bx-controls-direction">
                            <a class="bx-prev" href="<?php echo ROOT_URL.'book/list_view_book'; ?>">View More</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <section class="row-fluid features-books">
            <section class="span12 m-bottom">
                <div class="heading-bar">
                    <h2>Ebook Books</h2>
                    <span class="h-line"></span> </div>
                <div class="bx-wrapper" style="max-width: 1262px;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 319px;"><div class="slider1" style="width: 2795%; position: relative; -webkit-transition: 0s; transition: 0s; -webkit-transform: translate3d(-1584px, 0px, 0px);">
                            <?php foreach ($Ebook as $ebook){ ?>
                            <div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 142px; margin-right: 18px;">
                                <a href="book/book_detail/<?php echo $ebook['Book']['id_book']?>">
                                    <?php
                                    if( isset($ebook['Book']['img']) && !empty($ebook['Book']['img']))
                                    {
                                        $img_path =  IMAGE_UPLOAD_PATH_BOOK . $ebook['Book']['img'];

                                        if(file_exists($img_path)){
                                             echo "<a title=''".'style="height: 207px ;width: 140px"'." href='" . IMAGE_UPLOAD_BOOK .$ebook['Book']['img']. "?" . time() . "' target='_blank'><img".' style="height: 207px ;width: 140px"'." alt='' src='" . IMAGE_UPLOAD_BOOK.$ebook['Book']['img']. "' display: inline; visibility: visible;' /></a>";
                                        }
                                        else{
                                            echo '<img '.'style="height: 207px;width: 140px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                        }
                                    }
                                    else{
                                        echo '<img '.'style="height: 207px;width: 140px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                    ?>
                                </a> 
                                <span class="title">
                                    <a href="book/book_detail/<?php echo $ebook['Book']['id_book']?>" title="<?php echo $ebook['Book']['name'] ?>"><?php echo substr($ebook['Book']['name'], 0,30)."..."; ?></a>
                                </span> 
                                <span class="rating-bar">
                                    <img src="img/test/rating-star.png" alt="Rating Star">
                                </span>
                                <div class="cart-price"> <a class="cart-btn2" href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$ebook['Book']['id_book'] ?>">Add to Cart</a> <span class="price"><?php echo $ebook['Book']['price']." Đ"; ?></span> </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bx-controls bx-has-pager bx-has-controls-direction">
                        <div class="bx-pager bx-default-pager">
                            <div class="bx-pager-item">
                                <a href="" data-slide-index="0" class="bx-pager-link active">1</a>
                            </div>
                            <div class="bx-pager-item">
                                <a href="" data-slide-index="1" class="bx-pager-link">2</a>
                            </div>
                        </div>
                        <div class="bx-controls-direction">
                            <a class="bx-prev" href="">Prev</a>
                            <a class="bx-next" href="">Next</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- End BX Slider holder -->
        <!-- Start Featured Author -->
        <section class="row-fluid m-bottom">
            <section class="span12">
                <div class="featured-author">
                    <div class="left"> 
                        <span class="author-img-holder">
                            <a href="<?php echo ROOT_URL.'author/author_detail/'.$Author['Author']['id_author']; ?>">
                                <?php
                                if( isset($Author['Author']['img']) && !empty($Author['Author']['img']))
                                {
                                    $img_path =  IMAGE_UPLOAD_PATH_AUTHOR . $Author['Author']['img'];

                                    if(file_exists($img_path)){
                                         echo "<img".' style="height: 141px ;width: 144px"'." alt='' src='" . IMAGE_UPLOAD_AUTHOR.$Author['Author']['img']. "' display: inline; visibility: visible;' /";
                                    }
                                    else{
                                        echo '<img '.'style="height: 141px;width: 144px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . AUTHOR_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                }
                                else{
                                    echo '<img '.'style="height: 141px;width: 144px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . AUTHOR_DEFAULT_IMAGE . '?' . time() . '" />';
                                }
                                ?>
                            </a>
                        </span>
                        <div class="author-det-box">
                            <div class="ico-holder" style="margin-top: 20px">
                                <div id="socialicons" class="hidden-phone">
                                    <a id="social_linkedin" class="social_active" href="#" title="Visit Google Plus page"><span></span>
                                    </a>
                                    <a id="social_facebook" class="social_active" href="#" title="Visit Facebook page"><span></span></a> 
                                    <a id="social_twitter" class="social_active" href="#" title="Visit Twitter page"><span></span></a> </div>
                            </div>
                            <div class="author-det"> <span class="title">Featured Author</span> <span class="title2"><?php echo $Author['Author']['name'] ?></span>
                                <ul class="books-list">
                                    <?php 
                                    if(isset($BookofAuth)){
                                    foreach ($BookofAuth as $bookofauth) ?>
                                    <li>
                                        <?php
                                if( isset($bookofauth['Book']['img']) && !empty($bookofauth['Book']['img']))
                                {
                                    $img_path =  IMAGE_UPLOAD_PATH_BOOK . $bookofauth['Book']['img'];

                                    if(file_exists($img_path)){
                                         echo "<a title=''".'style="height: 83px ;width: 59px"'." href='book/book_detail/".$bookofauth['Book']['id_book'] . "' target='_blank'><img".' style="height: 83px ;width: 59px"'." alt='' src='" . IMAGE_UPLOAD_BOOK.$bookofauth['Book']['img']. "' display: inline; visibility: visible;' /></a>";
                                    }
                                    else{
                                        echo '<img '.'style="height: 83px;width: 59px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                }
                                else{
                                    echo '<img '.'style="height: 83px;width: 59px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                }
                                ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <?php if(isset($FeaturedBook)){ ?>
                        <div class="current-book"> 
                            <strong class="title">
                                <a href="book/book_detail/<?php echo $FeaturedBook['Book']['id_book']?>"><?php echo $FeaturedBook['Book']['name'] ?>
                                </a>
                            </strong>
                            <p><?php echo substr($FeaturedBook['Book']['description'],0,100)."..."; ?></p>
                            <div class="cart-price"> 
                                <a href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$FeaturedBook['Book']['id_book'] ?>" class="cart-btn2">Add to Cart</a> 
                                <span class="price"><?php echo $FeaturedBook['Book']['price'] ?></span> 
                            </div>
                        </div>
                        <div class="c-b-img">
                        <?php
                                if( isset($FeaturedBook['Book']['img']) && !empty($FeaturedBook['Book']['img']))
                                {
                                    $img_path =  IMAGE_UPLOAD_PATH_BOOK . $FeaturedBook['Book']['img'];

                                    if(file_exists($img_path)){
                                         echo "<a href='book/book_detail/".$FeaturedBook['Book']['id_book']."'><img".' style="height: 165px ;width: 107px"'." alt='' src='" . IMAGE_UPLOAD_BOOK.$FeaturedBook['Book']['img']. "' display: inline; visibility: visible;' /></a>";
                                    }
                                    else{
                                        echo '<img '.'style="height: 165px;width: 107px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                }
                                else{
                                    echo '<img '.'style="height: 165px;width: 107px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                }
                                ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            
        </section>
        <!-- End Featured Author -->

    </section>