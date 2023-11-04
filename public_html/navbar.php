 <nav class=" z-depth-3 grey darken-3">
     <div class="nav-wrapper">
         <div class="container">
             <div class="row">

                 <a href="/" class="brand-logo">Weak Bank</a>
                 <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                 <ul class="right hide-on-med-and-down">
                     <?php
            if (isset($flag) && $flag == true) {
              if (isset($admin) && $admin == 0) {
                echo '<li><a href="/main/conto.php">Bank account<i class="material-icons right">account_balance</i> </a></li>';
                echo '<li><a href="/funcs/logout.php">Logout<i class="material-icons right">exit_to_app</i> </a></li>';
              } else {
                echo '<li><a href="/admin/">Admin Panel<i class="material-icons right">dashboard</i> </a></li>';
                echo '<li><a href="/funcs/logout.php">Logout<i class="material-icons right">exit_to_app</i> </a></li>';
              }
            } else
              echo '<li><a href="/main/login.php" class="btn-large blue lighten-1 waves-effect waves-light btn">Login<i class="material-icons white-text right">https</i></a></li>';
            ?>
                 </ul>
             </div>
         </div>
     </div>
 </nav>
 <ul class="sidenav" id="mobile-demo">
     <?php
    if (isset($flag) && $flag == true) {
      if (isset($admin) && $admin == 0) {
        echo '<li><a href="/main/conto.php">Bank account</a></li>';
        echo '<li><a href="/funcs/logout.php">Logout</a></li>';
      } else {
        echo '<li><a href="/admin/">Admin Panel</a></li>';
        echo '<li><a href="/funcs/logout.php">Logout</a></li>';
      }
    } else
      echo '<li><a href="/main/login.php" class="btn-large waves-effect waves-light btn">Login <i class="material-icons white-text right">https</i></a></li>'

      ?>
 </ul>
