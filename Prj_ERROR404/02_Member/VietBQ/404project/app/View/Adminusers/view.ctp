
<legend><?php echo $title_for_layout ?></legend>
<?php echo $this->Session->flash(); ?>
<div>
    <form class="form-horizontal" id="viewdata" enctype="multipart/form-data" method="post" action="">
        <div class="control-group">		
            <label class="control-label" for="id_user">ID :</label>
            <div class="controls">
                <input type="text" name="id" value="<?php echo $User['User']['id_user']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="image_uset">Avatar: </label>
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
                <input type="text" name="username" value="<?php echo $User['User']['username']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="password">Password : </label>
            <div class="controls">
                <input type="text" name="password" value="<?php echo $User['User']['password']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="birth">Birthday : </label>
            <div class="controls">
                <input type="text" name="birth" value="<?php echo $User['User']['birth']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="birth">Gender : </label>
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
                <input type="text" name="mail" value="<?php echo $User['User']['mail']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="facebok">Facebook : </label>
            <div class="controls">
                <?php 
                if(!empty($User['User']['facebook'])){
                    echo "<a title='' href='".$User['User']['facebook']."'" ." target='_blank'>". $User['User']['facebook'] ."</a>";
                }
                ?>
               
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="balance">Balance : </label>
            <div class="controls">
                <input type="text" name="balance" value="<?php echo $User['User']['balance']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="mail">Email : </label>
            <div class="controls">
                <input type="text" name="mail" value="<?php echo $User['User']['mail']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="created">Time Created : </label>
            <div class="controls">
                <input type="text" name="created" value="<?php echo $User['User']['created']; ?>" disabled>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="nearest">Nearest login: </label>
            <div class="controls">
                <input type="text" name="nearest" value="<?php echo $User['User']['nearest']; ?>" disabled>
            </div>
        </div>

        <div class="form-actions">

            <a href="adminusers/index" id="cancel" class="btn" name="ok" >Ok</a>
        </div>
    </form>
</div>


