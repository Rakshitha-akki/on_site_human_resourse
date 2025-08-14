</div>
    </section>
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        
                       
                    </div>
                </div>
             
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->
    <!-- ***** Chefs Area Starts ***** -->
 
    <!-- ***** Chefs Area Starts ***** -->
    
    <!-- ***** Chefs Area Ends ***** -->
    <!-- ***** Chefs Area Ends ***** -->

   

 
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            
                    </div>
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