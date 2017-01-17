<?php
session_start();
ini_set('display_errors',0);
include_once 'config.php';
include_once 'dbconnect.php';
include_once 'utilities.php';

include 'html_top.php';

if (isset($_SESSION['message'])) {
	if ($_SESSION['message']) {
		print message($_SESSION['message']);
		$_SESSION['message'] = array();
	}
}
	


if ($_SESSION['dbconn']) {
	
	if($_SESSION['user']['username']){
		$loginbutton = "<a href='".LOGOUT_URL."'><span class='glyphicon glyphicon-log-in'>Logout</span></a>";
	}
	else{
		$loginbutton = "<a href='".LOGIN_URL."'><span class='glyphicon glyphicon-log-out'>Login</span></a>";
	}
	
	if($_SESSION['user']['can_add'] || $_SESSION['user']['admin']){
			$add_button = "
					<a href='addform.php'>
				<span class='glyphicon glyphicon-plus'>Add</span>
			</a>";
	}
	else
			$add_button = null;
		
	if($_SESSION['user']['can_edit'] || $_SESSION['user']['admin']){
			$edit_table_head = "<th>Edit</th>";
			$can_edit = 1;

	}
	else{
			$can_edit = 0;
			$edit_table_head = null;

	}
		
	if($_SESSION['user']['can_delete'] || $_SESSION['user']['admin']) {
			$delete_table_head = "<th>Del</th>";
			$can_delete=1;
	}
	else{
			$delete_table_head = null;
			$can_delete=0;
	}
		
		
	include 'contacts_def.php';
	?>
	<div class="container">
		<div class="col-xs-12" style="text-align:right">
			<form action='index.php' method='post' style='display:inline'>
				<input type='text' name='search'> <input type='submit' value='Search' >
			</form>
			<a href="loginform.php">
			<?php echo $loginbutton; ?>
			</a>
				<?php echo $add_button; ?>
		</div>
	</div>
	<div class="container">
		<table class='table table-striped table-hover'>
			<thead>
				<tr>
					<?php
					foreach ($contacts_definition as $k => $v) {
						if ($v['table_head']) {
							print "<th>" . $v['table_head'] . "</th>";
						}
					}
					?>
					<?php echo $edit_table_head; ?>
					<?php echo $delete_table_head; ?>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($_POST['search'])) {
					$query = "SELECT * FROM contacts WHERE ";
					foreach ($contacts_definition as $k => $v) {
						$query .= $k . " LIKE '%" . $_POST['search'] . "%' OR ";
					}
					$query1 = substr($query,0,strlen($query)-4);				
				} else {				
					$query1 = "SELECT * FROM contacts ORDER BY lastname";
				}
				$result = mysqli_query($_SESSION['dbconn'],$query1);
				$totalreccount = mysqli_num_rows($result);
				while ($row = mysqli_fetch_array($result)) {
					print "<tr>";
					foreach ($contacts_definition as $k => $v) {
						if ($v['table_head']) {
							print "<td style='text-align:" . $v['table_align'] . "'>";
							if ($k == 'id') {
								print "<a href='" . SITE_URL . "/viewcontact.php?id=" . $row[$k] . "'>" . $row[$k] . "</a>";
							} else {
								print $row[$k];
							}
							print "</td>";
						}
					}
					
					if($can_edit)
					print "<td><a href='" . SITE_URL . "/editform.php?id=" . $row['id'] . "'><span class='glyphicon glyphicon-pencil'></span></a></td>";
					if($can_delete)
					print "<td><a href='" . SITE_URL . "/editform.php?id=" . $row['id'] . "&op=del'><span class='glyphicon glyphicon-trash'></span></a></td>";
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}

include 'html_bottom.php';