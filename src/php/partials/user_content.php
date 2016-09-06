<div class="col content"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <?php
        $users = $db->get_users();

        foreach($users as $user){
            $temp = json_encode( $user->jsonSerialize(), JSON_NUMERIC_CHECK);
    ?>

            <figure class="col photo-folder">
                <img data-currentuser='<?php echo $temp ?>' user-email="<?php $user->get_email();?>" class="add-person" src="img/home/add-person.png"/>
                <figcaption class="photo-description"><?= $user->get_fullname(); ?></figcaption>
            </figure>
    <?php
    };
    ?>
    <div class="popup">
        <span class="close"></span>
        <span class="popup-alginment popup-alginment__name">Name:<span class="inject"></span></span>
        <span class="popup-alginment popup-alginment__email" >Email:<span class="inject"></span></span>
        <span class="popup-alginment popup-alginment__description" >Description:<span class="inject"></span></span>
    </div>

</div>
