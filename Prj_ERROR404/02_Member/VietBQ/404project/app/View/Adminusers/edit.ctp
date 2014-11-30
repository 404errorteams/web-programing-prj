
<legend><?php echo $title_for_layout ?></legend>
<?php echo $this->Session->flash(); ?>
<div>
    <form class="form-horizontal" id="viewdata" enctype="multipart/form-data" method="post" action="">
        <div class="control-group">		
            <label class="control-label" for="id_user">ID :</label>
            <div class="controls">
                <input type="text" name="id_user" value="<?php echo $User['User']['id_user']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
                <label class="control-label" for="image">Upload image: </label>
                <div class="controls">
                    <input class="span5" type="file" size="29" id="image" name="image"/>
                    <span class="help-inline">
                        <p class="text-error">
                     <?php if (isset($errors_image)) { ?>
                            <strong>*</strong>
                        <?php
                        echo $errors_image;
                        }
                        ?>	
                        </p>
                    </span>
                </div>
                 
            </div>
        <div class="control-group">
            
            <label class="control-label" for="image_user">Avatar: </label>
            <div class="controls" style="margin-bottom: 5px; width: 255px;" >
                    <?php
                        if(isset($User['User']['avatar'])&& !empty($User['User']['avatar'])){
                            $img_path = IMAGE_UPLOAD_PATH_USER.$User['User']['avatar'];
                            if(file_exists($img_path)){
                                echo $this->Html->image(ROOT_URL . "img/user/" .$User['User']['avatar']."?".time(), array('alt' => '',));
                            }
                            else {
                                echo '<img class="img-thumbnail" alt="" src="'.ROOT_URL."app/webroot/img/".NO_IMAGE.'?'.time().'" />';
                            }
                        }else{
                            echo '<img class="img-thumbnail" alt="" src="'.ROOT_URL."app/webroot/img/".NO_IMAGE.'?'.time().'" />';
                        }
                        
                           
                    ?>

            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="username">UserName : </label>
            <div class="controls">
                <input type="text" name="username" value="<?php echo $User['User']['username']; ?>" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="password">Password : </label>
            <div class="controls">
                <input type="text" name="password" value="<?php echo $User['User']['password']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="new_password">New Password : </label>
            <div class="controls">
                <input type="password" name="new_password"  >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="birth">Birthday : </label>
            <div class="controls">
                <input type="date" name="birth" value="<?php echo $User['User']['birth']; ?>" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="gender">Gender : </label>
            <div class="controls">
                <select name="gender" style="width:100px;">
                    <?php 
                        $genders = GlobalVar::read('user_gender');
                        foreach ($genders as $key => $gender){
                            if($key == $User['User']['sex'] ){
                             echo "<option value='".$key."' selected >".$gender."</option>";
                            }
                            else{
                                echo "<option value='".$key."'  >".$gender."</option>";
                            }
                        }
                        
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">		
            <label class="control-label" for="mail">Email : </label>
            <div class="controls">
                <input type="email" name="mail" value="<?php echo $User['User']['mail']; ?>" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="facebok">Facebook : </label>
            <div class="controls">
                <input type="url" name="facebook" value="<?php echo $User['User']['facebook']; ?>" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="balance">Balance : </label>
            <div class="controls">
                <input type="number" name="balance" value="<?php echo $User['User']['balance']; ?>" >
            </div>
        </div>
       
        <div class="control-group">		
            <label class="control-label" for="created">Time Created : </label>
            <div class="controls">
                <input type="datetime" name="created" value="<?php echo $User['User']['created']; ?>" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="nearest">Nearest login: </label>
            <div class="controls">
                <input type="datetime" name="nearest" value="<?php echo $User['User']['nearest']; ?>" >
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" id="update" class="btn btn-primary" name="edituser" value="Update" >
            <a href="adminusers/index" id="cancel" class="btn" name="cancel" >Cancel</a>
        </div>
    </form>
</div>


