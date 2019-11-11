<html>
   
   <head>
      <title>Try to log in</title>
   </head>
	
<body>
      <h2>Enter Username and Password</h2> 

	<?php
	    function login(){
		    $msg = '';
		    
		    if (isset($_POST['login']) && !empty($_POST['username']) 
		       && !empty($_POST['password'])) {
				
		       if ($_POST['username'] == 'administrator' && 
				  $_POST['password'] == 'trustno1') {
				  setcookie('admin', 'true');
				  header('Location: index.php');

		       }elseif ($_POST['username'] != 'administrator'){
				  $msg = 'This user does not exist';
				  setcookie('admin', 'false');

		       } elseif ($_POST['username'] == 'administrator' &&
			       $_POST['password'] != 'trustno1') {
				   $msg = 'Wrong password';
				   setcookie('admin', 'false');	   
		       } else {
					setcookie('admin', 'false');
		       }
		    }

		    $_SESSION['msg'] = $msg;
	    }
         ?>
      
      
         <form class = "form-login" role = "form" 
	 	action = "<?php login();?>" method = "post">

	    <h4 style='color:red'><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?></h4>

            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>

            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>

            <button class = "btn-login" type = "submit" 
               name = "login">Login</button>
         </form>
   </body>
</html>

