<?php 
session_start();
$for_session = $_SESSION['username'];
if($for_session == true)
{}
else
{
    header('Location:slogin.php');
}

include 'connections.php';

if (isset($_POST['resupload'])) {
    $p_id = $_POST['s_id'];

    if (empty($_FILES["res"]["tmp_name"])) {
        $_SESSION['msg'] = 'Please select a file to upload.';
        header('Location:studentpanelpage.php');
        exit();
    }

    if ($_FILES["res"]["size"] > 2000000) { 
        $_SESSION['msg'] = 'File size exceeds 2MB limit.';
        header('Location:studentpanelpage.php');
        exit();
    }

    // Prepare the data for insertion into the database
    $file_name = $_FILES["res"]["name"];
    $file_type = $_FILES["res"]["type"];
    $file_size = $_FILES["res"]["size"];
    $file_content = file_get_contents($_FILES["res"]["tmp_name"]);

    // Check if the file already exists for the given user
    $check_query = "SELECT * FROM report_upload WHERE s_name = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("s", $p_id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // File exists, update it
        $update_query = "UPDATE report_upload SET file_name = ?, file_type = ?, file_size = ?, file_content = ? WHERE s_name = ?";
        $stmt_update = $conn->prepare($update_query);
        $stmt_update->bind_param("ssiss", $file_name, $file_type, $file_size, $file_content, $p_id);

        if ($stmt_update->execute()) {
            $_SESSION['msg'] = 'File updated successfully.';
            header('Location:studentpanelpage.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Error updating file: ' . $stmt_update->error;
            header('Location:studentpanelpage.php');
            exit();
        }
    } else {
        // File doesn't exist, insert it
        $insert_query = "INSERT INTO report_upload (file_name, file_type, file_size, file_content, s_name) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("ssiss", $file_name, $file_type, $file_size, $file_content, $p_id);

        if ($stmt_insert->execute()) {
            $_SESSION['msg'] = 'File uploaded successfully.';
            header('Location:studentpanelpage.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Error uploading file: ' . $stmt_insert->error;
            header('Location:studentpanelpage.php');
            exit();
        }
    }
} elseif (isset($_POST['Delete'])) {
    $p_id = $_POST['s_id'];

    // Check if the file exists for the given user
    $check_query = "SELECT * FROM report_upload WHERE s_name = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("s", $p_id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // File exists, delete it
        $delete_query = "DELETE FROM report_upload WHERE s_name = ?";
        $stmt_delete = $conn->prepare($delete_query);
        $stmt_delete->bind_param("s", $p_id);

        if ($stmt_delete->execute()) {
            $_SESSION['msg'] = 'File deleted successfully.';
            header('Location:studentpanelpage.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Error deleting file: ' . $stmt_delete->error;
            header('Location:studentpanelpage.php');
            exit();
        }
    } else {
        $_SESSION['msg'] = 'No file exists for deletion.';
        header('Location:studentpanelpage.php');
        exit();
    }
} else {
    $_SESSION['msg'] = 'Invalid request.';
    header('Location:studentpanelpage.php');
    exit();
}
?>
