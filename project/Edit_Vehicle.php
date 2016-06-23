<?php

include 'head.php';
include 'includes/connect.php';
include 'includes/goBack.php';
session_start();


//TODO: condition to check if user is logged in to continue with the process.
/*
	if( isset($_SESSION['user_id'])){
	
	}
	else{                             
		echo '<b>you need to login or signup to access this page</b><br>';
		
		echo '<META HTTP-EQUIV="Refresh" Content="1 ;URL=index.php">';
        header("refresh:3;url=signup.php");
		die();
        
	}
    */
?>

    <div id="featured" class="container">
        <div class="boxB">

            <div class="alert alert-success">
                <h4 class="Rform">Vehicle Information</h4>
            </div>


            <form method="POST" id="vForm" onsubmit="return false;" enctype="multipart/form-data">
                <?php
                //Retrieve the ID selected
                $id = $_POST['edit'];
                //Get the info of the selected record
                $getInfo_sql = $conn->query("SELECT * FROM vehicle where vehicle_id = $id");
                $row = mysqli_fetch_assoc($getInfo_sql);
                $Year = $row['year'];
                $Make = $row['make'];
                $Model = $row['model'];
                $Type = $row['type'];
                $Price = $row['price'];
                $Desc = $row['description'];
                $img = $row['pic_link'];
                ?>

                    <b>Current Information for the <?php echo $Year." ".$Make." ".$Model; ?></b>
                    <br> Vehicle ID:
                    <?php echo $id; ?>
                        <br> Year:
                        <?php echo $Year;?>
                            <br> Make:
                            <?php echo $Make;?>
                                <br> Model:
                                <?php echo $Model;?>
                                    <br> Type:
                                    <?php echo $Type;?>
                                        <br> Price:
                                        <?php echo $Price;?>
                                            <br> Description:
                                            <?php echo $Desc;?>
                                                <br> Image: <img src="<?php echo $img;?>" style="max-width: 600px;max-height: 300px;">
                                                <br>
                                                <br>
                                                <legend></legend>

                                                <div class="alert alert-warning">
                                                    <h4 class="Rform">Fill in any fields you wish to change, then click "Confirm Changes" at the bottom</h4>
                                                </div>
                                                The admin is required to check the box below before proceeding with any changes
                                                <br>
                                                <input type="checkbox" name="checkBox" id="editbox" data-role="none" required>
                                                <b>Administator/Manager check : I agree to the changes.</b>
                                                <br>
                                                <br>

                                                <b>New Year:</b>
                                                <br>
                                                <input type="text" name="year" id="year" maxlength="255" data-role="none" placeholder="<?php echo $Year;?>">
                                                <br>
                                                <br>

                                                <b>New Make:</b>
                                                <br>
                                                <input type="text" name="make" id="make" data-role="none" maxlength="255" placeholder="<?php echo $Make;?>">
                                                <br>
                                                <br>

                                                <b>New Model:</b>
                                                <br>
                                                <input type="text" name="model" id="model" data-role="none" maxlength="255" placeholder="<?php echo $Model;?>">
                                                <br>
                                                <br>

                                                <b>New Type:</b>
                                                <br>
                                                <input type="text" name="type" id="type" maxlength="255" data-role="none" placeholder="<?php echo $Type;?>">
                                                <br>
                                                <br>

                                                <b>New Price:</b>
                                                <br>
                                                <input type="text" name="price" id="price" maxlength="255" data-role="none" placeholder="<?php echo $Price;?>">
                                                <br>
                                                <br>

                                                <b>New Description:<p id="passw_error"></p></b>
                                                <input type="text" name="desc" id="desc" data-role="none" maxlength="250" placeholder="<?php echo $Desc;?>">
                                                <br>

                                                <b>New Image: <p id="passconf_error"></p></b>
                                                <input type="file" accept="image/*" name="image" id="image">
                                                <br>
                                                <br>

                                                <div id="editresp"></div>
                                                <br>
                                                <br>
                                                <legend></legend>

                                                <input type="submit" id="submit" class="btn btn-success" data-role="none" value="Confirm Changes">
                                                <input type="reset" class="btn btn-info" data-inline="true" data-role="none" value="Reset">


            </form>
           


        </div>

    </div>



 <script>
                $(document).ready(function () {
                    $('#submit').click(function (e) {
                    	if(document.getElementById('editbox').checked){
                        var fd = new FormData(document.querySelector("#vForm"));
                        fd.append("id", <?php echo $id; ?>);
                                  console.log("ran");
                        e.preventDefault();
                        $.ajax({
                            type: 'POST'
                            , url: 'update_vehicle.php'
                            , data: fd
                            , processData: false
                            , contentType: false
                            , success: function (data) {
                                $("#editresp").html(data);
                                $('#vForm')[0].reset();
                            }
                        });
                    	}else
                        	alert("You must check the checkbox to continue");
                    });
                });
            </script>




    <?php

include 'footer.php';
?>