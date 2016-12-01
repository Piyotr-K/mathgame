<?php 
    session_start();
    if (!isset($_SESSION["authenticated"])) {
        header("Location: login.php");
    }
    include("headerfooter/header.php"); 
    if (!isset($total)) {
        $total = 0;
    }
    if (!isset($score)) {
        $score = 0;
    }
    extract($_POST);
    if ( isset($fnum) 
        && isset($operation) 
        && isset($secnum) 
        && isset($answer) 
    ) {
        $ans = "";
        if ( !is_numeric($answer) ) {
            $ans = "<span class='error'>That's not a number.</span>";
        } else 
        switch ($operation) {
            case "+":
                $result = $fnum + $secnum;
                if ($result == $answer) {
                    $ans = "<span class='correct'>Correct</span>";
                    $score++;
                } else {
                    $ans = "<span class='error'>INCORRECT, correct answer for $fnum + $secnum was: $result.</span>";
                }
                $total++;
                break;
            case "-":
                $result = $fnum - $secnum;
                if ($result == $answer) {
                    $ans = "<span class='correct'>Correct</span>";
                    $score++;                    
                } else {
                    $ans = "<span class='error'>INCORRECT, correct answer for $fnum - $secnum was: $result.</span>";
                }
                $total++;
                break;
        }
    }
    $nmbr1 = rand(0,20);
    $nmbr2 = rand(0,20);
    $operation_integer = rand(1,2);
    $operation_string = "";
    
    switch ($operation_integer) {
        case 1:
            $operation_string = "+";
            break;
        case 2:
            $operation_string = "-";
            break;
    }
  
?>
    <div class="container">
        <form action="index.php" method="post" role="form" class="form-horizontal">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <h1 class="title">Math Game!</h1></div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-sm-offset-3">
                    <?php echo $nmbr1; ?>
                </label>
                <label class="col-sm-2">
                    <?php echo $operation_string; ?>
                </label>
                <label class="col-sm-2">
                    <?php echo $nmbr2; ?>
                </label>
                <div class="col-sm-3"></div>
            </div>

            <input type="hidden" name="fnum" value="<?php echo $nmbr1; ?>" />
            <input type="hidden" name="operation" value="<?php echo $operation_string; ?>" />
            <input type="hidden" name="secnum" value="<?php echo $nmbr2; ?>" />
            <input type="hidden" name="total" value="<?php echo $total; ?>" />
            <input type="hidden" name="score" value="<?php echo $score; ?>" />

            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-4">
                    <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
                </div>
                <div class="col-sm-5"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-sm-offset-4">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary btn-sm">
                        Submit</button>
                </div>
            </div>
        </form>
        <hr />
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?php echo $ans; ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">Score:
                <?php echo "$score / $total" ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="col-sm-4">
            <a href="logout.php" class="btn btn-default btn-sm">Logout</a>
        </div>
    </div>
    <?php include("headerfooter/footer.php"); ?>