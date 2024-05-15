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

$ID = $_GET["ID"];

if (isset($_POST["submit"])) {
    $Title = $_POST['Title'];
    $Department = $_POST['Department'];
    $Location = $_POST['Location'];
    $MinimumQualification = $_POST['MinimumQualification'];
    $Experience = $_POST['Experience'];
    $JobDescription = $_POST['JobDescription'];
    $StartDate =  date('Y-m-d', strtotime($_POST['StartDate']));
    $EndDate = date('Y-m-d', strtotime($_POST['EndDate']));
	$URL = $_POST['URL']; 
    $sql = "UPDATE `jobs` SET `Title`='$Title',`Department`='$Department',`Location`='$Location',`MinimumQualification`='$MinimumQualification',`Experience`='$Experience',`JobDescription`='$JobDescription',`StartDate`='$StartDate',`EndDate`='$EndDate',`URL`='$URL' WHERE ID = $ID";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
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
	<title>Edit Jobs</title>
	
	<link rel="stylesheet"
		href="responsive.css">
        
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 

<!-- jquery links  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- css sheet  -->
   <link rel="stylesheet" href="edit.css">
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
    <div class="text-center mb-4">
      <h3>Edit Job Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `jobs` WHERE ID = $ID LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
	<form action="" method="post" style="width:50vw; min-width:300px;">
    <div class="row mb-3">
        <div class="col">
		<label class="form-label">Title:</label>
        <input type="text" required class="form-control letters-only" name="Title" value="<?php echo $row['Title'] ?>" placeholder="Software Engineer"
               pattern="[A-Za-z ]{1,20}" oninput="this.setCustomValidity('');">
            
        </div>
		<div class="mb-3">
    <label class="form-label">URL:</label>
    <input type="text" class="form-control" name="URL" value="<?php echo $row['url'] ?>">
</div>
<div class="row mb-3">
		<div class="col">
          <label class="form-label">Department:</label>
		  <br>
		  <select class="js-example-responsive form-control" style="width:70%" name="Department">
		  <option disabled selected><?php echo $row['Department'] ?></option>
		  <option value="Accounts & Finance-ENA">Accounts & Finance-ENA</option>
              <option value="Wind Power Project">Wind Power Project</option>
              <option value="Technical Services">Technical Services</option>
			  <option value="Stores & Logistics">Stores & Logistics</option>
			  <option value="Solar-ENA">Solar-ENA</option>
			  <option value="Solar">Solar</option>  
			   <option value="Services">Services</option> 
			     <option value="Seed">Seed</option>  
				 <option value="SAP(Shaheen project)">SAP(Shaheen project)</option>
				 <option value="Sales-HKPL">Sales-HKPL</option>
				 <option value="Sales-Export">Sales-Export</option>
				 <option value="Sales-ENA">Sales-ENA</option>
				    <option value="Sales-Devices">Sales-Devices</option>
				 <option value="Sales">Sales </option>  
				 <option value="Rice Project">Rice Project</option>
				 <option value="Rental Machinery">Rental Machinery</option>  
				  <option value="Radar Equipment Installation (Karachi)">Radar Equipment Installation (Karachi)</option> 
				  <option value="Quality Control Lab">Quality Control Lab</option>
				  <option value="Quality Control">Quality Control</option> 
				  <option value="Quality Assurance-HKPL">Quality Assurance-HKPL</option>
				  <option value="Project Management-HKPL">Project Management-HKPL</option> 
				    <option value="PS Implementation Services">PS Implementation Services</option> 
			    <option value="Production-Devices">Production-Devices</option>
				<option value="Production Export">Production Export</option>
				<option value="Production">Production</option>
				<option value="Procurement-Devices">Procurement-Devices</option>
				<option value="Pesticides Sales">Pesticides Sales</option>
				<option value="Point Next">Point Next</option>
				<option value="Power Solution">Power Solution</option>
				<option value="Power Systems">Power Systems</option>
				<option value="Product-HKPL">Product-HKPL</option>
				<option value="Logistics">Logistics</option>
				<option value="Lubricants">Lubricants</option>
				<option value="Pesticide Logistic">Pesticide Logistic</option>
				<option value="People & Culture">People & Culture</option>
				<option value="Own SLA">Own SLA</option>
				<option value="Operations Excellence">Operations Excellence</option>
				<option value="O&M(Operation & Maintenance)">O&M(Operation & Maintenance)</option>
				<option value="NSM Office">NSM Office</option>
				<option value="Net Services">Net Services</option>
				<option value="MBL-Service">MBL-Service</option>
                <option value="Marketing-HKPL">Marketing-HKPL</option>
				<option value="Marketing-ENA">Marketing-ENA</option>
				<option value="Marketing">Marketing</option>
				<option value="Managed Services">Managed Services</option>
				<option value="Machinery Spare Parts">Machinery Spare Parts</option>
				<option value="Machinery Service">Machinery Service</option>
				<option value="Machinery Sales / Agri Equipment">Machinery Sales / Agri Equipment</option>
				<option value="Machinery Sales">Machinery Sales</option>
				<option value="Machinery Logistics">Machinery Logistics</option>
				<option value="Animal Health">JC Microsoft Implementation</option>
				<option value="Administration">Administration</option>
                  <option value="Logistic-ENA">Logistic-ENA</option>
				<option value="JI Solution/Hardware (Networking)">JI Solution/Hardware (Networking)</option>
				<option value="JI Hardware (Servers)">JI Hardware (Servers)</option>
				<option value="JI Hardware (PC & Laptops)">JI Hardware (PC & Laptops)</option>
				<option value="JI Hardware">JI Hardware</option>
				<option value="JCS Exports">JCS Exports</option>
				<option value="JC SAP Implementation">JC SAP Implementation</option>
				<option value="JC Sales/Oracle SLA">JC Sales/Oracle SLA</option>
				<option value="JC Sales/MS LSP">JC Sales/MS LSP</option>
				<option value="JC Sales Operation">JC Sales Operation</option>
				<option value="JC Oracle Implementation">JC Oracle Implementation</option>
				<option value="JC AWS Implementation">JC AWS Implementation</option>
              <!-- ... (other department options) ... -->
              <option value="JBS Export">JBS Export</option>
              <option value="Jaffer Engineering Services">Jaffer Engineering Services</option>
			  <option value="IOT-ENA">IOT-ENA</option>
			  <option value="IOT(E&AP)">IOT(E&AP)</option>
			  <option value="Internet of Things">Internet of Things</option>
			  <option value="Import & Purchasing">Import & Purchasing</option>
			  <option value="Installation">Installation</option>
			  <option value="Impare Sales">Impare Sales</option>
			  <option value="Impare Implementation">Impare Implementation</option>
			  <option value="Audit & Corporate Matters">Audit & Corporate Matters</option>

			  <option value="ICT">ICT</option>
			  <option value="Human Resources">Human Resources</option>
			  <option value="HILTI Services">HILTI Services</option>
			  <option value="HILTI Sales">HILTI Sales</option>
			  <option value="HEIS Designer">HEIS Designer</option>
			  <option value="HEIS Agronomist">HEIS Agronomist</option>
			  <option value="HEIS">HEIS</option>
			  <option value="Group Supply Chain">Group Supply Chain</option>
			  <option value="Group IT">Group IT</option>
			  <option value="Group Business Relations">Group Business Relations</option>
			  <option value="Finance">Finance</option>
			  <option value="Fertilizer">Fertilizer</option>
			  <option value="ENA">ENA</option>
			  <option value="Dupont Secretariat">Dupont Secretariat</option>
			  <option value="Director Secretariat">Director Secretariat</option>
			  <option value="Development-HKPL">Development-HKPL</option>
			  <option value="Development">Development</option>
			  <option value="Data-Devices">Data-Devices</option>
			  <option value="Customer Care Centert">Customer Care Center</option>
			  <option value="Customer & Service Support-ENA">Customer & Service Support-ENA</option>
			  <option value="Director Secretariat">Director Secretariat</option>                

<option value="Corporate Matters">Corporate Matters</option>
<option value="Corporate Finance">Corporate Finance</option>
<option value="Corporate Communications">Corporate Communications</option>
<option value="Computer Parts HQ">Computer Parts HQ</option>
<option value="Commercial Planning">Commercial Planning</option>
<option value="Coal Mining (Thar)">Coal Mining (Thar)</option>
<option value="CMO Office">CMO Office</option>
<option value="Chief Executive Secretariat">Chief Executive Secretariat</option>
<option value="Chairman Secretariat">Chairman Secretariat</option>
<option value="Casual Stores & Logistics">Casual Stores & Logistics</option>
<option value="Casual Production">Casual Production</option>
<option value="Business Excellence & Innovation">Business Excellence & Innovation</option>
<option value="Casual Administrationn">Casual Administration</option>
<option value="Branch Management">Branch Management</option>
<option value="Bio Tech Lab">Bio Tech Lab</option>
<option value="Big Data Analytics">Big Data Analytics</option>
<option value="B2B">B2B</option>
  </select>
        
       
    </div>

    <div class="col">
	<label class="form-label">Location:</label>
		  <br>
		  <select class="js-example-responsive form-control" style="width: 50%" name="Location">
		  <!-- <option value="" disabled selected>Select a department</option> -->
		  <option value="" disabled selected><?php echo $row['Location'] ?></option>
           <option value="Gilgit">Gilgit</option>
              <option value="Ghotki">Ghotki</option>
			  <option value="Faisalabad">Faisalabad</option>
			  <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
			  <option value="Depalpur">ADepalpur</option>
			  <option value="Deharki">Deharki</option>
			  <option value="Chiniot">Chiniot</option>
			  <option value="Burewala">Burewala</option>
			  <option value="Bahawalpur">Bahawalpur</option>
			  <option value="Badin">Badin</option>
			  <option value="Vehari">Vehari</option>
		       <option value="Thatta">Thatta</option>
	         <option value="Thar">Thar</option>
			  <option value="Swat">Swat</option>
			  <option value="Swabi">Swabi</option>
		     <option value="Sukkur">Sukkur</option>
			  <option value="Sialkot">Sialkot</option>
			  <option value="Sheikhupura">Sheikhupura</option>
			  <option value="Shaheed Benazirabad">Shaheed Benazirabad</option>
			  <option value="Sargodha">Sargodha</option>
			  <option value="Sahiwal">Sahiwal</option>
              <option value="Sadiqabad">Sadiqabad</option>
			  <option value="Rawalpindi">Rawalpindi</option>
			  <option value="Rajanpur">Rajanpur</option>
			  <option value="Rahim Yar Khan">Rahim Yar Khan</option>
			  <option value="Quetta">Quetta</option>
			  <option value="Peshawar">Peshawar</option>
			  <option value="Okara">Okara</option>
			  <option value="Nawabshah">Nawabshah</option>
			  <option value="Multan">Multan</option>
			  <option value="Mirpurkhas">Mirpurkhas</option>
			  <option value="Mianchannu">Mianchannu</option>
			  <option value="Mehrabpur">Mehrabpur</option>
			  <option value="Mansehra">Mansehra</option>
		      <option value="Mandi Bahauddin">Mandi Bahauddin</option>
			  <option value="Lodhran">Lodhran</option>
			  <option value="Layyah">Layyah</option>
			  <option value="Lahore">Lahore</option>
			  <option value="Kunri">Kunri</option>
			  <option value="Kot Addu">Kot Addu</option>
			  <option value="Khanpur">Khanpur</option>
			  <option value="Khanewal">Khanewal</option>
			  <option value="Kehror Pacca">Kehror Pacca</option>
			  <option value="Kasur">Kasur</option>
			  <option value="Karachi">Karachi</option>
			  <option value="Jampur">Jampur</option>
			  <option value="Jacobabad">Jacobabad</option>
			  <option value="Gojra">Gojra</option>
			  <option value="Hyderabad">Hyderabad</option>
			  <option value="Hasilpur">Hasilpur</option> 
			   <option value="Gujranwala">Gujranwala</option>
			

  </select>
    </div>
	</div>
	<div class="mb-3">
    <label class="form-label">Start Date</label>
    <input type="date" class="form-control" name="StartDate" value="<?php echo $row['StartDate'] ?>">
</div>

<div class="mb-3">
    <label class="form-label">End Date</label>
    <input type="date" class="form-control" name="EndDate" value="<?php echo $row['EndDate'] ?>">
</div>

    <div class="mb-3">
	<label class="form-label">Minimum Qualification:</label>
        <input type="text" required class="form-control letters-only" name="MinimumQualification"
               placeholder="Bachelors in Software Engineering" pattern="[A-Za-z ]{1,50}"
               oninput="this.setCustomValidity('');" value="<?php echo $row['MinimumQualification'] ?>">
        
        
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Experience</label>
            <input type="number" class="form-control" name="Experience" min="0" value="<?php echo $row['Experience'] ?>">
        </div>

        <div class="col">
		<label class="form-label">Job Description:</label>
    <textarea class="form-control letters-only" required name="JobDescription" placeholder="Job description"
	pattern="^[a-zA-Z. ]+$" maxlength="20" oninput="this.setCustomValidity('');"><?php echo $row['JobDescription'] ?></textarea>
            <!-- <textarea class="form-control" name="JobDescription"><?php echo $row['JobDescription'] ?></textarea> -->
        </div>
    </div>
	

    <div>
        <button type="submit" class="btn btn-danger" name="submit">Update</button>
    </div>
</form>

    </div>
  </div>

				
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Bootstrap -->
<script>
	// JavaScript to allow only letters and characters in specified input fields
const letterInputFields = document.querySelectorAll('.letters-only');

letterInputFields.forEach((field) => {
  field.addEventListener('input', function () {
    // Remove any non-letter and non-character characters
    this.value = this.value.replace(/[^a-zA-Z. ]/g, '');

    // Display a prompt if numbers are entered
    if (/[^a-zA-Z. ]/.test(this.value)) {
      alert('Only letters and characters are allowed. Numbers are not permitted.');
      this.value = this.value.replace(/[^a-zA-Z. ]/g, ''); // Remove numbers
    }
  });
});
	$(document).ready(function(){
			$('.js-example-responsive').select2({width: 'resolve'});
        
        });
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
</body>
</html>
