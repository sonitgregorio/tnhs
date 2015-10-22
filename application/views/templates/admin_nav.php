<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
<!--        <div class="container">-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../assets/images/tnhs_logo.jpg" class="pull-left navbar-brand-image">
                <span class="navbar-brand">TNHS <small style="font-size: 12px; font-weight: bold">Tanauan National High School Online Class</span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
<!---->
<!--                    <li><a href="../navbar/">-->
<!--                            <span class="fa fa-tasks"></span>-->
<!--                            <span class="badge">10</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!---->
<!--                    <li><a href="../navbar/">-->
<!--                            <span class="fa fa-dashcube"></span>-->
<!--                        </a>-->
<!--                    </li>-->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="fa fa-user-md"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/profile')}}">
                                    <span class="fa fa-user"></span>
                                    Profile
                                </a>
                            </li>
                            <li><a href="logout.php">
                                    <span class="fa fa-sign-out"></span>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->

<!--        </div>-->
    </div>
</nav>


<div class="col-sm-3 col-md-2 sidebar">

    <div class="nav nav-sidebar">

        <a href="{{ url('/profile')}}">
         
              
                <img src="../assets/images/default.jpg" class="profile-img-tmb">

        </a>
        <div>
            <p>Hi! <?php  ?>
                <br>
                <small>
                </small>
            </p>
        </div>

    </div>





    <ul class="nav nav-sidebar">
        <li class="<?php echo $param == 'home' ? 'active' : '' ?>"><a href="/">
                <span class="fa fa-users"></span>Dashboard</a></li>
        <li class="<?php echo $param == 'student' ? 'active' : '' ?>"><a href="/student"><span class="fa fa-thumbs-up"></span> Student</a></li>
        <li class="<?php echo $param == 'faculty' ? 'active' : '' ?>"><a href="/faculty"><span class="fa fa-outdent"></span> Faculty</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="subject.php"><span class="fa fa-user-secret"></span> Subject</a></li>
        <li><a href="/class"><span class="fa fa-cogs"></span> Year and Section</a></li>
<!--        <li><a href=""><span class="fa fa-user-secret"></span> Shared Files</a></li>-->
    </ul>

    <ul class="nav nav-sidebar">
        <li><a href="school_year.php"><span class="fa fa-cogs"></span> School Year</a></li>
<!--        <li><a href=""><span class="fa fa-cogs"></span> Calendar of Events</a></li>-->
    </ul>
</div>