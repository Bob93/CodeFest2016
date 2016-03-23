<?php
include 'connector.php';
include 'includes/header.inc.php';
?>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php include 'includes/menubar.inc.php';?>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Vakantie</h1>
            <p>Note: You may suck dick</p>
        </div>
    </div>
</div>

<!-- /.container -->
    <div class="menu-info">
    <div class="panel-body">
        <div class="form-group">
            Van datum <input type="date" name="van-datum" id="van-datum" tabindex="1" class="form-control" placeholder="Van" value="">
        </div>
        <div class="form-group">
            Tot datum <input type="date" name="tot-datum" id="tot-datum" tabindex="2" class="form-control" placeholder="Tot" value="">
        </div>
        <input type="submit" value="Submit">
    </div>
    </div>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
