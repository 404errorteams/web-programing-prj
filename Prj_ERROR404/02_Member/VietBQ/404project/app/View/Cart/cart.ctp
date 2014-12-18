<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <!-- Start Main Content -->
        <section class="span12 cart-holder">
            <div class="heading-bar">
                <h2>SHOPPING CART</h2>
                <span class="h-line"></span>
                <a href="<?php echo ROOT_URL.'book/index' ?>" class="more-btn">proceed to checkout</a>
            </div>
            <div class="cart-table-holder">
                <form >
                    <table width="100%" border="0" cellpadding="10">
                        <tbody><tr>
                                <th width="14%">&nbsp;</th>
                                <th width="43%" align="left">Product Name</th>
                                <th width="6%"></th>
                                <th width="6%">Status</th>
                                <th width="10%">Unit Price</th>
                                <th width="10%">Quantity</th>
                                <th width="12%">Subtotal</th>
                                <th width="5%">&nbsp;</th>
                            </tr>
                            <?php 
                            $total =0;
                            foreach ($YourCart as $yourCart){ ?>
                            <tr bgcolor="#FFFFFF" class=" product-detail">
                                <td valign="top">
                                <?php
                                    if( isset($yourCart['Book']['img']) && !empty($yourCart['Book']['img']))
                                    {
                                        echo '<a href="book/book_detail/'.$yourCart['Book']['id_book'].'">';
                                        $img_path =  IMAGE_UPLOAD_PATH_BOOK . $yourCart['Book']['img'];

                                        if(file_exists($img_path)){
                                             echo "<img".' style="height: 189px ;width: 128px"'." alt='' src='" . IMAGE_UPLOAD_BOOK.$yourCart['Book']['img']. "' display: inline; visibility: visible;' />";
                                        }
                                        else{
                                            echo '<img '.'style="height: 189px;width: 128px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                        }
                                    }
                                    else{
                                        echo '<img '.'style="height: 189px;width: 128px"'.' alt="" src="' . ROOT_URL ."app/webroot/img/" . BOOK_DEFAULT_IMAGE . '?' . time() . '" />';
                                    }
                                    echo '</a>';
                                    ?>

                                </td>
                                <td valign="top"><?php echo $yourCart['Book']['name'] ?></td>
                                <td align="center" valign="top"><a href="#" >Edit</a></td>
                                <td align="center" valign="top"><?php echo $yourCart['Book']['price']. " Đ" ?></td>
                                <td align="center" valign="top">
                                    <input name="" type="text" value="<?php echo $yourCart['Bought']['amount'] ?>"></td>
                                <td align="center" valign="top">
                                    <?php 
                                    $total += ($yourCart['Book']['price']*(100-$yourCart['Book']['sale'])/100)*$yourCart['Bought']['amount'];
                                    echo ($yourCart['Book']['price']*(100-$yourCart['Book']['sale'])/100)*$yourCart['Bought']['amount'] . " Đ";
                                    ?>
                                
                                </td>
                                <td align="center" valign="top"><a href="#"> <i class="icon-trash"></i></a></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </form>
                <div class="blog-footer">
                    <div class="pagination">  
                    <?php echo $this->element('ebook_pagination'); ?>
                    </div>

                </div>
            </div>

            <figure class="span8 first">
                
            </figure>
            <figure class="span4 price-total">
                <div class="cart-option-box">
                    <table width="100%" border="0" cellpadding="10" class="total-payment">
                        <tbody><tr>
                                <td width="55%" align="right"><strong>Subtotal</strong></td>
                                <td width="45%" align="left"><?php echo $total.' Đ'; ?></td>
                            </tr>
                            <tr>
                                <td align="right"><strong class="large-f">GRAND TOTAL</strong></td>
                                <td align="left"><strong class="large-f"><?php echo $total.' Đ'; ?></strong></td>
                            </tr>
                        </tbody></table>
                    <hr>
                    <a href="<?php echo ROOT_URL.'book/index' ?>" class="more-btn">proceed to checkout</a>
                    <p>Checkout with Multiple Addresses</p>
                </div>
            </figure>
        </section>
        <!-- End Main Content -->
    </section>
</section>