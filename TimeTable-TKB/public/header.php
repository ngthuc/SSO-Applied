<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="https://ngthuc.com/">
    <title>View Schedule</title>
    <link rel="icon shortcut" href="https://ngthuc.com/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="public/main.js"></script>
    <script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  		ga('create', '<?php echo $dbuser['analytics']; ?>', 'auto');
  		ga('send', 'pageview');
	   </script>

     <!-- Auth0 -->
     <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>

     <!-- Initializing Script -->
     <script>
         $(document).ready(function() {
          var webAuth = new auth0.WebAuth({
             domain: 'tuyetnghi96.auth0.com',
             clientID: 'f8VIaKqvS2rzGXw0kbrn2uSm9gkH6MpE',
             redirectUri: 'http://localhost/sso/TimeTable-TKB/callback_sso',
             audience: `https://tuyetnghi96.auth0.com/userinfo`,
             responseType: 'code',
             scope: 'openid profile'
           });

           $('#login').click(function(e) {
             e.preventDefault();
             webAuth.authorize();
           });
         });
     </script>
  </head>
<body>
