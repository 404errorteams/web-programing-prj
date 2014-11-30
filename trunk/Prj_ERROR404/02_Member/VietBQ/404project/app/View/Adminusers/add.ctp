
<legend><?php echo $title_for_layout ?></legend>
<?php echo $this->Session->flash(); ?>
<div>
    <form class="form-horizontal" id="viewdata" enctype="multipart/form-data" method="post" action="">
        <div class="control-group">		
            <label class="control-label" for="id_user">ID :</label>
            <div class="controls">
                <input type="text" name="id_user" >
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
            <label class="control-label" for="username">UserName : </label>
            <div class="controls">
                <input type="text" name="username"  >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="password">Password : </label>
            <div class="controls">
                <input type="password" name="password">
            </div>
        </div>
        
        <div class="control-group">		
            <label class="control-label" for="birth">Birthday : </label>
            <div class="controls">
                <input type="date" name="birth" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="gender">Gender : </label>
            <div class="controls">
                <select name="gender" style="width:100px;">
                    <?php 
                        $genders = GlobalVar::read('user_gender');
                        foreach ($genders as $key => $gender){
                            
                             echo "<option value='".$key."' >".$gender."</option>";
                            
                        }
                        
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">		
            <label class="control-label" for="mail">Email : </label>
            <div class="controls">
                <input type="email" name="mail"  >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="facebok">Facebook : </label>
            <div class="controls">
                <input type="url" name="facebook" >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="balance">Balance : </label>
            <div class="controls">
                <input type="number" name="balance"  >
            </div>
        </div>
       
        <div class="control-group">		
            <label class="control-label" for="created">Time Created : </label>
            <div class="controls">
                <input type="datetime" name="created"  >
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="nearest">Nearest login: </label>
            <div class="controls">
                <input type="datetime" name="nearest" >
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" id="update" class="btn btn-primary" name="adduser" value="Add User" >
            <a href="adminusers/index" id="cancel" class="btn" name="cancel" >Cancel</a>
        </div>
    </form>
</div>


