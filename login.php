<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Email'];
    $pass = $_POST['Password'];

    $q = "SELECT * FROM `admin` WHERE email = '$email'";
  
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
       {      
           
            if ($row['Password'] == $pass) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("Location: admin.php"); // Redirect to admin page
                exit();
            } 
            else {
                $error = "Incorrect password";
            }
        }
        
    } 
    else {
      $error = "User does not exist";
  }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Bordered form */

        div.form{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            margin-top:50px;
            width:100%;
            font-family:serif;
        }
form {
  border: 3px solid #f1f1f1;
  width:40%;
  justify-content:center;
  align-items:center;
  font-family:serif;
  
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 95%;
  padding: 12px 20px;
  margin: 8px 0;
  display:block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=email], input[type=password] {
  width: 95%;
  padding: 12px 20px;
  margin: 8px 0;
  display:block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}



/* Set a style for all buttons */
div.btn{
  display:flex;
  /* justify-content:center; */
}
button {
  background-color:black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 95%;
  font-family:serif;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}



/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 20%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}



/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
 
.error-message {
            background-color: #ffdddd;
            border: 1px solid #f44336;
            color: #f44336;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            width: 50%;
            max-width: 400px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        div#Error {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin: 0;
            font-family: serif;
        }
        
        </style>
</head>
<body>
<div>
<div id="Error">
        <?php if (!empty($error)) { ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php } ?>
    </div>
    </div>
<div class="form">
<form action="" method="post">
  <div class="imgcontainer">
    <img src="./images/jafferlogo.png" alt="logo" height="40%" class="avatar">
  </div>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="Email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>
<div class="btn">
<button type="submit">Login</button>
</div>
    
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  
</form>
</div>
    
</body>
</html>