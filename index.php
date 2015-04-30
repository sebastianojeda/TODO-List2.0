<!DOCTYPE html>
<html>
<head>
	<title>TODO-list2.0</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<header class="header">
	<nav class="navbar-default">
  <div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar" >
      <ul class="navbar-nav">
        <li class="active"><a href="#">Link </a></li>
        <li><a class="active" href="#">Link</a></li>
         <li><a class="active" href="#">Link</a></li> 
          <li><a class="active" href="#">Link</a></li> 
      </ul>     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<body>
	<div class="wrap">
		<div class="task-list">
			<ul>
		<!-- this is all server side code  -->
		<?php require("includes/connect.php"); 	    
				$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
				//this query is ordering a task by date and time
				$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
				if($result = $mysqli->query($query)){

					$numrows = $result->num_rows;
					if($numrows>0){

						while($row = $result->fetch_assoc()){
							$task_id = $row['id'];
							$task_name = $row['task'];

							echo '<li><span>'.$task_name.'</span><img id="'.$task_id.'" class="delete-button" width="10px" src="img/close.svg" /></li>';
						}
					}
				}

				?>
			<!-- End of server side code -->
			</ul>

		</div>		
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new item..."/>
	</form>
	</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	add_task();
	//This is my add_task function
	function add_task(){
		$('.add-new-task').submit(function(){
			var new_task = $('.add-new-task input[name=new-task]').val();
			//This if statement is ckecking if new_task is true or not  
			if(new_task != ''){
				$.post('includes/add-task.php', {task: new_task}, function(data){
					$('add-new-task input[name=new-task]').val();
						$(data).appendTo('.task-list ul').hide().fadeIn();
				});
			};
			return false;
		});
	}
	//this function will fade a element when cliked on. the element will come from mt delete-task.php file. 
	$(".task-list").on("click", ".delete-button", function(){
		var current_element = $(this);
		var task_id = $(this).attr('id');
		$.post('includes/delete-task.php', {id: task_id}, function(){
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
});
</script>
</body>
</html>
