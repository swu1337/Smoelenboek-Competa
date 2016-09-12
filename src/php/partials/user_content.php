<div class="profile-container">
    <?php
	$users = $db->get_users();
	$template = array();
	foreach($users as $user){
		$userdata = json_encode( $user->jsonSerialize(), JSON_NUMERIC_CHECK);
		$template = $user->jsonSerialize();
    ?>
		<div class="user-item">
			<img data-currentuser='<?= $userdata ?>' class="user-photo" src="<?= $user->get_photo_path() ? $user->get_photo_path() : 'img/home/default_img.jpg' ;?>"/>
			<p class="user-name"><?= $user->get_fullname(); ?></p>
		</div>
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
            <img class="popup-userphoto"></img>
        </div>
            <button class="edit-button">Edit</button>
            <button class="delete-button">Delete</button>
            <button class="sure">Are you sure?</button>
    </div>
</div>

