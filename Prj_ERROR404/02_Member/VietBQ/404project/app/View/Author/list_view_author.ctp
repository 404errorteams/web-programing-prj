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
            <h2><?php echo $title_for_layout ?></h2>
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
                                <option>Position</option>
                                <option>Position 2</option>
                                <option>Position 3</option>
                                <option>Position 4</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
            <section class="grid-holder features-books">
                <?php 
                $i = 0;
                foreach ($Authors as $Author){
                    $i++;
                ?>
                <figure class="span4 slide <?php if($i ==1){ echo "first"; } ?>">
                    <a href="author/author_detail/<?php echo $Author['Author']['id_author'] ?>">
                    <?php
                    if( isset($Author['Author']['img']) && !empty($Author['Author']['img']))
                    {
                        $img_path =  IMAGE_UPLOAD_PATH_AUTHOR .$Author['Author']['img'];

                        if(file_exists($img_path)){
                            echo "<img".' style="height: 273px;width: 273px" '." alt='' src='" . IMAGE_UPLOAD_AUTHOR.$Author['Author']['img']. "' display: inline; visibility: visible;' />";
                        }else{
                            echo '<img '.'style="height: 273px;width: 273px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . AUTHOR_DEFAULT_IMAGE . '?' . time() . '" />';
                        }
                    }else{
                        echo '<img '.'style="height: 273px;width: 273px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . AUTHOR_DEFAULT_IMAGE . '?' . time() . '" />';
                    }
                                               
                    ?>
                    </a>
                    <span class="title"><a href="book/book_detail/<?php echo $Author['Author']['id_author'] ?>"><?php echo substr($Author['Author']['name'],0,30)."..." ?></a></span>
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