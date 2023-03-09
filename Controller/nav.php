<nav class="navbar navbar-expand-lg navcolor">
  <a class="navbar-brand navtxtcolor" href="index.php">Playtech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php
    if(!isset($_SESSION['user']))
    {
    ?>
      <li class="nav-item">
        <a class="nav-link navtxtcolor2" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link navtxtcolor2" href="register.php">Register</a>
      </li>
  	<?php
  	}
  	else{
  	?>
  	  <li class="nav-item">
        <a class="nav-link navtxtcolor2" href="Controller/logout.php">Logout</a>
      </li>	
  	<?php } ?>
    </ul>
    <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search items..." name="search" id="search">
      <button class="btn btncolor my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>