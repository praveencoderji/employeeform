<?php
error_reporting();
   $servername='localhost';
    $username='root';
    $password='';
    $dbname = "my_test";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
    if (isset($_POST['signup'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['Firstname']);
        $lname = mysqli_real_escape_string($conn, $_POST['Lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $design = mysqli_real_escape_string($conn, $_POST['design']); 
        $hobbies =  $_POST['hobbies'];
        $b=implode(",",$hobbies);
        if (empty($fname)) {
            $fname_error = "please eneter first name";
        }
         if (empty($lname)) {
            $lname_error = "please eneter last name";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) || empty($email)) {
            $email_error = "Please Enter Valid Email ID";
        }
              
        if(strlen($mobile) < 10 || empty($mobile)) {
            $mobile_error = "enter Mobile number must be minimum of 10 diits";
        }
         if (empty($dob)) {
            $dob_error = "please eneter dob";
        }
         if (empty($gender)) {
            $gen_error = "please Select your gender";
        }
         if (empty($design)) {
            $des_error = "please eneter designation";
        }
         if (empty($hobbies)) {
            $hob_error = "please Select atleast one";
        }
       
        if (!$mysqli_error) {
            if(mysqli_query($conn, "INSERT INTO users(firstname, lastname, email, dob, mobile , designation, gender, hobbies) VALUES('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $dob . "', '" . $mobile . "', '" . $design . "', '" . $gender . "','" . $b . "')")) {
             echo "insert success";
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>User Bio</h2>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="Firstname" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="Lastname" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>
                    </div>

                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                     <div class="form-group ">
                        <label>DOB</label>
                        <input type="date" name="dob" class="form-control" required="">
                        <span class="text-danger"><?php if (isset($dob_error)) echo $dob_error; ?></span>
                    </div>
 
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
                        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>
                     <div class="form-group ">
                        <label>GENDER:-</label>&nbsp&nbsp
                        <input type="radio" name="gender"  value="male">&nbsp&nbspmale&nbsp&nbsp
                        <input type="radio" name="gender"  value="Female">&nbsp&nbspfemale
                        <span class="text-danger"><?php if (isset($gen_error)) echo $gen_error; ?></span>
                    </div>
 
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="design" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($des_error)) echo $des_error; ?></span>
                    </div> 
                    <div class="form-group">
                        <label>Hobbies</label>&nbsp&nbsp
                        <input type="checkbox" name="hobbies[]"  value="Singing">&nbsp&nbspSinging
                        <input type="checkbox" name="hobbies[]" value="Dancing">&nbsp&nbspDancing
                        <input type="checkbox" name="hobbies[]" value="Reading">&nbsp&nbspReading<br>
                        <input type="checkbox" name="hobbies[]" value="Others">&nbsp&nbspOthers
                        <span class="text-danger"><?php if (isset($hob_error)) echo $hob_error; ?></span>
                    </div> 

                   <input type="submit" class="btn btn-danger" name="signup" value="submit">
                </form>
            </div>
        </div>    
    </div>
</body>
</html>















