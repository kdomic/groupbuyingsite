<?php require_once('includes/initialize.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Facebook Client-side Authentication Example</title>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         ref.parentNode.insertBefore(js, ref);
       }(document));

      // Init the SDK upon load
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '501223329943409', // App ID
          channelUrl : '//'+window.location.hostname+'/channel', // Path to your Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });

        // listen for and handle auth.statusChange events
        FB.Event.subscribe('auth.statusChange', function(response) {
          if (response.authResponse) {
            // user has auth'd your app and is logged into Facebook
            FB.api('/me', function(me){
              if (me.name) {
                document.getElementById('auth-displayname').innerHTML = me.name;
                console.log(me);
              }
            })
            document.getElementById('auth-loggedout').style.display = 'none';
            document.getElementById('auth-loggedin').style.display = 'block';
          } else {
            // user has not auth'd your app, or is not logged into Facebook
            document.getElementById('auth-loggedout').style.display = 'block';
            document.getElementById('auth-loggedin').style.display = 'none';
          }
        });

        // respond to clicks on the login and logout links
        document.getElementById('auth-loginlink').addEventListener('click', function(){
          FB.login(function(response) {
             // handle the response
              //console.log(response);
           }, {scope: 'email'});
        });
        document.getElementById('auth-logoutlink').addEventListener('click', function(){
          FB.logout(function(response) {
            // user is now logged out
            //console.log(response.status);
          });
        }); 
      } 
    </script>

    <h1>Facebook Client-side Authentication Example</h1>
      <div id="auth-status">
        <div id="auth-loggedout">
          <a href="#" id="auth-loginlink">Login</a>
        </div>
        <div id="auth-loggedin" style="display:none">
          Hi, <span id="auth-displayname"></span>  
        (<a href="#" id="auth-logoutlink">logout</a>)
      </div>
    </div>

  </body>
</html>





















<?php 
/*
	$ponude = Ponude::find_all();
	foreach ($ponude as $p) {
		$nova = Ponude::find_by_id($p->id);
		foreach ($p as $key => $value) {
			$nova->$key = strip_tags($value);
			//$value = strip_tags($value);
			//print_r($key);
		}
		$nova->save();
		//print_r($p);
	}
	echo "kraj";
*/
?>