        <div class="col col_quarter sidebar" >
            <img class="competa_logo" src="img/home/competa_logo.svg"/>
            <p class="welcome_message">Welcome, name</p>
            <nav class="navigation-container">
                <ul class="navigation-list">
                    <li class="navigation-item">
                        <a class="navigation-item-link">Interns</a>
                    </li>
                    <li class="navigation-item">
                        <a class="navigation-item-link">Employees</a>
                    </li>
                    <li class="navigation-item">
                        <a class="navigation-item-link">Trainees</a>
                    </li>
                    <!--Add if statement for admin-->
                    <li class="navigation-item-green">
                        <a href="?p=add" class="navigation-item-link">Add</a>
                    </li>
                    <li class="navigation-item">
                        <a href="?p=delete" class="navigation-item-link">Delete</a>
                    </li>
                </ul>
            </nav>
                <div class="request">
                    <?php
                    if (isset($auth_url)) {
                        echo "<a class='login' href='" . $auth_url . "'>Login</a>";
                    } else {
                        echo '<a href="?logout"><button class="logout_button"><div class="logout-img"></div></button></a>';
                    }
                    ?>
                </div>
        </div>
