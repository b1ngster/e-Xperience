<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- content security for android -->
		<!-- look here: http://stackoverflow.com/questions/30212306/no-content-security-policy-meta-tag-found-error-in-my-phonegap-application -->
		<title>RSS Feed App</title>
		<link href="mainstyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		<script>
			/*
			$(document).ready(function() {

				 $.support.cors = true;

				$("#register").click(function() {

					username = $("[name='username']").val();
					password = $("[name='password']").val();
					email = $("[name='email']").val();
					firstname = $("[name='firstname']").val();
					lastname = $("[name='lastname']").val();

					if(username=="") {
						$("#messages").html("Please enter a username.");
						return false;
					}

					if(password=="") {
						$("#messages").html("Please enter a password.");
						return false;
					}
					if(email=="") {
						$("#messages").html("Please enter a first name.");
						return false;
					}
					if(firstname=="") {
						$("#messages").html("Please enter a first name.");
						return false;
					}

					if(lastname=="") {
						$("#messages").html("Please enter a last name.");
						return false;
					}

					$.ajax({
						beforeSend: function() {
							$("#loading").show();
						},
						complete: function() {
							$("#loading").hide();
						},
						type: 'GET',
						dataType: "jsonp",
						jsonp: "callback",
						url: "/mng_user.php?action=register&r_username=" + username + "&r_password=" + password + "&r_email=" + email +"&r_firstname=" + firstname + "&r_lastname=" + lastname,
						success: function(data) {
							//console.log(data);

							responseString="";

							$.each(data, function (index, item) {
							    // Use item in here
							    responseString = item;
							});

							$("#messages").html(responseString);

						},
						error: function (jqXHR, textStatus, errorThrown) {
							if (jqXHR.status == 500) {
				                $("#messages").html('Internal error: ' + jqXHR.responseText);
				            } else {
								
				                $("#messages").html('Unexpected error.');
				            }
						}
					});



				});

			});
			*/
		</script>
	</head>

	<body>

		<header>
				RSS Feed App - Sign Up
		</header>

			<div class="main">
				<form id="contact" action="" method="post">
					<fieldset>
						<input type="file" tabindex="1" required autofocus>
					</fieldset>
					<fieldset>
						<input placeholder="Your Email" type="email" tabindex="2" required>
					</fieldset>
					<fieldset>
						<input placeholder="Subject" type="text" tabindex="3" required>
					</fieldset>
					<fieldset>
						<textarea placeholder="Type your message here...." tabindex="5" required></textarea>
					</fieldset>
					<fieldset>
						<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>	
					</fieldset>
				</form>
			</div>

		<footer>
				<a href="index.html">Home</a>
		</footer>

		<img src="images/loading.gif" id="loading" />


	</body>
</html>
