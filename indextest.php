<?php
    include "connn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Placement</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="index1.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Campus Placement</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Login</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="admin.php">Admin Login</a>
                            <a class="dropdown-item" href="slogin.php">Student login</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section text-center py-5">
        <div class="container">
            <h1>Welcome to Campus Placement</h1>
            <p class="lead">Your gateway to a successful career. Find the best opportunities with us.</p>
            <a class="btn btn-primary btn-lg" href="#about" role="button">Get Started</a>
        </div>
    </div>

    <!-- About Section -->
    <div class="img2">
    <section id="about" class="py-5 bg-light position-relative ">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <p class="lead text-center">Campus Placement is dedicated to connecting students with top-notch companies
                for promising career opportunities. We strive to bridge the gap between students and employers, making
                the recruitment process seamless and efficient.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item text-center">
                        <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                        <h4>Student Profiles</h4>
                        <p>Build and showcase your professional profile to attract recruiters.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item text-center">
                        <i class="fas fa-briefcase fa-3x mb-3"></i>
                        <h4>Job Listings</h4>
                        <p>Explore a variety of job opportunities from reputable companies.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item text-center">
                        <i class="fas fa-check-circle fa-3x mb-3"></i>
                        <h4>Application Tracking</h4>
                        <p>Track the status of your job applications and stay organized.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container bg-white w-50 ">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="contactins.php" method="post">
                        <div class="form-group  ">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>