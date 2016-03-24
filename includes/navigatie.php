<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container">
        <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                            <li>
                                <a href="#">Verlof</a>
                            </li>
                            <li>
                                <a href="#">Uren</a>
                            </li>
                            <li>
                                <a href="#">Overzicht</a>
                            </li>
                            <?php if($_SESSION['type_ID'] == 2) {
                            echo '
                            <li>
                                <a href="#">Werknemertoevoegen</a>
                            </li>
                            <li>
                                <a href="#">Werknemer updaten</a>
                            </li>
                            <li>
                                <a href="#">Werknemer verwijderen</a>
                            </li>
                            <li>
                                <a href="#">Overzichten</a>
                            </li>
                            <li>
                                <a href="#">Parameters</a>
                            </li>';
                     };?>
                </ul>

        </div>
    <!-- /.navbar-collapse -->
    </div>
</nav>