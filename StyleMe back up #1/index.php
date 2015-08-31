<?
include ("inc/incfiles/header.inc.php");
?>
<?
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
if ($check == 0) {
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

  <table class="homepageTable">
</p>
<tr>
    <td width="60%" valign="top">
      <h2>Join StyleMe today!</h2>
      <img src="img/friends.png" width="400">
    </td>
      <td width="40%" valign="top">
        <h2>Sign up Below ...</h2>
    <form action="#" method="post">
           <input type="text" size="25" name="fname" placeholder="First Name" value="<? echo $fn; ?>">
           <input type="text" size="25" name="lname" placeholder="Last Name" value="<? echo $ln; ?>">
           <input type="text" size="25" name="username" placeholder="Username" value="<? echo $un; ?>">
           <input type="text" size="25" name="email" placeholder="Email" value="<? echo $em; ?>">
           <input type="text" size="25" name="email2" placeholder="Repeat Email" value="<? echo $em2; ?>">
           <input type="password" size="25" name="password" placeholder="Password">
           <input type="password" size="25" name="password2" placeholder="Repeat Password"><br />
           <input type="submit" name="reg" value="Sign Up!">
</form>
           </td>
       </tr>
</table>
</body>
</body>
</html>
