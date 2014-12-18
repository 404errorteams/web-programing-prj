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
            <h2>Edit Profile</h2>
            <span class="h-line"></span> </div>
        <!-- Start Main Content -->
        <section class="checkout-holder">
            <section class="span12 first">
                <!-- Start Accordian Section -->
                <div class="accordion" id="accordion2" >
                   
                    <div class="accordion-group" >
                        <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"> Billing Information </a> </div>
                        <div id="collapseTwo" class="accordion-body in collapse" style="height: auto;">
                            <div class="accordion-inner">
                                 <?php echo $this->Session->flash() ?>
                                <form class="form-horizontal" method="POST">
                                    <ul class="billing-form">
                                        <li>   
                                            <div class="control-group">
                                                <label class="control-label" for="inputFirstname">Username <sup>*</sup></label>
                                                <div class="controls">
                                                    <input hidden="" style="display: none" name="data[user][User][id_user]" value="<?php echo $Profile['User']['id_user'] ?>" >
                                                    <input type="text" id="inputFirstname" name="data[user][User][username]" placeholder="" value="<?php echo $Profile['User']['username'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputLastname">Password<sup>*</sup></label>
                                                <div class="controls">
                                                    <input type="password" id="inputLastname" name="password" placeholder="****************">
                                                </div>
                                            </div>

                                        </li>
                                        <li>   
                                            <div class="control-group">
                                                <label class="control-label" for="inputEmail">Email Address<sup>*</sup></label>
                                                <div class="controls">
                                                    <input type="text" id="inputEmail" class="address-field" value="<?php echo $Profile['User']['mail'] ?>" disabled>
                                                </div>
                                            </div>
                                        </li>
                                        <li>   
                                            <div class="control-group">
                                                <label class="control-label" for="inputAddress">Address<sup>*</sup></label>
                                                <div class="controls">
                                                    <input type="text" name="data[user][User][address]" id="inputAddress" placeholder="" value="<?php echo $Profile['User']['address'] ?>" class="address-field">
                                                </div>
                                            </div>
                                        </li>
                                        <li>   
                                            <div class="control-group">
                                                <label class="control-label" for="inputZip">Birth Day <sup>*</sup></label>
                                                <div class="controls">
                                                    <input type="text" id="datetimepicker" name="data[user][User][birth]" value="<?php echo date($Profile['User']['birth']) ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputTelephone">Telephone <sup>*</sup></label>
                                                <div class="controls">
                                                    <input type="text" id="datetimepicker" name="data[user][User][tel]" value="<?php echo $Profile['User']['tel'] ?>" >
                                                </div>
                                            </div>
                                        </li>
                                        <li>   
                                            <div class="control-group">
                                                <label class="control-label" for="inputTelephone">Facebook <sup>*</sup></label>
                                                <div class="controls">
                                                    <input type="text" id="inputFacebook" name="data[user][User][facebook]" class="address-field" value="<?php echo $Profile['User']['facebook'] ?>">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button type="submit" class="more-btn">Continue</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Accordian Section -->
            </section>

        </section>
        <!-- End Main Content -->
    </section>
</section>
