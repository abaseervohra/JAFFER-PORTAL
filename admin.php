
<?php
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 1);
	if(!isset($_SESSION['loggedin']) || !isset($_SESSION['email'])){
		header("Location: login.php"); // Redirect to login page
        exit();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Admin Panel</title>
	
	
        <link rel="stylesheet" href="admin.css">
</head>
<script>
     // Get all elements with the class "clickable-div"
	 var clickableDivs = document.querySelectorAll(".clickable-div");

// Add click event listener to eacclickableDivsh clickable div
.forEach(function(div) {
	div.addEventListener("click", function() {
		var anchorTag = this.querySelector("a");
		if (anchorTag) {
			window.location.href = anchorTag.href;
		}
	});
});
	


</script>
<body>

	<!-- for header part -->
	<header>

		<div class="logosec">
        
        <img src=
"./images/jafferlogo.png" width="70vw" height="80vw"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
			<!-- <div class="logo">Jaffers Admin Portal</div> -->
			
		</div>


		

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
				<div class="nav-option option1">
    <h3>
        <a id="dashboardLink" href="admin.php">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
            Dashboard
        </a>
    </h3>
</div>

<div class="nav-option option3">
    <h3>
        <a id="addNewLink" href="add_new.php">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img" alt="report">
            Add New Job
        </a>
    </h3>
</div>

<div class="nav-option option5">
    <h3>
        <a id="displayJobsLink" href="index.php">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img" alt="blog">
            Display Jobs
        </a>
    </h3>
</div>

<div class="nav-option logout">
    <h3>
        <a id="logoutLink" href="_logout.php">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
            Logout
        </a>
    </h3>
</div>

				</div>
			</nav>
		</div>
		<div class="main">

			

		

			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Jaffer Admin Portal</h1>
					<!-- <button class="view">View All</button> -->
				</div>
                <div class="img">

                <img  src="./images/logo2.png" width="40%" height=30% alt="">
                </div>
                
				
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
    // Get all elements with the class "nav-option"
    var navOptions = document.querySelectorAll(".nav-option");

    // Add click event listener to each nav-option div
    navOptions.forEach(function(option) {
        option.addEventListener("click", function() {
            // Find the anchor tag within the clicked nav-option div
            var anchorTag = this.querySelector("a");
            if (anchorTag) {
                // Programmatically trigger the click on the anchor tag
                anchorTag.click();
            }
        });
    });
</script>


	<!-- <script src="./index.js"></script> -->
</body>
</html>
