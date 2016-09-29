<?php
include 'inc/database.php';
$maker_id = $_POST['id'];
if (isset($_POST['action']) && $_POST['action'] == "model")
    {
    $result = $obj->get_all_data_active("model", "model_id", "ASC", "maker_id", $maker_id);
    echo '<option selected="selected">Select Model</option>';
    foreach ($result as $value)
        {

        echo '<option value="' . $value['model_id'] . '">' . $value['model_name'] . '</option>';
        }
    }
if (isset($_POST['action']) && $_POST['action'] == "sub_model")
    {
    $result = $obj->get_all_data_active("sub_model", "sub_id", "ASC", "model_id", $maker_id);
    echo '<option selected="selected">Select Sub-Model</option>';
    foreach ($result as $value)
        {
        echo '<option value="' . $value['sub_id'] . '">' . $value['sub_model_name'] . '</option>';
        }
    }
if (isset($_POST['set'][0]))
    {
    $result = $obj->edit_order($key, $value);
    }
?>