

<?php 
include 'head.php';

?>
             <?php include 'includes/goBack.php'; ?>
   
<div id="featured" class="container">
    
    <div class="boxB">
        
    <form method="POST" action="register_user.php" enctype="multipart/form-data">
    <h4 class="Rform">Signup Information</h4>
        
        <b>Email: </b><br>
        <input type="email" name="email" id="email" data-role="none" placeholder="Email@domain.com" required><br><br>
        <b>First Name:</b><br>
        <input type="text" name="fname" id="fname" data-role="none" maxlength="10" placeholder="Firstname" required><br><br>
        <b>Last Name:</b><br>
        <input type="text" name="lname" id="lname" data-role="none" maxlength="10" placeholder="Lastname" required><br><br>
        
         <b>New Phone Number:<span id="pNumber_error"></span> </b><br>
        <input type="text" name="pNumber" id="pNumber" data-role="none" maxlength="10" placeholder="Phone Number ex:3061110000" required><br><br> 
        
        <b>Address:</b><br>
        <input type="text" name="address" id="address" data-role="none" placeholder="# Street, City, Prov." required><br><br>
        
        <b>Password:<span id="passw_error"></span></b><br>
        <input type="password" name="passw" id="passw" data-role="none" maxlength="6" placeholder="Password" required>
       
        <br>
        <b>Confirm Password:<span id="passconf_error"></span> </b><br>
        <input type="password" name="passconf" id="passconf" data-role="none" maxlength="6" placeholder="Confirm Password" required><br><br>
        
        
       <input type="checkbox" name="checkBox" id="checkBox" data-role="none" required>
        <b>I am over 18 years old and I agree on the terms of use.</b>
        <br><br>
        <input type="submit" name="Signup" class="btn btn-success" data-role="none" value="Signup">
        <input type="reset" class="btn btn-info" data-inline="true" data-role="none" value="Reset">
    </form>
                    <script type="text/javascript" src="p_validation_reg.js"></script>

  </div>
</div>

<!-- 

  <input type="checkbox" name="checkBox" id="checkBox" data-role="none" required>
        <br><br><b>I agree on the terms of use. (please check the box if you agree)</b>
        <br>
        

-->

<?php 
include 'footer.php';

?>
  