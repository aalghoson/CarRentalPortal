<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Homepage</title>


<head>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="style0.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="test_script.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
</head>


<!--

-->

<body>
    
    <div id="featured" class="container">
    <div class="boxB">
    <form method="POST" action="index.php">
    
        Email:<input type="email" name="email" id="email" required><p id="email_error"></p>
        Date:<input class="form-control0" data-provide="datepicker" name="date" id="date"  required /><p id="date_error"></p>

        <input type="submit" class="btn btn-success" name="Reserve" value="Reserve Now"/>  
    
        
    <button type="button" id="dc" name="dc">Click me to display Date and Time.</button>
    <p>Current date: </p><p id="demo"></p>
           
        
        <p>Pickup date: </p><p id="date1"></p>
        </form>
			  <script type="text/javascript" src="checktest.js"></script>
            
    <script>
   $('#date').datepicker({
      startDate: new Date()
     });
            </script>
    </div>
    
</div>       
    </body>
    
    
</html>