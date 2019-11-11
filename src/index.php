<html>
   
   <head>
      <title>SSBP</title>
   </head>
	
<body>

	<?php
	    $msg = '';
	    $admin = false;
	    if(isset($_COOKIE['admin']) && ($_COOKIE['admin'] == 'true'))
	    {
		    $msg = 'You are now admin';
		    $admin = true;
	    }

	    $filecontent = file_get_contents("blogposts.txt");
	    $blogposts = json_decode($filecontent, true);


	?>
	<?php
	    function addpost(){
		    if (isset($_POST['add']) && !empty($_POST['title'])
		       && !empty($_POST['content'])) {

		       	$filecontent = file_get_contents("blogposts.txt");
			$blogposts = json_decode($filecontent, true);

			$blogposts[] = ["title" => $_POST['title'], "content" => $_POST['content']];
			$updated = json_encode($blogposts);
			file_put_contents("blogposts.txt", $updated);
			$_POST = array();
		    }
	    }
	?>  

	<h1>Super secure blog portal</h1>
	<h4><?php echo $msg ?></h4>

	<?php
		foreach(array_reverse($blogposts) as $key => $value) {
			echo "<h4>" . $value["title"] . "</h4>"
				. "<p>" . $value["content"] . "</p><br><br>";
		}
	?>	
	<h4>Add new post</h4>
	<form class = "form-login" role = "form" 
		action = "<?php addpost();?>" method = "post">

    	<input type = "text" class = "form-control" 
       		name = "title" placeholder = "title" required autofocus></br>

    	<input type = "text" class = "form-control"
		name = "content" placeholder = "content" required>

   	 <button class = "btn-login" type = "submit" 
		name = "add">Add</button></form>
	
	
</body>
</html>
