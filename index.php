<?php include ("inc/incfiles/header.inc.php"); ?>
<?php
$reg = @$_POST['reg'];
//declaring variables to prevent errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //Username
$em = ""; //Email
$em2 = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; // Password 2
$d = ""; // Sign up Date
$u_check = ""; // Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
if ($em==$em2) {
// Check if user already exists
$u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
// Count the amount of rows where username = $un
$check = mysql_num_rows($u_check);
if ($check== 0) {
//check all of the fields have been filed in
if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
// check that passwords match
if ($pswd==$pswd2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo "The maximum limit for username/first name/last name is 25 characters!";
}
else
{
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
if (strlen($pswd)>30||strlen($pswd)<5) {
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password 2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0')");
die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
}
}
}
else {
echo "Your passwords don't match!";
}
}
else
{
echo "Please fill in all of the fields";
}
}
else
{
echo "Username already taken ...";
}
}
else {
echo "Your E-mails don't match!";
}
}
?> 
<?php
//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
	$md5password_login = md5($password_login);
    $sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$md5password_login' LIMIT 1"); // query the person
	//Check for their existance
	$userCount = mysql_num_rows($sql); //Count the number of rows returned
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
	}
		 $_SESSION["id"] = $id;
		 $_SESSION["user_login"] = $user_login;
		 $_SESSION["password_login"] = $password_login;
         exit("<meta http-equiv=\"refresh\" content=\"0\">");
		} else {
		echo 'That information is incorrect, try again';
		exit();
	}
}
?>


           <div style= "float: right; width: 350x;">
            <h2>Sign up Below ...</h2>
           <form action="#" method="post">
           <input type="text" size="40" name="fname"  class="auto-clear" title="First Name" value="<? echo $fn; ?>"><p />
           <input type="text" size="40" name="lname" class="auto-clear" title="Last Name" value="<? echo $ln; ?>"><p />
           <input type="text" size="40" name="username" class="auto-clear" title="Username" value="<? echo $un; ?>"><p />
           <input type="text" size="40" name="email" class="auto-clear" title="Email" value="<? echo $em; ?>"><p />
           <input type="text" size="40" name="email2" class="auto-clear" title="Repeat Email" value="<? echo $em2; ?>"><p />
           <input type="password" size="40" name="password" placeholder="Password ..."> <p />
           <input type="password" size="40" name="password2" placeholder=" Repeat Password ..."><p />
           <input type="submit" name="reg" value="Sign Up!">
           </form>
           </div>
           <div>
           <div style= "float: left;">
            <h2>Already a Member? Login below ...</h2>
            <form action="index.php" method="post" name="form1" id="form1">
				<input type="text" size="40" name="user_login" id="user_login" class="auto-clear" title="Username ..." /><p />
				<input type="password" size="40" name="password_login" id="password_login" placeholder="Password ..." /><p />
				<input type="submit" name="button" id="button" value="Login to your account">
			</form>
            <br />
            <br />
            <br />
            <h2>Showcase Your Style!</h2>
      <img src="img/friends.png" width="400">
            </div>
</body>
</html>
