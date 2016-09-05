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
    <?php
    // if (isset($auth_url)) {
    //     echo "<a class='login' href='" . $auth_url . "'>Login</a>";
    // } else {
    //     echo '<a href="?logout"><button class="logout_button"><div class="logout-img"></div></button></a>';
    // }
    ?>
    <a href="?logout">
        <div class="logout-button-wrapper">
            <!-- SVG Vector -->
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                viewBox="229 -228.1 475.1 475.1">
                <g>
                    <g class="logout-vector">
                        <path d="M466.5,27.7c9.9,0,18.5-3.6,25.7-10.8c7.2-7.2,10.9-15.8,10.9-25.7v-182.7c0-9.9-3.6-18.5-10.9-25.7
                            c-7.2-7.2-15.8-10.9-25.7-10.9c-9.9,0-18.5,3.6-25.7,10.9c-7.2,7.2-10.9,15.8-10.9,25.7V-8.8c0,9.9,3.6,18.5,10.9,25.7
                            C448.1,24.1,456.6,27.7,466.5,27.7z"/>
                        <path d="M662.8-70.2c-15.3-30.6-36.9-56.3-64.7-77.1c-8-6.1-17-8.5-27.1-7.1c-10.1,1.3-18.1,6.1-24,14.3c-6.1,8-8.4,17-7,27
                            c1.4,10,6.1,18,14.1,24.1c18.6,14.1,33.1,31.3,43.3,51.7c10.2,20.4,15.3,42.1,15.3,65.1c0,19.8-3.9,38.7-11.6,56.7
                            c-7.7,18-18.1,33.5-31.3,46.7c-13.1,13.1-28.7,23.6-46.7,31.3c-18,7.7-36.9,11.6-56.7,11.6c-19.8,0-38.7-3.9-56.7-11.6
                            c-18-7.7-33.5-18.1-46.7-31.3c-13.1-13.1-23.6-28.7-31.3-46.7c-7.7-18-11.6-36.9-11.6-56.7c0-23,5.1-44.7,15.3-65.1
                            C345.8-57.7,360.2-75,378.9-89c8-6.1,12.7-14.1,14.1-24.1c1.4-10-0.9-19-7-27c-5.9-8.2-13.8-12.9-23.8-14.3
                            c-10-1.3-19.1,1-27.3,7.1c-27.8,20.7-49.3,46.4-64.7,77.1c-15.3,30.6-23,63.3-23,97.9c0,29.7,5.8,58.1,17.4,85.1
                            c11.6,27,27.2,50.3,46.8,69.9c19.6,19.6,42.9,35.2,69.9,46.8c27,11.6,55.4,17.4,85.1,17.4c29.7,0,58.1-5.8,85.1-17.4
                            c27-11.6,50.3-27.2,70-46.8c19.6-19.6,35.2-42.9,46.8-69.9c11.6-27,17.4-55.4,17.4-85.1C685.8-6.9,678.2-39.6,662.8-70.2z"/>
                    </g>
                </g>
            </svg>               
        </div>
    </a>
</div>
