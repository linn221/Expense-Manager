<?php
require_once ROOT_DIR . "/functions/functions.php";

_archive_api_main();
function debug()
{
    $_POST['selected'] = CATEGORY;
    $_POST['id'] = 5;
}

function _archive_api_main()
{
    $conn = connectMysql();
    $selected = $_POST['selected'];
    if ($selected === CATEGORY) {
        _archive_api_category($conn);
    }
    if ($selected === ITEM) {
        _archive_api_item($conn);
    }
    error("Invalid api call.");
}

function _validateRequestParams(): void
{
    // do validations
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        error("This api only accept GET method");
    }
    $selected = $_POST['selected'];
    if (!in_array($selected, VALID_SELECTORS)) {
        error("Invalid selected");
    }
    // validations
    if (!is_numeric($_POST['id'])) {
        error("Id parameter has to be a number");
    }
}

function _archive_api_category($conn)
{
    $id = (int) $_POST['id'];
    // $id = 5;
    if (($e_code = archiveCategory($id, $conn)) > 0) {
        // dd($_POST);
        redirect("./category.php");
    } else if ($e_code === VALIDATE_ERROR) {
        error("Id doesn't exist");
    } else if ($e_code === DB_ERROR) {
        error("Db error");
    }
}

function _archive_api_item(mysqli $conn)
{
    $id = (int) $_POST['id'];
    if (($e_code = archiveItem($id, $conn)) >= 0) {
        redirect("./item.php");
    } else if ($e_code === -4) {
        error("Id doesn't exist");
    } else if ($e_code === -1) {
        error("Error saving file");
    }
}
