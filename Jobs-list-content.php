 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="456.css">
    <style>
        /* Your styles remain unchanged */
    
        

    </style>
</head>
<body>
    <nav style="background-color: #bb1c1c;" class="navbar navbar-expand-lg custom-bg m-0 bg-black  ">
        <div  class="container-fluid">
        <a style="color: #fff;" class="navbar-brand"  href="index.html">Admin Panel</a>
        <a style="color: #fff;" class="navbar-brand text-end   "  href="index.html">Go Back</a>
      
            
        </div>
    </nav>
    <div id="admin-panel">
    <div id="sidebar">
            <!-- <h2 class="mt-2 mb-4 text-danger  ">Admin Panel</h2> -->
            
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('dashboard-dropdown')">Dashboard</a>
                <div id="dashboard-dropdown" class="dropdown-content text-bg-danger  ">
                    <a href="Jobs-content.php">Jobs</a>
                    <a href="Applications-content.php" >Applications</a>
                    <a href="Placement-Statistics-content.php" >Placement Statistics</a>
                    <a href="Companies-content.php" >Companies</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Jobs-dropdown')">Jobs</a>
                <div id="Jobs-dropdown" class="dropdown-content text-bg-danger">
                    <a href="Jobs-list-content.php">Job List</a>
                    <a href="add-job-content.php">New Jobs</a>
                </div>
            </div>
            
            <!-- <a href="#" onclick="showSection('students-content')">Students</a> -->
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Students-dropdown')">Students</a>
                <div id="Students-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="Add-Students-content.php">Add Students</a>
                    <a href="manage-Students-content.php">Manage Students</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('communication-dropdown')">Communication</a>
                <div id="communication-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="send-notifications-content.php">Send Notifications</a>
                    <a href="manage-announcement-content.php">Manage Announcement</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Settings-dropdown')">Settings</a>
                <div id="Settings-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="General-Settings-content.php">General Settings</a>
                    <a href="Account-Settings-content.php">Account Settings</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Security-dropdown')">Security</a>
                <div id="Security-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="Change-Passwords-content.php">Change Passwords</a>
                    
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Support-dropdown')">Support</a>
                <div id="Support-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="Feedback-content.php">Feedback</a>
                    <a  href="Help-Center-content.php">Help Center</a>

                    
                </div>
            </div>
            <a href="logout.php">Logout</a>
            
            <!-- <a href="#" onclick="showSection('add-job-content')">Add Job</a> -->
            <!-- Add more sidebar links as needed -->
        </div>
        <!-- navbar end -->   
            
        <div class="jobs">
        <div class="joblist1">
            <div id="Jobs-List-content" class="content-section">

    <h1 id=job-label>Job List</h1>

    <table class="table-responsive ">
        <thead>
            <th class="border-2 ">Company Name</th>
            <th class="border-2 ">Position</th>
            <th class="border-2 ">Job Category</th>
            <th class="border-2 ">Job Type</th>
            <th class="border-2 ">Posted Date</th>
            <th class="border-2 ">Last Date To Apply</th>
            <th class="border-2 ">Close Date</th>
            <th class="border-2 ">Action</th>
           
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "addjob";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // $conn1 = new mysqli ('localhost','root' , '' , 'addjob');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $display_data = mysqli_query($conn, "SELECT * FROM `jobs`");

            if (mysqli_num_rows($display_data) > 0) {
                while ($row = mysqli_fetch_assoc($display_data)) {
                    ?>
                    <tr>
                        <td class="bg-light border-2 "><?php echo $row['companyName'] ?></td>
                        <td class="bg-light border-2"><?php echo $row['position'] ?></td>
                        <td class="bg-light border-2"><?php echo $row['jobCategory'] ?></td>
                        <td class="bg-light border-2"><?php echo $row['jobType'] ?></td> 
                        <td class="bg-light border-2"><?php echo $row['postedDate'] ?></td>
                        <td class="bg-light border-2"><?php echo $row['lastDateToApply'] ?></td>
                        <td class="bg-light border-2"><?php echo $row['CloseDate'] ?></td>
                   

                        <td class="bg-light border-2">
                            <div class="">
                                <a href="deletejob.php?delete=<?php echo $row['id'] ?>" class="btn1-edit btn btn-primary m-1 col-10">Delete</a>
                                <!-- <a href="edit.php?edit=<?php echo $row['id'] ?>" class="btn1">Edit</a> -->
                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn1-edit btn btn-success  m-1 col-10">Edit</a>
                                
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='14'>No job listings found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>
            </div>
            </div>

        


    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(sectionId).style.display = 'block';
        }

        function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
        
    </script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>


  
