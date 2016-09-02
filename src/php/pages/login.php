<div class="login_background">
	<div>
		<img class="logo" src="img/home/competa_logo.svg" />
		<p class="welcome_text">Welcome to Competa Smoelenboek. Click the button below to sign in with your Google account.</p>
			<div class="request">
				<?php
				if (isset($auth_url)) {
					echo '<a href="' . $auth_url .'"><img class="sign_in" src="img/home/google_sign_in.png" /></a>';
				} else {
					echo "<a class='logout' href='?logout'>Logout</a>";
				}
				?>
			</div>
	</div>
</div>