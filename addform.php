<?php
session_start();
include_once 'config.php';
include_once 'dbconnect.php';
include 'contacts_def.php';

include 'html_top.php';
?>

<div class='container'>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h2 class='panel-title'>Add Contact</h2>
        </div>
        <div class='panel-body'>
            <form action='addrecord.php' method='post'>
            <?php
            foreach ($contacts_definition as $k => $v) {
				$query = "SELECT MAX(id)+1 AS new_id FROM contacts";
				$result = mysqli_query($_SESSION['dbconn'],$query);
				$record = mysqli_fetch_array($result);
				if ($k == 'id') {
					$valueattr = " value='" . $record['new_id'] . "' ";
				} else {
					$valueattr = null;
				}
                ?>
                <div class='form-group row'>
                    <label for='<?php echo $k;?>' class='control-label col-xs-2'><?php echo $v['form_label'];?></label>
                    <div class='col-xs-<?php echo $v['form_col_size'];?>'>
                        <?php
                        $html = null;
                        switch ($v['form_type']) {
                            case 'input_text':
                                $html = "<input type='text' class='form-control' id='" . $k . "' name='" . $k . "' " . $valueattr . ">";
                                break;
                            case 'textarea':
                                $html = "<textarea class='form-control' id='" . $k . "' name='" . $k . "'></textarea>";
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
                    <input type='submit' class='btn btn-primary' value='Save'> <a href='<?php echo SITE_URL;?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'html_bottom.php';