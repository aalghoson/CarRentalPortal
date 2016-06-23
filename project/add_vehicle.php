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
                <h4 class="Rform">New Vehicle</h4>
            </div>


            <form method="POST" id="vForm" enctype="multipart/form-data">
                                                <legend></legend>

                                                <div class="alert alert-warning">
                                                    <h4 class="Rform">Fill in all fields, then click submit to create your vehicle</h4>
                                                </div>
                                                The admin is required to check the box below before proceeding with any changes
                                                <br>
                                                <input type="checkbox" name="checkBox" id="checkBox" data-role="none" required>
                                                <b>Administator/Manager check : I agree to the changes.</b>
                                                <br>
                                                <br>

                                                <b>Year:</b>
                                                <br>
                                                <input type="text" name="year" id="year" maxlength="255" data-role="none" placeholder="1971" required>
                                                <br>
                                                <br>

                                                <b>Make:</b>
                                                <br>
                                                <input type="text" name="make" id="make" data-role="none" maxlength="255" placeholder="Ford" required>
                                                <br>
                                                <br>

                                                <b>Model:</b>
                                                <br>
                                                <input type="text" name="model" id="model" data-role="none" maxlength="255" placeholder="Pinto" required>
                                                <br>
                                                <br>

                                                <b>Type:</b>
                                                <br>
                                                <input type="text" name="type" id="type" maxlength="255" data-role="none" placeholder="Subcompact" required required>
                                                <br>
                                                <br>

                                                <b>Price:</b>
                                                <br>
                                                <input type="text" name="price" id="price" maxlength="255" data-role="none" placeholder="1" required>
                                                <br>
                                                <br>

                                                <b>Description:<p id="passw_error"></p></b>
                                                <input type="text" name="desc" id="desc" data-role="none" maxlength="250" placeholder="Brown Color" required>
                                                <br>

                                                <b>Image: <p id="passconf_error"></p></b>
                                                <input type="file" accept="image/*" name="image" id="image" required>
                                                <br>
                                                <br>

                                                <div id="response"></div>
                                                <br>
                                                <br>
                                                <legend></legend>

                                                <input type="submit" id="submit" class="btn btn-success" data-role="none" value="Add Vehicle">
                                                <input type="reset" class="btn btn-info" data-inline="true" data-role="none" value="Reset">


            </form>
            <script>
                $(document).ready(function () {
                     $('#vForm').on('submit', function(e) {
                        var fd = new FormData(document.querySelector("#vForm"));
                        e.preventDefault();
                        $.ajax({
                            type: 'POST'
                            , url: 'update_vehicle.php'
                            , data: fd,
                            processData: false,
                            contentType: false,
                                success: function (data) {
                                $("#response").html(data);
                                $('#vForm')[0].reset();
                            }
                        });
                    });
                });
            </script>


        </div>

    </div>








    <?php

include 'footer.php';
?>