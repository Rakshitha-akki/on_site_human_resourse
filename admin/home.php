<html>
    <head>
        <title>home page</title>
        <script>
            function validate()
            {
                var phonepattern=/^[0-9]{10}$/;
                var p=document.forms["addmanager"]["phone"].value;
                 if (p.search(phonepattern)==-1)   
                 {
                     document.getElementById("phoneresult").innerHTML="phone number should contain only digits minimum 10";
                     return false;
                 }      


                var namepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
                var n=document.forms["addmanager"]["name"].value;
                 if (n.search(namepattern)==-1)   
                 {
                     document.getElementById("nameresult").innerHTML="Name should contain only alphabets and space between worlds";
                     return false;
                 }      
          }
        </script>
    </head>
    <?php
            include'header_link.php';
         ?>
    <body>
    <?php
            include'admin_header.php';
         ?>
    <h2>Welcome to Admin page<h2>
       
        <?php
            include'admin_footer.php';
         ?>
    </body>
</html>