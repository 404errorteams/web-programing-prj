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
    <form class="form-horizontal" id="adddata" enctype="multipart/form-data" method="post" action="">
        <div class="control-group">		
            <label class="control-label" for="id_author">ID :</label>
            <div class="controls">
                
               <input type="text" name="id_author"  placeholder = "add id">
                
            </div>
        </div>

        <div class="control-group">		
            <label class="control-label" for="name">Name : </label>
            <div class="controls">
                <input type="text" name="name" placeholder = "add name">
            </div>


            <br>
            <div class="control-group">		
                <label class="control-label" for="biography">Biography: </label>
                <div class="controls">
                    <textarea class="span10" rows="10" name="biography" placeholder="add biograhy" id="biography"></textarea>
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
         


            <div class="form-actions">
                <input type="submit" id="update" class="btn btn-primary" name="addauthor" value="Add" >
                <a href="adminauthor/index" id="cancel" class="btn" name="cancel" >Cancel</a>
            </div>
    </form>
</div>
<script>
    $(document).ready(function() {

        $('#adddata').validate({
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
<?php



