<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<section class="top-nav-bar">
    <section class="container-fluid container">
        <section class="row-fluid">
            <section class="span8">
                <ul class="top-nav">
                    <li><a href="<?php echo ROOT_URL. 'book/index' ?>" class="active">404Ebook</li>
                    <li><a href="<?php echo ROOT_URL. 'book/list_view_book' ?>">Online Store</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </section>
            <section class="span4 e-commerce-list">
                <?php 
                $session_user = $this->Session->read(SESSION_USER);
                $session_id_user = $this->Session->read(SESSION_ID_USER);
                ?>
                <ul>
                    <li>Welcome! 
                        <?php 
                        if($session_user){
                            echo $session_user;
                            echo ' | ';
                            echo '<a href="'.ROOT_URL.'user/logout">Logout</a>';
                        }else{
                        ?>
                        | <a href="<?php echo ROOT_URL.'user/register' ?>">Login</a> or <a href="<?php echo ROOT_URL.'user/register' ?>">Create an account</a>
                        <?php } ?>
                    </li>

                </ul>
                <div class="c-btn"> <a href="<?php echo ROOT_URL. 'cart/cart/'.$session_id_user ?>" class="cart-btn">Cart</a>
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">0 item(s) - $0.00<span class="caret"></span></button>
                        <ul class="dropdown-menu">

                        </ul>
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>
<header id="main-header">
    <section class="container-fluid container">
        <section class="row-fluid">
            <section class="span4">
                <h1 id="logo"> <a href="book/index"><img src="img/404.png" /></a> </h1>
            </section>
            <section class="span8">
                <ul class="top-nav2">
                    <?php 
                    if(!empty($session_user)){
                    ?>
                    <li><a href="<?php echo ROOT_URL.'user/profile/'.$session_id_user ?>">My Account</a></li>
                    <li><a href="<?php echo ROOT_URL.'user/edit/'.$session_id_user ?>">Edit My Account</a></li>
                    <li><a href="<?php echo ROOT_URL.'cart/cart/'.$session_id_user ?>">My Cart</a></li>
                    <?php } ?>
                </ul>
                <div class="search-bar">
                    <input name="" type="text" value="search entire store here..." />
                    <input name="" type="button" value="Serach" style="padding-bottom: 5px;">
                </div>
            </section>
        </section>
    </section>
    <!-- Start Main Nav Bar -->
    <nav id="nav">
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> </button>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li style="margin-left: 30px"> <a href="<?php echo ROOT_URL.'book/index'?>">Homepage</a> </li>
                        <li style="margin-left: 30px"> <a href="<?php echo ROOT_URL.'book/list_view_book'?>">Newbook</a></li>
                        <li style="margin-left: 30px"> <a href="<?php echo ROOT_URL.'book/list_view_book'?>">Hotbook</a></li>
                        <li style="margin-left: 30px"> <a href="<?php echo ROOT_URL.'book/list_view_book'?>">Ebook</a></li>
                        <li style="margin-left: 30px"> <a href="<?php echo ROOT_URL.'author/list_view_author'?>">Author</a></li>
                        <li style="margin-left: 30px"> <a href="<?php echo ROOT_URL.'book/list_view_book'?>">Category</a></li>
                        

                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /.navbar-inner -->
        </div>
        <!-- /.navbar -->
    </nav>
    <!-- End Main Nav Bar -->
</header>