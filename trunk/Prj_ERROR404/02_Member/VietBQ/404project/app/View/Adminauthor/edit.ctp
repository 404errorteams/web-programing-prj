<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<legend><?php echo $title_for_layout ?></legend>
<?php echo $this->Session->flash(); ?>
<div>
    <form class="form-horizontal" id="editdata" enctype="multipart/form-data" method="post" action="">
        <div class="control-group">		
            <label class="control-label" for="id_author">ID :</label>
            <div class="controls">
                <b>
               <?php echo $Author['Author']['id_author']; ?>
                </b>
            </div>
        </div>

        <div class="control-group">		
            <label class="control-label" for="name">Name : </label>
            <div class="controls">
                <input type="text" name="name" value="<?php echo $Author['Author']['name']; ?>" >
            </div>


            <br>
            <div class="control-group">		
                <label class="control-label" for="biography">Biography: </label>
                <div class="controls">
                    <textarea class="span10" rows="10" name="biography" placeholder="update biograhy" id="biography"><?php echo $Author['Author']['biography'] ?></textarea>
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
                <label class="control-label" for="image_author">Image: </label>
                <div class="controls" style="margin-bottom: 5px;">
                    <?php
                        if(isset($Author['Author']['img'])&& !empty($Author['Author']['img'])){
                            $img_path = IMAGE_UPLOAD_PATH_AUTHOR.$Author['Author']['img'];
                            if(file_exists($img_path)){
                                echo $this->Html->image(ROOT_URL . "img/author/" .$Author['Author']['img']."?".time(), array('alt' => '',));
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


            <div class="form-actions">
                <input type="submit" id="update" class="btn btn-primary" name="editauthor" value="Update" >
                <a href="adminauthor/index" id="cancel" class="btn" name="cancel" >Cancel</a>
            </div>
    </form>
</div>
<script>
    $(document).ready(function() {

        $('#editdata').validate({
            rules: {
                name: "required",
                biography: "required"
            },
            messages: {
                id_author: "Please entry id",
                name: "Please entry name",
                biography: "Please entry biography"
            }

        });
    });

</script>
