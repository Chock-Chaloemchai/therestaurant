<?php 

$sql4 = "SELECT count(id) as oid FROM `orders` WHERE status_id=0";
$result4 = $conn->query($sql4);
$row4 = $result4 ->fetch_assoc();


?>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  
                 สวัสดี, <?php echo $_SESSION['fname']; ?>
                  
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="/therestaurant/dbadmin/dashboard/view/reportordernostatus" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  
                  <?php if($row4['oid']==0) : ?>
                  
                  <?php endif; ?>
                  <?php if($row4['oid']>0) : ?>
                  <span class="notification"><?php echo $row4['oid']; ?></span>
                  <?php endif; ?></span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="/therestaurant/">Home</a>
                <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                  <a class="dropdown-item" href="/therestaurant/config/logout">Log out</a>
              <?php endif; ?> 

              <?php if(empty($_SESSION['id'])) : ?>
                <a class="dropdown-item" href="/therestaurant/config/signin">Log in</a>
              <?php endif; ?> 

              
                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->