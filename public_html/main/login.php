<?php
    session_start();
    if(isset($_SESSION['logged']) && $_SESSION['logged']==1)
        header('location: conto.php');
?>
<html lang="it">

<head>
    <?php include "../header.html"; ?>
</head>

<body>
    <main>
        <nav class=" z-depth-3 grey darken-3 ">
            <div class="nav-wrapper">
                <div class="container">
                    <div class="row">
                        <a href="../index.php" class="brand-logo">Weak Bank - Login</a>
                    </div>
                </div>
        </nav>
        <!-- inizio pagina -->
        <div class="container">
            <div class="row">
                <div class="col s10 offset-s1 m6 offset-m3 l4 offset-l4">
                    <br>
                    <div class="card grey darken-2" id="login_box">
                        <div class="card-content white-text">
                            <span class="card-title">Log in</span>
                            <form id="loginForm">
                                <div class="row">
                                    <div class="input-field col l9 offset-l1">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input type="email" class="validate white-text" id="email">
                                        <label for="email" class="white-text label">Email</label>
                                        <span class="helper-text" data-error="Formato mail non valido"
                                            data-success="Mail Valida"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l9 offset-l1">
                                        <i class="material-icons prefix">https</i>
                                        <input type="password" class="validate white-text" id="pass">
                                        <label for="psw" class="label white-text">Password</label>
                                    </div>
                                </div>

                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-medium green">Login</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </main>
    <?php include "../footer.html"; ?>


    <script src="../js/login.js"></script>
</body>

</html>