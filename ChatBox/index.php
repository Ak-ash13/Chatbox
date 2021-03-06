 <?php include "database.php"; ?>

<?php
	//Create Select Query
	$query="select * from shouts order by time desc limit 100";
	$shouts = mysqli_query($con,$query);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>My Chatbox</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <div id="container">
      <header>
        <h1>Public Chatbox</h1>
      </header>
      <div id="shouts">
      	<ul>
	  <?php while ($row=mysqli_fetch_assoc($shouts)): ?>
      	    <li class="shout">
	      <span><?php echo $row['time'];  ?> - </span><strong><?php echo $row['user'];  ?>:</strong> <?php echo $row['message'];  ?>
	    </li>
	  <?php endwhile; ?>
      	</ul>
      </div>
      <div id="input">
      	<?php if (isset($_GET['error'])) : ?>
	      <div class="error"><?php echo $_GET['error'];  ?></div>
	<?php endif; ?>
        <form method="post" action="process.php">
          <input class="msg-btn" type='text'  name="user" placeholder="Enter your name" />
          <input class="msg-btn" type='text' name="message" placeholder="Enter message" />
          <br />
          <input class="shout-btn"type="submit" name="submit" value="Send Message" />
        </form>
      </div>
    </div>
  </body>
</html>
