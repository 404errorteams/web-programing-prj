<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div id="search_status">
    <form action="adminbook/index" method="get" class="form-horizontal" id="search_form" style="width: 800px;">
        <legend style="border-bottom: none;float: left;width: 80px;margin-top: 20px;">Word<i style=" margin-left: 15px;" class="icon-search"></i></legend>
        <div style="width: 230px;float: left;margin-left: 10px;" class="control-group">
            <input type="text" name="searchword" placeholder="add search word" value="<?php if(!empty($searchword)) echo $searchword;?>">
        </div>
        <legend style="border-bottom: none;float: left;width: 120px; display: inline-block;margin-top: 20px;">Field<i style=" margin-left: 15px;" class="icon-search"></i></legend>
        <div style="width: 230px;float: left;margin-left: 10px; display: inline-block;" class="control-group">
            <select name="searchfield">
                <?php 
                   $field = GlobalVar::read('search_book');
                   foreach ($field as $k =>$v){
                       if($k == $searchfield)
                       {
                            echo '<option value = "'.$k.'" selected >'.$v.'</option>';
                       }
                       else{
                            echo '<option value = "'.$k.'" >'.$v.'</option>';
                       }
                   }
                ?>
                
            </select>
        </div>
        <div style="background-color: #fff; border-top: none;" >
            <input type="submit" value="Search" class="btn btn-primary" id="search" style="margin-top: 20px;" >
        </div>
    </form>
</div>
<legend><?php echo $title_for_layout;?></legend>
<?php echo $this->Session->flash(); ?>
<div class="alert alert-success alert-dismissable" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <strong>Delete succeed</strong>
</div>
<div id="wordmaze_content" > 
      <?php echo $this->element('pagination'); ?>
    <div class="pull-left btn-add-word">
        <a href=<?php echo ROOT_URL.'adminbook/add';?> class="btn btn-primary">Add book</a>
    </div>
    <table class="table table-hover table-bordered table-condensed table-striped">
        <thead>
        <th><?php echo $this->Paginator->sort('id_book', 'ID'); ?></th>
        <th>Image</th>
        
        <th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
        <th><?php echo $this->Paginator->sort('id_author', 'Author'); ?></th>
        <th>Author's name</th>
        <th><?php echo $this->Paginator->sort('price', 'Price'); ?></th>
        <th>Action</th>
        </thead>
        <tbody>
              <?php
              $i = 1;
                foreach ($Books as $key => $Book) {
              ?>
            <tr id="col<?php echo $Book['Book']['id_book']; ?>">
                
                <td><?php echo $Book['Book']['id_book']; ?></td>
                <td style="word-wrap:break-word;width:100px;">
                    <?php 
                    if( isset($Book['Book']['img']) && !empty($Book['Book']['img']))
                    {
                        $img_path =  IMAGE_UPLOAD_PATH_AUTHOR . $Book['Book']['img'];
                        if(file_exists($img_path)){
                             echo "<a title='' href='" . ROOT_URL . "img/book/" .$Book['Book']['img']. "?" . time() . "' target='_blank'><img class='img-thumbnail' alt='' src='" . ROOT_URL . "app/webroot/img/book/" .$Book['Book']['img']. "' display: inline; visibility: visible;' /></a>";
                        }
                        else{
                            echo '<img class="img-thumbnail" alt="" src="' . ROOT_URL ."app/webroot/img/" . NO_IMAGE . '?' . time() . '" />';
                        }
                    }
                    else{
                        echo '<img class="img-thumbnail" alt="" src="' . ROOT_URL ."app/webroot/img/" . NO_IMAGE . '?' . time() . '" />';
                    }
                    ?>
                </td>
                <td><?php echo $Book['Book']['name'];  ?></td>
                <td><?php echo $Book['Wrote']['id_author']; ?></td>
                <td><?php echo $Book['Author']['name']; ?></td>
                <td ><?php echo $Book['Book']['price'];  ?></td>

                <td>                                          
                                     <?php
                                           echo $this->Html->link('<i class="icon-info-sign icon-white"></i>', array(
                                                    'controller' => 'adminauthor',
                                                    'action' => 'view',   $Book['Book']['id_book']
                                                        ), array(
                                                    'class' => 'btn btn-success',
                                                    'title' => 'View',
                                                    'escape' => false
                                                        )
                                                );
                                      ?>
                                       <?php
                                            echo $this->Html->link('<i class="icon-trash icon-white"></i>', array(
                                                
                                                'action' => '#'
                                                    ), array(
                                                'rel' =>$Book['Book']['id_book'],
                                                'class' => 'btn btn-danger btn-del',
                                                'title' => 'Delete',
                                                'escape' => false
                                                    )
                                            );
                                      ?>
                    </div>
                    </div>

                </td>
            </tr>
              <?php    
              }
              ?>

        </tbody>

    </table>
      <?php echo $this->element('pagination'); ?>
</div>

<div class="modal hide fade modal-confirm">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Delete</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure delete this's Book </p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-modal-cancel" data-dismiss="modal" aria-hidden="true">Cancel</a>
        <a href="#" class="btn btn-primary btn-modal-ok">OK</a>
    </div>
</div>

<script>
    $(document).ready(function() {

        var id_book = '';
        $('.btn-del').click(function(event) {
            if (event.preventDefault != null) {
                event.preventDefault();
            }
            $('.modal-confirm').modal();
            id_author = $(this).attr('rel');

        });

        $('.btn-modal-ok').click(function(event) {
            if (event.preventDefault != null) {
                event.preventDefault();
            }

            var modal = $('.modal-confirm');

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo ROOT_URL; ?>adminbook/del',
                data: {id: id_book}
            }).done(function(data) {
                modal.modal('hide');
                $('.alert-success').css("display", "block");
                $('#col' + id_book).fadeOut('1500');

            }).fail(function(jqXHR, textStatus) {
                modal.modal('hide');
            });
        });

    });
</script>
