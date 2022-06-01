<!--Marija Stefanovic 2019/0068-->
<html>
<head>
    
</head>
<body>
    <div style="text-align:center; color:red" >
        <?php
        if(isset($poruka)){echo $poruka;}
           
        ?>
    </div>
    <div style="text-align:center; " >
    <form name="loginform" action="<?= site_url("Neregistrovani/loginSubmit") ?>" method="post">
        <input type="text" name="mejl" id="mejl" value="" required> <br>
        <label for="mejl">Mejl adresa</label><br> <br><br>
        <input type="password" name="lozinka" id="lozinka" required> <br>
        <label for="lozinka">Lozinka</label> <br><br><br>
        <input type="submit" value="Log in"/>
    </div>
</body>   
</html> 