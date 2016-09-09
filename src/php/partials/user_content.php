<div class="col content">
    <?php
        $users = $db->get_users();
        $template = array();
        foreach($users as $user){
            $userdata = json_encode( $user->jsonSerialize(), JSON_NUMERIC_CHECK);
            $template = $user->jsonSerialize();
    ?>
            <figure class="col photo-folder">
                <img data-currentuser='<?= $userdata ?>' class="add-person" src="<?= $user->get_photo_path() ? substr($user->get_photo_path(),1) : 'img/home/default_img.jpg' ;?>"/>
                <figcaption class="photo-description"><?= $user->get_fullname(); ?></figcaption>
            </figure>
    <?php
    };
    ?>
    <div class="popup">
        <span class="close"></span>
        <div class="popup-left">
            <?php
              foreach($template as $key => $value) {
                  if($key != "id") {
            ?>
            <span class="popup-alginment popup-alginment__<?= $key;?>"><?= ucfirst($key);?>:<span class="inject"></span></span>
            <?php
                  }   
              };
            ?>
        </div>
        <div class="popup-right">
            <img class="popup-userphoto"></img>
        </div>
            <button class="edit-button">Edit</button>
            <button class="delete-button">Delete</button>
            <button class="sure">Are you sure?</button>
    </div>
</div>
