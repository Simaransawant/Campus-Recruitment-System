<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'campus');

if (isset($_POST['submit'])) {
    // Retrieve form data
    $Name = $_POST['username'];
    $fathername = $_POST['fathername'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $age = $_POST['age'];
    $tenthperc = $_POST['tenthperc'];
    $twelthperc = $_POST['twelthperc'];
    $Course = $_POST['coursename'];
    $YearLevel = $_POST['yearlevel'];
    $lastsemperc = $_POST['lastsemperc'];
    $image = $_FILES['studentimage']['name'];
    $image_tmp = $_FILES['studentimage']['tmp_name']; // Temporary location of the file

    // Check if the image file already exists
    if (file_exists("upload/" . $_FILES['studentimage']['name'])) {
        $_SESSION['status'] = "Image already exists: " . $image;
        header('Location: index.php');
        exit(); // Exit after redirection
    } else {
        // Move the uploaded file to the desired directory
        move_uploaded_file($image_tmp, "upload/" . $image);

        // Insert data into the database
        $query = "INSERT INTO `studentprofile` (`username`,`fathername`,`lastname`,`email`,`contactnumber`,`age`,`tenthperc`,`twelthperc`,`coursename`,`yearlevel`,`lastsemperc`,`studentimage`)
                  VALUES('$Name','$fathername','$lastname','$email','$contactnumber','$age','$tenthperc','$twelthperc','$Course','$YearLevel','$lastsemperc','$image')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['status'] = "Student profile added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . mysqli_error($conn);
        }

        // Redirect to the index page after form submission
        header('Location: index.php');
        exit(); // Exit after redirection
    }
}
?>
