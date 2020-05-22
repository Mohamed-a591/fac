
<nav class="navbar navbar-dark navbar-expand-lg bg-primary py-0">
    <a class="navbar-brand py-0 " href="home.php">
      <img src="layout/img/logo.png" width="33" height="33" class=" d-inline-block bg-dark rounded-circle" alt="facebook logo">
      FaceBook
    </a>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav py-1">

      <li class="nav-item active hover border-right rounded ">
        <a class="nav-link py-1" href="mypage.php?do=mypage">
          <img src="layout/img/<?php echo $_SESSION['img'];?>" width="25" height="24" class=" rounded-circle mr-2"><?php echo $_SESSION['user'];?> 
        </a>
      </li>

      <li class=" nav-item active hover border-right rounded">
        <a class="nav-link py-1" href="home.php">Home</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#"  id="Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
        <div class="dropdown-menu bg-primary py-1" aria-labelledby="Dropdown">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>