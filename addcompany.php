<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration</title>
    <link rel="stylesheet" href="addcompany.css">
</head>

<body>
    <div class="logo">
        <img src="/images/logo1.png" alt="">
    </div>
    <div>
        <div class="container">
            <h1 class="FormTitle">COMPANY REGISTRATION FORM</h1>
            <form action="Registration1.php" method="post">
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="CompanyName">Company Name</label>
                        <input type="text" id="CompanyName" name="CompanyName">

                    </div>
                    
                    <div class="user-input-box">
                        <label for="Email"> Email</label>
                        <input type="email" id="Email" name="Email">
                        

                    </div>
                    <div class="user-input-box">
                        <label for="Password">Password</label>
                        <input type="password" id="Password" name="Password" placeholder="Enter Password">

                    </div>
                    <div class="user-input-box">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="number" id="PhoneNumber" name="PhoneNumber" placeholder="Enter Phone Number">

                    </div>


                    <div class="user-input-box">
                        <label for="City">City:</label>
                        <select name="City">
                            <option value="0" selected="selected" disabled="disabled" id="select_opt">Please Select</option>
                            <option value="1">Vadodara</option>
                            <option value="2">Ahmedabad</option>
                            <option value="3">Mumbai</option>
                            <option value="4">Pune</option>
                            <option value="5">Other</option>
                        </select>
                    </div>

                    <div class="user-input-box">
                        <label for="State">State:</label>
                        <select name="State">
                            <option value="0" selected="selected" disabled="disabled" id="select_opt">Please Select</option>
                            <option value="1">Gujarat</option>
                            <option value="2">Maharashtra</option>
                            <option value="3">Goa</option>
                            <option value="4">Kerala</option>
                            <option value="5">Rajasthan</option>
                            <option value="5">Punjab</option>
                            <option value="5">Andhra Pradesh</option>
                            <option value="5">Others</option>
                    </div>

                    <div class="user-input-box">
                        <label for="Country">Country:</label>
                        <select name="City">
                            <option value="0" selected="selected" disabled="disabled" id="select_opt">Please Select</option>
                            <option value="1">India</option>
                            <option value="2">Other</option>
                            
                        </select>
                    </div>

                   

                   
                </div>
              
                    <div class="user-input">
                        <label for="UploadCV">Upload CV:</label>
                        <input type="file" id="UploadCV" name="UploadCV">
                    </div>
              

                <div class="Form-submit-btn">
                    <input class="button" type="submit" value="submit">

                    <input class="button" type="reset" value="reset">

                </div>
            </form>
        </div>
        </div>



    
</body>

</html>

<?php
include 'conection.php';


if (isset($_POST['submit'])) {
    // echo "Success";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    //insert query.
    $sql = "insert into employee(name,email,phone,address) values ('$name','$email','$mobile','$address') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:');
    } else {
        echo die("Data not inserted");
    }
}

?>