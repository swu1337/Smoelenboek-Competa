<div class="col content">
    <?php
        $users = $db->get_users();
        $template = array();
        foreach($users as $user){
            $userdata = json_encode( $user->jsonSerialize(), JSON_NUMERIC_CHECK);
            $template = $user->jsonSerialize();
    ?>
            <figure class="col photo-folder">
                <img data-currentuser='<?= $userdata ?>' class="add-person" src="img/home/add-person.png"/>
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
            ?>
            <span class="popup-alginment popup-alginment__<?= $key;?>"><?= ucfirst($key);?>:<span class="inject"></span></span>
            <?php
              };
            ?>
        </div>
        <div class="popup-right">
            <div class="popup-userphoto"></div>
        </div>
    </div>
</div>
