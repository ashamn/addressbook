<?php
session_start();
include_once 'config.php';
include_once 'dbconnect.php';
include 'contacts_def.php';

include 'html_top.php';

$query = "SELECT * FROM contacts WHERE id = " . $_GET['id'];
$result = mysqli_query($_SESSION['dbconn'],$query);
$record = mysqli_fetch_array($result);

if (isset($_GET['op'])) {
	if ($_GET['op'] == 'del') {
		$panel_title = "Delete Contact";
		$submit_button = "Delete Forever";
		$formaction = "deleterecord.php";
	}
} else {
	$panel_title = "Edit Contact";
	$submit_button = "Save";
	$formaction = "editrecord.php";
}
?>

<div class='container'>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h2 class='panel-title'><?php echo $panel_title;?></h2>
        </div>
        <div class='panel-body'>
            <form action='<?php echo $formaction; ?>' method='post'>
            <?php
            foreach ($contacts_definition as $k => $v) {
				if ($k == 'id') {
					$readonly = " readonly=readonly ";
				} else {
					$readonly = "";
				}
                ?>
                <div class='form-group row'>
                    <label for='<?php echo $k;?>' class='control-label col-xs-2'><?php echo $v['form_label'];?></label>
                    <div class='col-xs-<?php echo $v['form_col_size'];?>'>
                        <?php
                        $html = null;
                        switch ($v['form_type']) {
                            case 'input_text':
                                $html = "<input type='text' class='form-control' id='" . $k . "' name='" . $k . "' " . $readonly . " value='" . $record[$k] . "'>";
                                break;
                            case 'textarea':
                                $html = "<textarea class='form-control' id='" . $k . "' name='" . $k . "'>" . $record[$k] . "</textarea>";
                                break;
                        }
                        echo $html;
                        ?>
                    </div>
                </div>
                <?php
            }
        
            ?>
            <div class='form-group row'>
                <div class='col-xs-offset-2 col-xs-10'>
                    <input type='submit' class='btn btn-primary' value='<?php echo $submit_button;?>'> <a href='<?php echo SITE_URL;?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'html_bottom.php';