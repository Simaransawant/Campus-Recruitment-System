<?php 
session_start();
$for_session = $_SESSION['username'];
if($for_session == true)
{}
else
{
    header('Location:slogin.php');
}
?>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        restorePageState();
    });

    function loadContent(contentPath) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
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
        sessionStorage.setItem('currentSection', sectionId);
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
        sessionStorage.setItem('openDropdown', dropdown.style.display);

        if (dropdown.style.display === 'block') {
            sessionStorage.setItem('openDropdownId', dropdownId);
        } else {
            sessionStorage.removeItem('openDropdownId');
        }
    }

    function restorePageState() {
        var storedContent = sessionStorage.getItem('currentContent');
        var storedSection = sessionStorage.getItem('currentSection');
        var storedDropdown = sessionStorage.getItem('openDropdown');

        if (storedContent) {
            loadContent(storedContent);
        }

        if (storedSection) {
            showSection(storedSection);
        }

        if (storedDropdown) {
            var dropdownId = sessionStorage.getItem('openDropdownId');
            var dropdown = document.getElementById(dropdownId);

            if (dropdown) {
                dropdown.style.display = storedDropdown;
            }
        }
    }
</script>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="studentpanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-f6HtwAkPwBWLND6pB56zlcymxOOJ0xhGon67T//ma3bNkAkjGPk0p3s1lXhpIvJaPC4lR8pGXGj4EvguJLCLlw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Your styles remain unchanged */

        /* body {
            height: 100%;
    width: 100%; */
            /* position: fixed;
        } */

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #D3D9E9;
        }

        .carousel-control-next,
        .carousel-control-prev {
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 8%;
            height: 12%;
            padding-top: 1.5rem;
            /* margin-left: 5rem; */
            color: black;
            text-align: center;
            /* background: black; */
            border: 0;
            opacity: .5;
            transition: opacity .15s ease;
        }
        .Notification {
            height: 500vh; /* Set height to full viewport height */
        }
    </style>
</head>

<body>
    <nav style="background-color:#161A30;" class="navbar navbar-expand-lg custom-bg m-0 bg-black  ">
        <div class="container-fluid">
            <a style="color: #fff;" class="navbar-brand" href="index.html">Student Dashboard</a>
            <!-- <a style="color: #fff;" class="navbar-brand text-end   " href="#">hello <?php echo $for_session ?></a> -->
            <!-- <a style="color: #fff;" class="navbar-brand text-end   " href="index.html">Go Back</a> -->
            <a href="#" onclick="toggleDropdown('dashboard-dropdown')">Dashboard</a>
            <a class="p-2 " href="#" onclick="showSection('Jobs-content')">Jobs</a>
            <a class="p-2 " href="#" onclick="showSection('Resume-and-Portfolio-content')">Resume and Portfolio</a>
            <a class="p-2 " href="#" onclick="showSection('Interview-Schedule-content')">Interview Schedule</a>
            <a class="p-2 " href="#" onclick="showSection('Job-Applied-content')">Job Applied</a>
            <a class="p-2 " href="#" onclick="showSection('Notification-content')">Notification</a>
            <a class="p-2 " href="#" onclick="showSection('Feedback-content')">Feedback</a>
            <a class="p-2 " href="#" onclick="showSection('Logout-content')">Logout</a>
          


        </div>
    </nav>
    <div id="admin-panel">
        <!-- <div id="sidebar" style="width: 200px; background-color:#31304D;">
            <h2 class="mt-2 mb-4 text-danger  ">Admin Panel</h2>


            <a href="#" onclick="toggleDropdown('dashboard-dropdown')">Dashboard</a>
            <a class="p-2 " href="#" onclick="showSection('Jobs-content')">Jobs</a>
            <a class="p-2 " href="#" onclick="showSection('Resume-and-Portfolio-content')">Resume and Portfolio</a>
            <a class="p-2 " href="#" onclick="showSection('Interview-Schedule-content')">Interview Schedule</a>
            <a class="p-2 " href="#" onclick="showSection('Job-Applied-content')">Job Applied</a>
            <a class="p-2 " href="#" onclick="showSection('Notification-content')">Notification</a>
            <a class="p-2 " href="#" onclick="showSection('Feedback-content')">Feedback</a>
            <a class="p-2 " href="#" onclick="showSection('Logout-content')">Logout</a>
           

        </div> -->
        <!-- navbar end -->

        <div id="content" class="p-0">

            <div class="jobs p-0 " style="width: 600px; margin-right: 15px; ">
                <div id="Jobs-content" class="content-section " style="width: 980px; ">
                <?php
                
                if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                
                echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong class=""> '. $_SESSION['message'] . '</strong>   
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                
                unset($_SESSION['message']);
                }
                ?>
                    <!-- Content for jobs goes here -->
                    <div class="row">
                        <?php
                        include 'connections.php';
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $display_data = mysqli_query($conn, "SELECT * FROM `jobs`");
                        if (mysqli_num_rows($display_data) > 0) {
                        ?>
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $totalRows = mysqli_num_rows($display_data);
                                    $first = true;
                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($display_data)) {
                                        if ($count % 2 == 0) {
                                            $activeClass = $first ? 'active' : '';
                                    ?>
                                            <div class="carousel-item <?php echo $activeClass; ?>">
                                                <div class="d-flex justify-content-center align-items-center p-4 m-3 ">
                                                <?php
                                            }
                                                ?>
                                                <div class="col-md-6 mb-4" style="margin-right: 10px; margin-left: 10px;">
                                                    <div class="card h-100 w-100" style="background-color: #D3D9E9;">
                                                        <div class="card-body">
                                                            <h4 class="card-title text-center mb-4"><?php echo $row['companyName'] ?></h4>
                                                            <ul class="list-group list-group-flush">
                                                                <!-- <li class="list-group-item"><i class="bi bi-person-fill"></i>&nbsp; <b>Position:</b> <?php echo $row['position'] ?></li> -->
                                                                <li class="list-group-item"><i class="bi bi-person-fill"></i>&nbsp; <b>Category:</b> <?php echo $row['jobCategory'] ?></li>
                                                                <li class="list-group-item"><i class="bi bi-calendar-check-fill"></i>&nbsp; <b> Posted:</b> <?php echo $row['postedDate'] ?></li>
                                                                <li class="list-group-item"><i class="bi bi-calendar-check-fill"></i>&nbsp; <b>Last Date:</b> <?php echo $row['lastDateToApply'] ?></li>
                                                                <li class="list-group-item"><i class="bi bi-currency-rupee"></i>&nbsp; <b>Salary:</b> <?php echo $row['SalaryFrom'] ?> </li>
                                                                <li class="list-group-item">  
                                                                <form class="p-0 m-0 "  action="s_apply.php" method="POST">
                                                                    <input type="hidden" name="job_id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" name="s_username"  value="<?php echo $for_session ?>">
                                                             <button  class="btn btn-primary  d-block mx-auto" style="background-color: #161A30;">
                                                             <i class="fas fa-arrow-circle-right mr-2"></i> Apply Now
                                                             </button>
                                                            </form>
                                                        </li>
                                                            </ul>
                                                          

   
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $count++;
                                                if ($count % 2 == 0 || $count == $totalRows) {
                                                ?>
                                                </div>
                                            </div>
                                    <?php
                                                    $first = false;
                                                }
                                            }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="margin-left: 4rem;">
                                    <span class="carousel-control-prev-icon text-dark" aria-hidden="true" style="background-color: #161A30; border-radius:5px;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="margin-right: 4rem;">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #161A30; border-radius:5px;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        <?php
                        } else {
                            echo "No jobs found.";
                        }

                        mysqli_close($conn); // Close database connection
                        ?>
                    </div>
                </div>
            </div>




            <div class="Resume and Portfolio">
                <div id="Resume-and-Portfolio-content" class="content-section">
                    <!-- Content for Resume and Portfolio goes here -->


                </div>
            </div>

            <div class="Interview Schedule">
                <div id="Interview-Schedule-conten" class="content-section">
                    <!-- Content for Interview Schedule goes here -->

                </div>
            </div>

            <div class="Job Applied">
                <div id="Job-Applied-content" class="content-section">
                    <!-- Content for Job Applied goes here -->


                </div>
            </div>
            <!-- <div class="Notification d-flex justify-content-center align-items-center"> -->
    <div id="Notification-content" class="content-section ">
        <!-- Content for Notification goes here -->
        <div class="container">
            <div class="row justify-content-center m-5  ">
                <div class="col-md-8 m-5 " >
                    <div class="card" style="margin-top: 20px;">
                        <div class="card-header text-center" style="background-color:#161A30; color: white;">
                             Notification
                        </div>
                        <div class="card-body" style="background-color: #D3D9E9;">
                            <?php
                            // Include the database connection file
                            include 'connections.php';

                            // Connect to the database
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Retrieve the latest notification from the database
                            $sql = "SELECT * FROM addnotifications ORDER BY date DESC, time DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="notification-item">
                                        <h3 class="card-title "><?php echo $row['title']; ?></h3>
                                        <p class="card-text"><?php echo $row['content']; ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['date'] . ' ' . $row['time']; ?></small></p>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "No notifications found.";
                            }

                            // Close connection
                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>


<div class="Feedback">
    <div id="Feedback-content" class="content-section">
        <!-- Content for Job Applied goes here -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="form h-auto" action="feedback_insert.php" method="post">
                        <h2 class="FormTitle">Feedback Form</h2>
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Your Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Feedback Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <div class="justify-content-center d-flex align-content-center ">
                            <button class="w-75 btn " style="background-color: #161A30; color: #D3D9E9; "  type="submit">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="Logout">
                <div id="" class="content-section">
                    <!-- Content for Logout goes here -->
                    




                </div>
            </div>

    </div>
    
</div>


            
        </div>
    </div>
    </div>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
