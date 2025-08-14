</div>
                        <p> <a href="" target="_blank" rel="sponsored"></a> Civil contractors play an integral role in the construction business. They are responsible for a wide range of tasks, from site preparation to project management, and their expertise is essential to ensuring the successful completion of any construction project,Civil contractors are responsible for the coordination and management of construction projects and labours. They work with architects, engineers, and other professionals to ensure that projects are completed on time, within budget, and to the required standard.</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="template/assets/images/about-thumb-01.png" alt="">
                            </div>
                            <div class="col-4">
                                <img src="template/assets/images/about-thumb-02.png" alt="">
                            </div>
                            <div class="col-4">
                                <img src="template/assets/images/about-thumb-04.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="">
                            <a rel="" href=""><i class=""></i><br><br><br><br></a>
                            <img src="template/assets/images/contact.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->



    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6></h6>
                        <h2></h2>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="row">
                            <div class="col-lg-6">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <!--<form id="contact" action="addlabour.php" method="post">
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Add Labour</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Name*" required="">
                              </fieldset>
                            </div>
                            
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                              </fieldset>
                            </div>
                            
                            
                            
                            
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">add</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Area Ends ***** -->

 
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                   
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="template/assets/images/oshrlogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="template/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="template/assets/js/popper.js"></script>
    <script src="template/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="template/assets/js/owl-carousel.js"></script>
    <script src="template/assets/js/accordions.js"></script>
    <script src="template/assets/js/datepicker.js"></script>
    <script src="template/assets/js/scrollreveal.min.js"></script>
    <script src="template/assets/js/waypoints.min.js"></script>
    <script src="template/assets/js/jquery.counterup.min.js"></script>
    <script src="template/assets/js/imgfix.min.js"></script> 
    <script src="template/assets/js/slick.js"></script> 
    <script src="template/assets/js/lightbox.js"></script> 
    <script src="template/assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="template/assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>