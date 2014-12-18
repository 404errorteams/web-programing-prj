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
            <h2>Checkout</h2>
            <span class="h-line"></span> </div>
        <!-- Start Main Content -->
        <section class="checkout-holder">
            <section class="span12 first">
                <!-- Start Accordian Section -->
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        
                        <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Checkout Method </a></div>
                       
                        <div id="collapseOne" class="accordion-body collapse in">
                           
                            <div class="accordion-inner">
                                 <?php echo $this->Session->flash() ?>
                                <div class="span6 check-method-left"> <strong class="green-t">Checkout as a Guest or Register</strong>
                                    <p>Register with us for future convenience:</p>
                                    <?php if(isset($Register_Fail)){ ?>
                                    <font style="color: red"><p><?php echo $Register_Fail; ?></p></font>
                                    <?php } ?>
                                    <form class="form-horizontal" name="registerMailForm" action="user/register" onsubmit="return checkEmailRegister();" method="POST">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Email Address <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="email" id="registerEmail" name="data[register][User][mail]" class="inputRegister" placeholder="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Username <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" id="registerUsername" name="data[register][User][username]" class="inputRegister" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="password" id="registerPassword" name="data[register][User][password]" class="inputRegister" placeholder="" style="display: none;">
                                            </div>
                                            <label class="control-label" for="inputPassword">Verify Password <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="password" id="verifyPassword" class="inputRegister" placeholder="" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Gender <sup>*</sup></label>
                                            <div class="controls">
                                                <select class="inputRegister" name="data[register][User][sex]">
                                                    <?php
                                                    $sex = GlobalVar::read('user_gender');
                                                    foreach ($sex as $ks => $vs){
                                                    ?>
                                                    <option value="<?php echo $ks ?>"><?php echo $vs; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">BirthDay <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" id="datetimepicker" name="data[register][User][birth]" >
                                            </div>
                                        </div>
                                        <input type="submit" class="more-btn" value="Submit">
                                    </form>
                                </div>
                                <div class="span5 check-method-right"> <strong class="green-t">Login</strong>
                                    <p>Already registered? Please log in below:</p>
                                    
                                    <form class="form-horizontal"  name="loginMailForm" action="user/login" onsubmit="return checkEmailLogin();" method="POST">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Username <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="text" id="inputEmail" name="data[login][User][email]" placeholder="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password <sup>*</sup></label>
                                            <div class="controls">
                                                <input type="password" id="inputPassword" name="data[login][User][password]" placeholder="" style="display: none;">
                                            </div>
                                        </div>
                                        <p><a href="#">Forgot your password?</a></p>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="more-btn">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
