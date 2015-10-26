    <div class="jumbotron" style="background-image:url(assets/images/background.jpg);background-size:cover;height:500px">
        <!-- <img src="assets/images/background.jpg" width="100%"> -->
   

        <div class="container">

                <div class="book_index login_container_design">
                    <div class="row" style="width: auto; padding: 15px">
                        <h3 class="form-signin-heading">
                            <span class="fa fa-lock"></span>
                            Sign In
                        </h3>
                        <?php 
                        echo $this->session->flashdata('loginerror'); ?>
                        
                        <form action="/login" method="post">
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Student ID" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <br>
                            <input type="submit" name="submit" value="Login" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>





    </div>


    


    <div class="container">
        <div class="book_index"  style="">
            <div class="row">
                <div class="col-md-4">
                    <h4><b>Vision</b></h4>
                    <hr>
                    <img src="assets/images/3.png" class="thumbnail" style="width: 300px">

                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>



                </div>
                <div class="col-md-4">
                    <h4><b>Mission</b></h4>
                    <hr>
                    <img src="assets/images/1.png" class="thumbnail" style="width: 300px">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>

                </div>
                <div class="col-md-4">
                    <h4><b>Goals</b></h4>
                    <hr>
                    <img src="assets/images/2.jpg" class="thumbnail" style="width: 300px">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>

                </div>
            </div>

        </div>

    </div> <!-- /container -->

