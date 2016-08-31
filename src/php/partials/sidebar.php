        <div class="col col_quarter sidebar" >
            <img class="competa_logo" src="img/home/competa_logo.svg"/>
            <p class="welcome_message">Welcome, name</p>
            <nav class="navigation-container">
                <ul class="navigation-list">
                    <li class="navigation-item">
                        Interns
                        <a class="navigation-item-link"></a>
                    </li>
                    <li class="navigation-item">
                        Employees
                        <a class="navigation-item-link"></a>
                    </li>
                    <li class="navigation-item">
                        Trainees
                        <a class="navigation-item-link"></a>
                    </li>
                    <li class="navigation-item">
                        <p>Back-office</p>
                        <a class="navigation-item-link"></a>
                    </li>
                    <!--Add if statement for admin-->
                    <li class="navigation-item-green">
                        Add
                        <a class="navigation-item-link"></a>
                    </li>
                    <li class="navigation-item">
                        Delete
                        <a class="navigation-item-link"></a>
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

