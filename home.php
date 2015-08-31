<?
include("inc/incfiles/header.inc.php");
?>
<?
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/styleme\">";
}
else
{
echo "";
}
?>
<?
//If the user is logged in
echo "Hi, $user, Your logged in<br />Welcome to what is soon to be, your NEWSFEED
<a href=\"logout.php\">Logout?</a>
";
?>