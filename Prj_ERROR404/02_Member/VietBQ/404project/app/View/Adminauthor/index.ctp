<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require 'panelsearch.html';
?>
  <div class="container">

                <form class="form-horizontal">
                    <i class ="icon-search">&nbsp;</i>
                    <input type="text" placeholder="Search" class="span8">
                    <input type="submit" name="submit" class="btn btn-primary " value="Search">
                    <a title="Advance Search" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-default btn-md">
                        Advance Search
                        <i class="glyphicon glyphicon-chevron-down"></i>
                    </a>
              
                    <br>
                    
                              
                    <div id="collapseOne" class="collapse" style="box-shadow: 1px 1px 1px gray;width: 840px;margin-left: 15px">
                        <br>
                        
                        <label class="checkbox"><input type="checkbox">Name</label>
                        <label class="checkbox"><input type="checkbox">Number</label>
                        <label class="checkbox"><input type="checkbox">Tel</label>


                    </div>
                </form>





            </div>

<legend>Admin Author</legend>
<div class="alert alert-success alert-dismissable" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <strong>Delete succeed</strong>
</div>
<div id="wordmaze_content" > 
      <?php echo $this->element('pagination'); ?>
    <div class="pull-left btn-add-word">
        <a href=<?php echo ROOT_URL.'adminauthor/add';?> class="btn btn-primary">Add Author</a>
    </div>
    <table class="table table-hover table-bordered table-condensed table-striped">
        <thead>
        <th>STT</th>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Biography</th>
        <th>Action</th>
        </thead>
        <tbody>
              <?php
              $i = 1;
                foreach ($Authors as $key => $Author) {
              ?>
            <tr id="col<?php echo $Author['Author']['id_author']; ?>">
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $Author['Author']['id_author']; ?></td>
                <td style="word-wrap:break-word;width:100px;">
                    <?php 
                
                    if( isset($Author['Author']['img']) && !empty($Author['Author']['img']))
                    {
                        $img_path =  IMAGE_UPLOAD_PATH_AUTHOR . $Author['Author']['img'];
                        
                        if(file_exists($img_path)){
                             echo "<a title='' href='" . IMAGE_UPLOAD_AUTHOR .$Author['Author']['img']. "?" . time() . "' target='_blank'><img class='img-thumbnail' alt='' src='" . IMAGE_UPLOAD_AUTHOR.$Author['Author']['img']. "' display: inline; visibility: visible;' /></a>";
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
                <td><?php echo $Author['Author']['name'];  ?></td>
                <td style="width: 500px;"><?php echo substr($Author['Author']['biography'],0,100)."...";  ?></td>

                <td>                                          
                                     <?php
                                           echo $this->Html->link('<i class="icon-edit icon-white"></i>', array(
                                                    'controller' => 'adminauthor',
                                                    'action' => 'edit',   $Author['Author']['id_author']
                                                        ), array(
                                                    'class' => 'btn btn-success',
                                                    'title' => 'Edit',
                                                    'escape' => false
                                                        )
                                                );
                                      ?>
                                       <?php
                                            echo $this->Html->link('<i class="icon-trash icon-white"></i>', array(
                                                
                                                'action' => '#'
                                                    ), array(
                                                'rel' =>$Author['Author']['id_author'],
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
        <p>Are you sure delete this's author </p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-modal-cancel" data-dismiss="modal" aria-hidden="true">Cancel</a>
        <a href="#" class="btn btn-primary btn-modal-ok">OK</a>
    </div>
</div>

<script>
    $(document).ready(function() {

        var id_author = '';
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
                url: '<?php echo ROOT_URL; ?>adminauthor/del',
                data: {id: id_author}
            }).done(function(data) {
                modal.modal('hide');
                $('.alert-success').css("display", "block");
                $('#col' + id_author).fadeOut('1500');

            }).fail(function(jqXHR, textStatus) {
                modal.modal('hide');
            });
        });

    });
</script>
