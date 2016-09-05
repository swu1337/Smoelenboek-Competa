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

    $iter = new CachingIterator(new ArrayIterator($user_array),CachingIterator::FULL_CACHE);

    foreach($iter as $key => $value){
        if($value != null || $key = "lastname_prefix" || $key = "description"){
            if(!$iter-> hasNext()){
                $db->add_user($iter["role_id"], $iter["email"], $iter["google_sub"],
                    $iter["firstname"], $iter["lastname_prefix"], $iter["lastname"], $iter["description"]);
            }
        }
        else{
            break;
        }
    }
?>

<div class="col content">
    <form class="col col_half add-form" action="#" method="post">
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
                <input class="form-file" id="user_photo" type="file" name="user_photo" required />
                <label class="form-label" for="user_photo">Choose a file ...</label>
            </div>

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
