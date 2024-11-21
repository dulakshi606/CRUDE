

<?php

//include database connection
include_once("db_conn.php");

//create user Registration function
function userRegistration($userName, $userEmail, $userPass, $userPhone, $userNIC) {
   // Create database connection
   $db_conn = connection();

   // Check for connection errors
   if (is_string($db_conn)) {
       return $db_conn; // Return the error message from the connection
   }

   // Data insert query
   $insertSql = "INSERT INTO user_tbl(user_name, user_email, user_phone, user_nic, user_status) 
   VALUES ('$userName', '$userEmail', '$userPhone', '$userNIC', 1);";

   $sqlresult = mysqli_query($db_conn, $insertSql);

   // Check if the insert was successful
   if (!$sqlresult) {
       return "Database Error: " . mysqli_error($db_conn);
   }

   // If the registration result is successful, we can feed data into the login table also
   $newPassword = md5($userPass);
   $insertLogin = "INSERT INTO login_tbl(login_email, login_pwd, login_role, login_status) VALUES ('$userEmail', '$newPassword', 'user', 1);";

   $loginresult = mysqli_query($db_conn, $insertLogin);

   // Check if the login insert was successful
   if (!$loginresult) {
       return "Database Error: " . mysqli_error($db_conn);
   }

   return "Your Registration Success!!!";
}



//login function
function Authentication($userName, $userPass) {
   // Call database connection
   $db_conn = connection();

   $hashedPassword = md5($userPass);
//    return($hashedPassword);
   
   // SQL query to fetch the user
   $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email='$userName';";
   $sqlresult = mysqli_query($db_conn, $sqlFetchUser);

   // Check if the query executed successfully
   if (!$sqlresult) {
       return "Database Error: " . mysqli_error($db_conn);
   }

   // Check the number of rows
   $norows = mysqli_num_rows($sqlresult);

   // Validating the number of records > 0
   if ($norows > 0) {
       // Fetch the user records
       $rec = mysqli_fetch_assoc($sqlresult);

       // Validate the password (using password_verify for security)
       if ($hashedPassword == $rec['login_pwd']) {
           // Validate the user login status
           if ($rec['login_status'] == 1) {
               if ($rec['login_role'] == "admin") {
                   // Redirect this user into the admin dashboard
                   header('Location: lib/views/dashboards/admin.php');
                   exit();
               } else {
                   // Redirect this user into the user dashboard 
                   header('Location: lib/views/dashboards/user.php');
                   exit();
               }
           } else {
               return "Your Account Has Been Deactivated!";
           }
       } else {
           return "Your Password Is Not Correct. Please Try Again!";
       }
   } else {
       return "No Records Found!";
   }
}



?>