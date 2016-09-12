<?php
    $user_array = array(
        "role_id" => filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT),
        "email" => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
        "google_sub" => filter_input(INPUT_POST, 'google_sub', FILTER_DEFAULT),
        "firstname" => filter_input(INPUT_POST, 'firstname', FILTER_DEFAULT),
        "lastname_prefix" => filter_input(INPUT_POST, 'lastname_prefix', FILTER_DEFAULT),
        "lastname" => filter_input(INPUT_POST, 'lastname', FILTER_DEFAULT),
        "description" => filter_input(INPUT_POST, 'description', FILTER_DEFAULT)
    );

    $iter = new CachingIterator(new ArrayIterator($user_array), CachingIterator::FULL_CACHE);
    $message = '';

    foreach($iter as $key => $value) {
        if($value != null || ($key == "lastname_prefix" || $key == "description" || $key == "google_sub")){
            if(!$iter-> hasNext()) {
                $file_path = null;
               
                /**process uploaded photo**/
                if( (isset($_FILES["user_photo"]["size"]) && $_FILES["user_photo"]["size"] > 0) ) {
                    $target_dir = "img/profile_pics/";
                    $uploadOk = 1;
                    $imageFileType = pathinfo( ROOT_P . '/' . $target_dir . basename($_FILES["user_photo"]["name"]) , PATHINFO_EXTENSION);

                    if(isset($_POST["submit"])) {
                        if( !getimagesize($_FILES["user_photo"]["tmp_name"]) ) {
                            $uploadOk = 1;
                        } else {
                            $message = "Selected file is not an image.";
                            $uploadOk = 0;
                        }
                    }

                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        $message =  "Only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 1) {
                        include_once('php/lib/util.php');
                        
                        do {
                            $file_path = $target_dir . generateRandomString() . '.' . $imageFileType;
                        } while( file_exists(ROOT_P . $file_path) );
                        if ( move_uploaded_file($_FILES["user_photo"]["tmp_name"], ROOT_P . '/' . $file_path) ) {
                        } else {
                            $message =  "There was an error adding the profile picture please add this manually.";
                        }
                    }
                    unset($_FILES['user_photo']);
                }

                $result = $db->add_user($iter["role_id"], $iter["email"], $iter["google_sub"],
                    $iter["firstname"], $iter["lastname_prefix"], $iter["lastname"], $iter["description"], $file_path);

                if( $result === true ) {
                    $message = "User added";
                }               
                else if($result == 1062) {
                    $message = 'This user already exists!';
                }
            }
        }
        else{
            break;
        }
    }

?>

<div class="col content">
    <form class="col col_half add-form" action="" enctype="multipart/form-data" method="post">
        <h1 class="form-heading">Add Person</h1>
        <table class=form-table>
            <tr>
                <td><label for="user_firstname">First Name:</label></td>
            </tr>
            <tr>
                <td><input id="user_firstname" class="form-input" type="text" name="firstname" placeholder="John*" required /></td>
            </tr>
            <tr>
                <td><label for="user_insertion">Insertion:</label></td>
            </tr>
            <tr>
                <td><input id="user_insertion" class="form-input" type="text" placeholder="van" name="lastname_prefix" /></td>
            </tr>
            <tr>
                <td><label for="user_last_name">Last Name:</label></td>
            </tr>
            <tr>
                <td><input id="user_last_name" class="form-input" type="text" placeholder="Doe*" name="lastname" required /></td>
            </tr>
            <tr>
                <td><label for="user_email">E-Mail:</label></td>
            </tr>
            <tr>
                <td><input id="user_email" class="form-input" type="text" placeholder="Example@gmail.com" name="email" required/></td>
            </tr>
            <tr>
                <td><label for="user_description">Description:</label></td>
            </tr>
            <tr>
                <td><input id="user_description" class="form-input" type="text" placeholder="Very kind person." name="description"/></td>
            </tr>
            <tr>
                <td><label for="user_job">User Job Description:</label></td>
            </tr>

            <tr>
                <td>
                    <select id="user_job" class="form-input select"  name="user_job" required>
                        <option class="select-option" value="" disabled selected>Select user job</option>
                        <option class="select-option" value="">Interns</option>
                        <option class="select-option" value="">Employees</option>
                        <option class="select-option" value="">Trainees</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="user_right">User Permission:</label></td>
            </tr>
            <tr>
                <td>
                    <select id="user_right" class="form-input select"  name="role_id" required>
                        <option class="select-option" value="" disabled selected>Select user right</option>
                        <option class="select-option" value="1">Admin</option>
                        <option class="select-option" value="2">Employee</option>
                        <option class="select-option" value="3">User</option>
                    </select>
                </td>
            </tr>
          </table>
            <input class="form-submit btn" type="submit" value="Add" />
            <div class="form-upload">
                <input class="form-file" id="user_photo" type="file" name="user_photo" />
                <label class="form-label" for="user_photo">Choose a file ...</label>
            </div>
            <?= ( $message != '' ) ? "<p>$message</p>" : '' ?>
    </form>
    <div class="col col_half add-form">
        <div class="photo-viewer">
            <h1 class="photo-viewer-heading">Preview</h1>
            <div class="photo-viewer-container">
                <div class="photo-viewer-image">
                </div>
            </div>
        </div>
    </div>
</div>
