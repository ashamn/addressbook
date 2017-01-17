<?php

session_start();
include_once 'config.php';

if (isset($_SESSION['user']['username'])) {
		header('Location: '.SITE_URL);	
}

ini_set('display_errors',0);
include_once 'utilities.php';

$page_title = "Login";

include 'html_top.php';



?>
	<div class="container">
			<div class="row">
				<div class="col-md-offset-4 col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="panel-title">Login</h2></div>
						<div class="panel-body">
							<form class="form-horizontal" method="post" action="authenticate.php">
								<div class="form-group">
									<label for='username' class='col-md-4 form-control-label'>Username</label>
									<div class="col-md-8">
										<input type="text" name="username" class="form_control">
									</div>
									<label for='password' class='col-md-4 form-control-label'>Password</label>
									<div class="col-md-8">
										<input type="password" name="password" class="form_control">
									</div>
								</div>
								<div class="formgroup">
									<div class="col-md-offset-4 col-md-8">
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
	</div>
	



<?



include 'html_bottom.php';


?>