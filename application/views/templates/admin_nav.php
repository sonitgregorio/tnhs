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
                <img src="../assets/images/tnhs_logo.jpg" style="border-radius:15px;box-shadow: 0px 0px 10px white" class="pull-left navbar-brand-image">
                <span class="navbar-brand">TNHS <small style="font-size: 12px; font-weight: bold">Tanauan National High School Online Class</span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
<!---->                <!--  <li>
                            <i class="fa fa-envelope fa-1x fa-border icon-grey badge" style="margin-top:10px">1</i>
                        </li>    -->
                       
                        <?php if ($this->session->userdata('usertype') != 1): ?>
                         <li><a href="/student_examination">
                             <span class="fa fa-tasks"></span>
                            <?php 
                                $x = $this->studentmd->get_kung_mayada_exam($this->session->userdata('uid'));
                                $count = 0;
                                foreach ($x as $key => $value) {
                                    $count += 1;
                                }


                              ?>
                            <span class="badge"><?php echo $count; ?></span>
                         </a>
                        </li> 
                        <?php endif ?>
                      
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
                         <!--    <li><a href="{{ url('/profile')}}">
                                    <span class="fa fa-user"></span>
                                    Profile
                                </a>

                            </li> -->
                            <li><a href="/logout">
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
            <p>Hi                <br>

                <?php


                    if ($this->session->userdata('usertype') == 1) {
                       echo "Admin";
                    } else {
                       echo    $this->session->userdata('ngaran') ;
                    }
                    

                



                 ?>



                <br>
                <small>
                </small>
           
 </p>
        </div>

    </div>



      

    <?php if ($this->session->userdata('usertype') == 1): ?>
        <ul class="nav nav-sidebar">
            <!-- <li class="<?php echo $param == 'home' ? 'active' : '' ?>"><a href="/">
                <span class="fa fa-users"></span>Dashboard</a>
            </li> -->
            <li class="<?php echo $param == 'student' ? 'active' : '' ?>"><a href="/student"><span class="fa fa-thumbs-up"></span> Student</a></li>
            <li class="<?php echo $param == 'faculty' ? 'active' : '' ?>"><a href="/faculty"><span class="fa fa-outdent"></span> Faculty</a></li>
    
            <li><a href="/subject"><span class="fa fa-user-secret"></span> Subject</a></li>
            <li><a href="/class"><span class="fa fa-cogs"></span> Year and Section</a></li>
       
            <li class="<?php echo $param == 'year' ? 'active' : '' ?>"><a href="/sch_yr"><span class="fa fa-cogs"></span> School Year</a></li>
        </ul>
     <?php elseif($this->session->userdata('usertype') == 2): ?>
        <ul class="nav nav-sidebar">
            <!-- <li class="<?php echo $param == 'home' ? 'active' : '' ?>"><a href="/">
                <span class="fa fa-users"></span>Dashboard</a>
            </li> -->
            <li class="<?php echo $param == 'myclass' ? 'active' : '' ?>"><a href="/faculty_class"><span class="fa fa-thumbs-up"></span> My Class</a></li>
            <li class="<?php echo $param == 'lessons' ? 'active' : '' ?>"><a href="/lessons"><span class="fa fa-outdent"></span> Lessons</a></li>
            <li class="<?php echo $param == 'exam' ? 'active' : '' ?>"><a href="/examination"><span class="fa fa-outdent"></span> Examinations</a></li>
            <li class="<?php echo $param == 'grade_book' ? 'active' : '' ?>"><a href="/grade_book"><span class="fa fa-outdent"></span> Grade Book</a></li>
        </ul>
        <!-- <ul class="nav nav-sidebar">
            <li><a href="/subject"><span class="fa fa-user-secret"></span> Subject</a></li>
            <li><a href="/class"><span class="fa fa-cogs"></span> Year and Section</a></li>
        </ul>

        <ul class="nav nav-sidebar">
            <li><a href="school_year.php"><span class="fa fa-cogs"></span> School Year</a></li>
        </ul> -->
    <?php endif ?>

    <?php if ($this->session->userdata('usertype') == 3): ?>
        <ul class="nav nav-sidebar">
            <!-- <li class="<?php echo $param == 'home' ? 'active' : '' ?>"><a href="/">
                <span class="fa fa-users"></span>Dashboard</a>
            </li> -->
            <li class="<?php echo $param == 'myclass' ? 'active' : '' ?>"><a href="/student_class"><span class="fa fa-thumbs-up"></span>Module</a></li>
            <li class="<?php echo $param == 'student_examination' ? 'active' : '' ?>"><a href="/student_examination"><span class="fa fa-outdent"></span> Examinations</a></li>
             <li class="<?php echo $param == 'grade_book' ? 'active' : '' ?>"><a href="/grade_bookS"><span class="fa fa-outdent"></span> Grade Book</a></li>
    
        </ul>
    <?php endif ?>
   
</div>