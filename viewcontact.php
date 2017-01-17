<?php
session_start();
ini_set('display_errors',1);
include_once 'config.php';
include_once 'dbconnect.php';
include_once 'utilities.php';

include 'html_top.php';

if (isset($_GET['id']) and isset($_SESSION['dbconn'])) {
	if ($_SESSION['dbconn']) {
		include 'contacts_def.php';
		$query = "SELECT * FROM contacts WHERE id = " . $_GET['id'];
		$result = mysqli_query($_SESSION['dbconn'],$query);
		$record = mysqli_fetch_array($result);
		?>
		<div class='container'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h2 class='panel-title'>Contact</h2>
				</div>
				<div class='panel-body'>
					<div class='container'>
						<?php
						foreach ($contacts_definition as $k => $v) {
							?>
							<div class='row'>
								<div class='col-md-3'><?php echo $v['form_label'];?></div>
								<div class='col-md-9'><?php echo $record[$k];?></div>
							</div>
							<?php
						}
						?>
					</div>
					<div class='row'>
						<div class='col-md-12'>				
							<a href='<?php echo SITE_URL;?>'><button class='btn'>Home</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

include 'html_bottom.php';