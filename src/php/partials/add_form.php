<?php
?>

<div class="col content">
    <form class="col col_half add-form" action="#" method="post">
        <h1 class="form-heading">Add Person</h1>
        <table class=form-table>
            <tr>
                <td><label for="user_firstname">First Name:</label></td>
            </tr>
            <tr>
                <td><input id="user_firstname" class="form-input" type="text" name="user_firstname" placeholder="John*" required /></td>
            </tr>
            <tr>
                <td><label for="user_insertion">Middle Name:</label></td>
            </tr>
            <tr>
                <td><input id="user_insertion" class="form-input" type="text" placeholder="van" name="user_insertion" /></td>
            </tr>
            <tr>
                <td><label for="user_last_name">Last Name:</label></td>
            </tr>
            <tr>
                <td><input id="user_last_name" class="form-input" type="text" placeholder="Doe*" name="user_lastname" required /></td>
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
                    <select id="user_right" class="form-input select"  name="user_right" required>
                        <option class="select-option" value="" disabled selected>Select user right</option>
                        <option class="select-option" value="">Admin</option>
                        <option class="select-option" value="">Employee</option>
                        <option class="select-option" value="">User</option>
                    </select>
                </td>
            </tr>
          </table>
            <input class="form-submit btn" type="submit" value="Add" />
            <input class="form-file" id="user_photo" type="file" name="user_photo" required />
            <label class="form-label" for="user_photo">Choose a file ...</label>
    </form>
    <?php print_r($_POST)?>
</div>
