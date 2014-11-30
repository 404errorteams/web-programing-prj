


<div id="search_status">
    <form action="adminusers/index" method="get" class="form-horizontal" id="search_form" style="width: 800px;">
        <legend style="border-bottom: none;float: left;width: 80px;margin-top: 20px;">Word<i style=" margin-left: 15px;" class="icon-search"></i></legend>
        <div style="width: 230px;float: left;margin-left: 10px;" class="control-group">
            <input type="text" name="searchword" placeholder="add search word" value="<?php if(!empty($this->params['url']['searchword'])) echo $this->params['url']['searchword'];?>">
        </div>
        <legend style="border-bottom: none;float: left;width: 120px; display: inline-block;margin-top: 20px;">Field<i style=" margin-left: 15px;" class="icon-search"></i></legend>
        <div style="width: 230px;float: left;margin-left: 10px; display: inline-block;" class="control-group">
            <select name="searchfield">
                <?php 
                    $sel1 = '';
                    $sel2 = '';
                    if($searchfield =='id_user'){
                        $sel1 = 'selected';
                    }
                    else{
                        $sel2 = 'selected';
                    }
                ?>
                <option value="id_user" <?php echo $sel1?>>Id_user</option>
                <option value="name" <?php echo $sel2?> >Name</option>
            </select>
        </div>
        <div style="background-color: #fff; border-top: none;" >
            <input type="submit" value="Search" class="btn btn-primary" id="search" style="margin-top: 20px;" >
        </div>
    </form>
</div>
<legend>Admin Users</legend>
<div class="alert alert-success alert-dismissable" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <strong>Delete succeed</strong>
</div>
<div id="wordmaze_content" > 
      <?php echo $this->element('pagination'); ?>
    <div class="pull-left btn-add-word">
        <a href=<?php echo ROOT_URL.'adminusers/add';?> class="btn btn-primary">Add Users</a>
    </div>
    <table class="table table-hover table-bordered table-condensed table-striped">
        <thead>
        <th>STT</th>
        <th>ID</th>
        <th>Avatar</th>
        <th>Username</th>
        <th>Password</th>
        <th>BirthDay</th>
        <th>Sex</th>
        <th>Email</th>
        <th>Blance</th>
        <th>Action</th>
        </thead>
        <tbody>
              <?php
              $i = 1;
                foreach ($Users as $key => $User) {
              ?>
            <tr id="col<?php echo $User['User']['id_user']; ?>">
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $User['User']['id_user']; ?></td>
                <td style="word-wrap:break-word;width:60px;">
                    <?php 
                    if( isset($User['User']['avatar']) && !empty($User['User']['avatar']))
                    {
                        $img_path =  IMAGE_UPLOAD_PATH_USER . $User['User']['avatar'];
                        if(file_exists($img_path)){
                             echo "<a title='' href='" . ROOT_URL . "img/user/" .$User['User']['avatar']. "?" . time() . "' target='_blank'><img class='img-thumbnail' alt='' src='" . ROOT_URL . "app/webroot/img/user/" .$User['User']['avatar']. "' display: inline; visibility: visible;' /></a>";
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
                <td><?php echo $User['User']['username'];  ?></td>
                <td><?php echo $User['User']['password'];  ?></td>
                <td><?php echo $User['User']['birth'];  ?></td>
                
                <td>
                    <select name="gender" style="width:80px;">
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
                </td>
                <td><?php echo $User['User']['mail'];  ?></td>
                <td><?php echo $User['User']['balance'];  ?></td>
                <td style="width: 400px">                    
                                      <?php
                                           echo $this->Html->link('<i class="icon-info-sign icon-white"></i>', array(
                                                    'controller' => 'adminusers',
                                                    'action' => 'view',   $User['User']['id_user']
                                                        ), array(
                                                    'class' => 'btn btn-success',
                                                    'title' => 'View',
                                                    'escape' => false
                                                        )
                                                );
                                      ?>
                                     <?php
                                           echo $this->Html->link('<i class="icon-edit icon-white"></i>', array(
                                                    'controller' => 'adminusers',
                                                    'action' => 'edit',   $User['User']['id_user']
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
                                                'rel' =>$User['User']['id_user'],
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
                url: '<?php echo ROOT_URL; ?>adminusers/del',
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

