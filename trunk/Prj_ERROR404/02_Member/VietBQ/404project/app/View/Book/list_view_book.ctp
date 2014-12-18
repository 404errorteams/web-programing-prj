<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2><?php echo $title_for_layout;$session_id_user = $this->Session->read(SESSION_ID_USER); ?></h2>
            <span class="h-line"></span>
        </div>
        <!-- Start Main Content -->
        <section class="span9 first">
            <!-- Start Ad Slider Section -->
            <div class="blog-sec-slider">
                <div class="bx-wrapper" style="max-width: 870px;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 273px;"><div class="slider5" style="width: 645%; position: relative; left: -870px;"><div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div>
                            <div class="slide bx-clone" style="float: left; list-style: none; position: relative; width: 870px;"><a href="#"><img src="images/image22.jpg" alt=""></a></div></div></div><div class="bx-controls bx-has-pager bx-has-controls-direction"><div class="bx-pager bx-default-pager"><div class="bx-pager-item"><a href="" data-slide-index="0" class="bx-pager-link active">1</a></div><div class="bx-pager-item"><a href="" data-slide-index="1" class="bx-pager-link">2</a></div><div class="bx-pager-item"><a href="" data-slide-index="2" class="bx-pager-link">3</a></div></div><div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next" href="">Next</a></div></div></div>
            </div>
            <!-- End Ad Slider Section -->

            <!-- Start Grid View Section -->
            <div class="product_sort">
                <div class="row-1">
                    <div class="left">
                        <span class="s-title">Sort by</span>
                        <span class="list-nav">
                            <select name="">
                                
                            </select>
                        </span>
                    </div>
                </div>
            </div>
            <section class="grid-holder features-books">
                <?php 
                $i = 0;
                foreach ($Books as $Book){
                    $i++;
                ?>
                <figure class="span4 slide <?php if($i ==1){ echo "first"; } ?>">
                    <a href="book/book_detail/<?php echo $Book['Book']['id_book'] ?>">
                    <?php
                    if( isset($Book['Book']['img']) && !empty($Book['Book']['img']))
                    {
                        $img_path =  IMAGE_UPLOAD_PATH_BOOK . $Book['Book']['img'];

                        if(file_exists($img_path)){
                            echo "<img".' style="height: 273px;width: 273px" '." alt='' src='" . IMAGE_UPLOAD_BOOK.$Book['Book']['img']. "' display: inline; visibility: visible;' />";
                        }else{
                            echo '<img '.'style="height: 273px;width: 273px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                        }
                    }else{
                        echo '<img '.'style="height: 273px;width: 273px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                    }
                                               
                    ?>
                    </a>
                    <span class="title"><a href="book/book_detail/<?php echo $Book['Book']['id_book'] ?>"><?php echo substr($Book['Book']['name'],0,30)."..." ?></a></span>
                    <span class="rating-bar"><img src="img/test/rating-star.png" alt="Rating Star"></span>
                    <div class="cart-price">
                        <a class="cart-btn2" href="<?php echo ROOT_URL.'cart/add_cart/'.$session_id_user.'/'.$Book['Book']['id_book'] ?>">Add to Cart</a>
                        <span class="price"><?php echo ($Book['Book']['price']*(100-$Book['Book']['sale'])/100)." Đ"; ?></span>
                    </div>
                </figure>
                <?php 
                if($i == 3){
                    echo "<hr>";
                    $i =0;
                }
                } 
                ?>
            </section>
            <div class="blog-footer">
                <div class="pagination">  
                    <?php echo $this->element('ebook_pagination'); ?>
                </div>

            </div>
            <!-- End Grid View Section -->

        </section>
        <!-- End Main Content -->

        <!-- Start Main Side Bar -->
        <?php echo $this->element("ebook_navbar_right"); ?>
        <!-- End Main Side Bar -->
    </section>
</section>