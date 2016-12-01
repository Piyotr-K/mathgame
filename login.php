<?php include("headerfooter/header.php"); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title">Math Game!</h1>
        </div>
    </div>
    <form action="authenticate.php" method="post" role="form" class="form-horizontal">
        <div class="container">
            <div class="form-group">
                <div class="col-sm-5">
                    <span class="right">Email:</span>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" size="6">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5">
                    <span class="right">Password:</span>
                </div>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" size="6">
                </div>
            </div>
            <div class="row">
                <div class="middle col-sm-11">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <?php
            if (isset($_GET["msg"])) {
                echo "<p class='error'>" . $_GET["msg"] . "</p>";
            }
        ?>
    </div>
    <?php include("headerfooter/footer.php"); ?>