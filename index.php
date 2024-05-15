<?php
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 1);
	if(!isset($_SESSION['loggedin']) || !isset($_SESSION['email'])){
		header("Location: login.php"); // Redirect to login page
        exit();
	}
?>

<?php
include "connection.php";
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
	<title>Display</title>
	
	<link rel="stylesheet"
		href="responsive.css">
         <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="index.css">
</head>

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
                <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <!-- <a href="add-new.php" class="btn btn-danger mb-3">Add New Job</a> -->

    <table border="1" class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Department</th>
          <th scope="col">Location</th>
          <th scope="col">Minimum Qualification</th>
		  <th scope="col">Experience</th>
		  <th scope="col">Job Description</th>
		  <th scope="col">Start Date</th> <!-- New column -->
    <th scope="col">End Date</th> <!-- New column -->
    <th scope="col">URL</th> <!-- New column for URL -->
    <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `jobs`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["Title"] ?></td>
            <td><?php echo $row["Department"] ?></td>
            <td><?php echo $row["Location"] ?></td>
            <td><?php echo $row["MinimumQualification"] ?></td>
			<td><?php echo $row["Experience"] ?></td>
			<td class="job-description"><?php echo nl2br($row["JobDescription"]) ?></td>

			<td><?php echo $row["StartDate"] ?></td> <!-- Display Start Date -->
      <td><?php echo $row["EndDate"] ?></td> <!-- Display End Date -->
      <td><a class='url' href="<?php echo $row["url"] ?>"><?php echo $row["url"] ?></a></td> <!-- Display URL -->  
            <td>
              <a href="edit.php?ID=<?php echo $row["ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?ID=<?php echo $row["ID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
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
