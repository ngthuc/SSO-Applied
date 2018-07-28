<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myPHPnotes - Home</title>
    <!-- jQUERY   -->
    <script
      src="http://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
    <!-- Auth0 -->
    <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <!-- Initializing Script -->
    <script>
        $(document).ready(function() {
         var webAuth = new auth0.WebAuth({
            domain: 'ngthuc.auth0.com',
            clientID: 'rYuzanR_2s25Wpy6wXqgnJvgHLy-njY0',
            redirectUri: 'http://localhost/sso/SSO_Lib_and_Callback/callback.php',
            audience: `https://ngthuc.auth0.com/userinfo`,
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
    <div class="container" style="margin-top: 200px;">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <button id="login" class="btn btn-lg btn-danger btn-block">Sign in to Home with Auth0</button>
            </div>
        </div>
    </div>
</body>
</html>
