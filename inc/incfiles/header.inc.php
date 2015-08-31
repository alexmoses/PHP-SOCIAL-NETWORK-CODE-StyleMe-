<?
include ("inc/scripts/mysql_connect.inc.php");
session_start();
$user = $_SESSION["user_login"];
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="css/reset.css" media="screen">
	<link rel="stylesheet" href="css/master.css" media="screen">
	<link rel="stylesheet" href="css/blue.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="js/jquery.color.js"></script>
	<script src="js/script.js"></script>
    <script src="js/placeholder-js.js" type="text/javascript"></script>

	<title>findFriends</title>
</head>
<body>
		<div class="mashmenu">
			<div id="menuWrapper">
			<div class="fnav">

				<a href="#" class="flink" >StyleMe </a>

				<div class="allContent">

					<div class="snav" >
						<a href="#" class="slink" >About StyleMe</a>

						<div class="insideContent">

							<span class="featured" >What is it?<br />
                            StyleMe is a website that will allow people to post and see pictures of other people and observe their unique style/s, so they can identify the brands and types of clothes worn by others, and primarily, know where others get their clothes from so they can go out and get it for themselves, and in the process, add to their own personal style.<a href="https://www.facebook.com/MosesPhotomedia">Visit our Facebook Page ...</a>
                            </span>
						</div><!-- end insideContent -->
					</div><!-- end snav -->

					<div class="snav" >
						<a href="https://www.facebook.com/MosesPhotomedia" class="slink" >Facebook Page</a>
						<div class="insideContent">
							<span class="featured" ></span>
					</div><!-- end snav -->
                    </div>
				</div><!-- end allContent -->

			</div><!-- end fnav -->

			
			<?
			if (isset($_SESSION["user_login"])) {
			echo '
			
			<div class="fnav">

				<a href="' . $user . '" class="flink" >' . $user . '\'s Style</a>

			</div><!-- end fnav -->
			<div class="fnav">

				<a href="#" class="flink" >Account Settings</a>

			</div><!-- end fnav -->
			<div class="fnav">

				<a href="logout.php" class="flink" >Logout</a>

			</div><!-- end fnav -->
			
			';
			}
			else
			{
				echo '
				
				<div class="fnav">

				<a href="#" class="flink" >Sign Up+ </a>

			</div><!-- end fnav -->
            <div class="fnav">

				<a href="#" class="flink" >Login+ </a>

			</div><!-- end fnav -->
				
				';
			}
			?>
			<div class="feat">
				<form id="searchForm">
                <fieldset>
                    <div class="input">
                        <input type="text" class="Search" id="s" value="Search StyleMe ..." />
                    </div>
                    <input type="submit" id="searchSubmit" value="" />
                </fieldset>
            </form>
			</div><!-- end fnav feat -->
     	  </div>
		</div><!--end mashmenu -->
        <div id="wrapper">
<br />
<br />
<br />
<br />