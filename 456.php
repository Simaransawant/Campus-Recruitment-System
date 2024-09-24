<!-- Updated script in the head section of your HTML file -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        showSection('dashboard-content');
    });

    function loadContent(contentPath) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
                sessionStorage.setItem('currentContent', contentPath);
            }
        };
        xhttp.open("GET", contentPath, true);
        xhttp.send();
    }

    function showSection(sectionId) {
        var sections = document.getElementsByClassName('content-section');
        for (var i = 0; i < sections.length; i++) {
            sections[i].style.display = 'none';
        }
        document.getElementById(sectionId).style.display = 'block';

        var storedContent = sessionStorage.getItem('currentContent');
        if (storedContent) {
            loadContent(storedContent);
        }
    }

    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        var dropdowns = document.getElementsByClassName('dropdown-content');
        for (var i = 0; i < dropdowns.length; i++) {
            if (dropdowns[i] !== dropdown) {
                dropdowns[i].style.display = 'none';
            }
        }
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    // Add this event listener to close dropdown when clicking open dropdown button
    document.addEventListener("click", function (event) {
        var dropdownButtons = document.getElementsByClassName('dropdown-button');
        for (var i = 0; i < dropdownButtons.length; i++) {
            if (event.target.matches('.dropdown-button')) {
                var dropdownId = event.target.getAttribute('data-dropdown');
                var dropdown = document.getElementById(dropdownId);
                dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
            }
        }
    });
</script>






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
                    <a  href="#" onclick="showSection('Jobs-content')">Jobs</a>
                    <a href="#" onclick="showSection('Applications-content')">Applications</a>
                    <a href="#" onclick="showSection('Placement-Statistics-content')">Placement Statistics</a>
                    <a href="#" onclick="showSection('Companies-content')">Companies</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Jobs-dropdown')">Jobs</a>
                <div id="Jobs-dropdown" class="dropdown-content text-bg-danger">
                    <a href="joblist.php" onclick="showSection('Jobs-List-content')">Job List</a>
                    <a href="#" onclick="showSection('add-job-content')">New Jobs</a>
                </div>
            </div>
            
            <!-- <a href="#" onclick="showSection('students-content')">Students</a> -->
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Students-dropdown')">Students</a>
                <div id="Students-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Add-Students-content')">Add Students</a>
                    <a href="managestudents.php" onclick="showSection('manage-Students-content')">Manage Students</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('communication-dropdown')">Communication</a>
                <div id="communication-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('send-notifications-content')">Send Notifications</a>
                    <a href="#" onclick="showSection('manage-announcement-content')">Manage Announcement</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Settings-dropdown')">Settings</a>
                <div id="Settings-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('General-Settings-content')">General Settings</a>
                    <a href="#" onclick="showSection('Account-Settings-content')">Account Settings</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Security-dropdown')">Security</a>
                <div id="Security-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Change-Passwords-content')">Change Passwords</a>
                    
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Support-dropdown')">Support</a>
                <div id="Support-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Feedback-content')">Feedback</a>
                    <a  href="#" onclick="showSection('Help-Center-content')">Help Center</a>

                    
                </div>
            </div>
            <a href="#" onclick="showSection('Logout-content')">Logout</a>
            
            <!-- <a href="#" onclick="showSection('add-job-content')">Add Job</a> -->
            <!-- Add more sidebar links as needed -->
        </div>

        <!-- navbar end -->

        <div id="content">
           
            <div class="dashboard">
            <div id="dropdown-content" class="content-section">
                <!-- Content for Dashboard goes here -->
                <h3>Dashboard Section</h3>
                <p>Content for the Dashboard section...</p>
            </div>
        </div>
            
        <div class="jobs">
            <div id="add-job-content" class="content-section">
                
                
                <form action="#" method="post">
                    <h1 class="FormTitle">New Job</h1>
                    <label for="companyName">Company Name:</label>
                    <input type="text" id="companyName" name="companyName" required>
            
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" required>
            
            
                    <label for="jobCategory">Job Category:</label>
                    <select id="jobCategory" name="jobCategory" required>
                        <option value="Security-Analyst">Security Analyst</option>
                        <option value="Java-Developer">Java Developer</option>
                        <option value="Web-Developer">Web Developer</option>
                        <option value="Graphic-Designer">Graphic Designer</option>
                    </select>
            
                    <label for="jobType">Job Type:</label>
                    <select id="jobType" name="jobType" required>
                        <option value="full-time">Full-Time</option>
                        <option value="part-time">Part-Time</option>
                        <option value="contract">Contract</option>
                        <option value="temporary">Temporary</option>
                    </select>

                    <label for="No.ofVacancy">No. of Vacancy:</label>
                    <input type="number" id="No.ofVacancy" name="noOfVacancy" required>

                    <label for="SelectExperience">Select Experience:</label>
                    <select id="SelectExperience" name="SelectExperience" required>
                        <option value="1-yr">1 yr</option>
                        <option value="2-yr">2 yr</option>
                        <option value="3-yr">3 yr</option>
                        <option value="4-yr">4 yr</option>
                    </select>
                     
                    <label for="postedDate">Posted Date:</label>
                    <input type="date" id="postedDate" name="postedDate" required>
            
                    <label for="lastDateToApply">Last Date To Apply:</label>
                    <input type="date" id="lastDateToApply" name="lastDateToApply" required>

                    <label for="CloseDate">Close Date:</label>
                    <input type="date" id="CloseDate" name="CloseDate" required>

                    <label for="SelectGender">Select Gender::</label>
                    <select id="SelectGender" name="SelectGender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
            
                    <label for="SalaryFrom">Salary From:</label>
                    <input type="number" id="SalaryFrom" name="SalaryFrom" required>

                    <label for="SalaryTo">Salary To:</label>
                    <input type="number" id="SalaryTo" name="SalaryTo" required>

                    <label for="Location">Location:</label>
                    <select id="Location" name="Location" required>
                        <option value="Male">On-site</option>
                        <option value="Female">Remote</option>
                    </select>
                 <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
            
                    <button type="submit" name="submit">Submit</button>
                </form>
            
            </div>
            </div>
    <!-- students code start -->
    
            <div class="students">
                <div id="Add-Students-content" class="content-section">
                    <!-- Content for Students goes here -->
                    <form action="student_add.php" method="post">
                        <h4 class="FormTitle">Add Students</h4>
                        <div>
                            <label for="studentName">StudentName:</label>
                            <input type="text" id="studentName" name="StudentName" required>
                        </div>
            
                        <div>
                            <label for="studentRoll">RollNumber:</label>
                            <input type="text" id="studentRoll" name="RollNumber" required>
                        </div>
            
                        <div>
                            <label for="studentDepartment">Department:</label>
                            <input type="text" id="studentDepartment" name="Department" required>
                        </div>
            
                        <div>
                            <label for="studentYear">Year:</label>
                            <input type="text" id="studentYear" name="Year" required>
                        </div>
            
                        <button  type="submit" name="submit_add_student">Add Student</button>
                    </form>
                </div>
                <div id="manage-Students-content" class="content-section">
                    <!-- Content for Students goes here -->
                    
<!-- students code end -->




            <div class="communication">
                <div id="communication-content" class="content-section">
                    <!-- Content for Communication goes here -->
                    <h3>Communication Section</h3>
                    <p>Content for the Communication section...</p>
                </div>
                
    
                <div id="send-notifications-content" class="content-section">
                    <!-- Content for Send Notifications goes here -->
                    <form action="#" method="post">
                        <h2 class="FormTitle">Send Notification</h2>
                        <label for="notificationContent">Notification Content:</label>
                        <textarea id="notificationContent" name="notificationContent" placeholder="Enter notification content" rows="4" required></textarea>
            
                        <label for="targetAudience">Target Audience:</label>
                        <select id="targetAudience" name="targetAudience">
                            <option value="students">Students</option>
                            <option value="companies">Companies</option>
                            <option value="all">All</option>
                        </select>
            
                        <button type="submit">Send Notifications</button>
                    </form>
                </div>
                </div>
    
                <div id="manage-announcement-content" class="content-section">
                    <!-- Content for Manage Announcement goes here -->
                    <form action="#" method="post">
                        <h3 class="FormTitle">Add New Announcement</h3>
                        <div>
                            <label for="announcementTitle">Title:</label>
                            <input type="text" id="announcementTitle" required>
                        </div>
            
                        <div>
                            <label for="announcementContent">Content:</label>
                            <textarea id="announcementContent" rows="4" required></textarea>
                        </div>
            
                        <button type="submit">Add Announcement</button>
                    </form>
                </div>
                <div class="settings">
                    <div id="Account-Settings-content" class="content-section">
                        <!-- Content for Manage Announcement goes here -->
                        <form action="#" method="post">
                            <h1 class="FormTitle">Account Settings</h1>
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" placeholder="Enter new username" required>
                
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Enter new email" required>
                
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" placeholder="Enter new password" required>
                
                            <button type="submit">Save Account Settings</button>
                        </form>
                    
                    </div>
                </div>
                <div class="Security">
                    <div id="Change-Passwords-content" class="content-section">
                        <!-- Content for Manage Announcement goes here -->
                            <form id="change-password-form" onsubmit="changePassword(event)">
                                <h1 class="FormTitle">Change Password</h1>
                                <label for="currentPassword">Current Password:</label>
                                <input type="password" id="currentPassword" name="currentPassword" required>
                    
                                <label for="newPassword">New Password:</label>
                                <input type="password" id="newPassword" name="newPassword" required>
                    
                                <label for="confirmNewPassword">Confirm New Password:</label>
                                <input type="password" id="confirmNewPassword" name="confirmNewPassword" required>
                    
                                <button type="submit">Change Password</button>
                            </form>
                    
                            <div id="error-message" class="error-message"></div>
                        
                        
                    </div>
                </div>
                <div class="support">
                    <div id="Feedback-content" class="content-section">
                       
                        <form action="#" method="post">
                            <h2 class="FormTitle">Feedback Form</h2>
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" required>
                
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" required>
                
                            <label for="message">Feedback Message:</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                
                            <button type="submit">Submit Feedback</button>
                        </form>
                       
                        
                    </div>
                </div>
            </div>

            
            
            </div>
        </div>

         
        </div>
        </div>
    </div>

    <!-- <script>
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
        
    </script> -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>


  
