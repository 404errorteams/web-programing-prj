<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $this->Session->flash(); ?>
<legend><?php echo "Book's Info" ?></legend>
<div>
    <form class="form-horizontal" id="adddata" enctype="multipart/form-data" method="post" action="">
        <div class="control-group">		
            <label class="control-label" for="id_book">ID :</label>
            <div class="controls">
                <input type="text" name="id_book"  placeholder = "add id" required>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="id_author">Author's ID : </label>
            <div class="controls">
                <input type="text" name="id_author" placeholder = "add author" required>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="name">Name : </label>
            <div class="controls">
                <input type="text" name="name" placeholder = "add name" required>
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
        <br>
        <div class="control-group">		
            <label class="control-label" for="description">Description: </label>
            <div class="controls">
                <textarea class="span10" rows="10" name="description" placeholder="add description" id="biography" required></textarea>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="descriptionpro">Description by professionals: </label>
            <div class="controls">
                <textarea class="span10" rows="10" name="descriptionpro" placeholder="add description" id="biography"></textarea>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="descriptionpro">Description by 404Ebook </label>
            <div class="controls">
                <textarea class="span10" rows="10" name="description404" placeholder="add description " id="biography"></textarea>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="biography">Biography: </label>
            <div class="controls">
                <textarea class="span10" rows="10" name="biography" placeholder="add biograhy" id="biography"></textarea>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="adult">Adult: </label>
            <div class="controls">
                <input type="radio" name="adult" value="1" style="width: 50px;"> yes
                <input type="radio" name="adult" value="0"  style="width: 50px;"> no
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="ebook">Ebook: </label>
            <div class="controls">
                <input type="radio" name="ebook" value="1" style="width: 50px;"> yes
                <input type="radio" name="ebook" value="0"  style="width: 50px;"> no
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="book">Book: </label>
            <div class="controls">
                <input type="radio" name="book" value="1" style="width: 50px;"> yes
                <input type="radio" name="book" value="0"  style="width: 50px;"> no
            </div>
        </div>
        <legend><?php echo "Book's prices" ?></legend>
        <div class="control-group">		
            <label class="control-label" for="name">Prices : </label>
            <div class="controls">
                <input type="number" name="price" placeholder = "add prices" required>
            </div>
        </div>
        <div class="control-group">		
            <label class="control-label" for="name">sale (%) : </label>
            <div class="controls">
                <input type="number" name="remain" placeholder = "add sale" required>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" id="update" class="btn btn-primary" name="addauthor" value="Add" >
            <a href="adminbook/index" id="cancel" class="btn" name="cancel" >Cancel</a>
        </div>
    </form>
</div>