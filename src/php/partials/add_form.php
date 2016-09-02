<div class="col content">
    <form class="col col_half add-form" action="" method="post">
        <h1 class="form-heading">Add Person</h1>
        <input class="form-input" type="text" name="user_firstname" placeholder="First name*" required />
        <input class="form-input" type="text" name="user_insertion" placeholder="Insertion" />
        <input class="form-input" type="text" name="user_lastname" placeholder="Last name*" required />
        <select class="form-input select"  name="jobs" required>
            <option class="select-option" value="" disabled selected>Select user job</option>
            <option class="select-option" value="">Interns</option>
            <option class="select-option" value="">Employees</option>
            <option class="select-option" value="">Trainees</option>
            <option class="select-option" value="">Back-office</option>
        </select>
        <select class="form-input select"  name="user_right" required>
            <option class="select-option" value="" disabled selected>Select user right</option>
            <option class="select-option" value="">A</option>
            <option class="select-option" value="">B</option>
            <option class="select-option" value="">C</option>
        </select>
        <input class="form-submit btn" type="submit" value="Add" />
        <input class="form-file" id="user_photo" type="file" name="user_photo" required />
        <label class="form-label" for="user_photo">Choose a file ...</label>
    </form>
</div>
