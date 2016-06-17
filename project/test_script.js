function check_email(event) {
        'use strict';
    var cPass = event.currentTarget;
    var error = document.getElementById(cPass.id + "_error");
	//var field = document.getElementById("email");
    var empty = cPass.value;
    
    var p = empty.search(/^[a-zA-Z0-9._\-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}/g);
    
    if (empty === null || empty === "") {
        error.innerHTML = "Please enter a valid email address.";
        error.className = "error";
		//field..innerHTML = "errorE";
    } else {
        if (p === -1) {
            error.innerHTML = "Please enter a valid email address.";
            error.className = "error";
        } else {
            error.innerHTML = "";
        }
    }
    
    /*
        // checks email and date
        var u_email = event.currentTarget;
        var user_email = u_email.value;
        var error = document.getElementById(u_email.id + "_error");
        //var user_date = document.getElementById('rDate').value;
        
        if( user_email == ""){
            error.innerHTML = "Please enter a valid email address.";
            return false;
        }
        else{
            error.innerHTML = "";
            return true;       
            
        }
        
        */
    }




function check_date(event) {
        'use strict';
        // checks email and date
        var dateTarget = event.currentTarget;
        var user_date = dateTarget.value;
        var currentDate = new Date();
        var error1 = document.getElementById(dateTarget.id + "_error");
        var n = currentDate.getTime();
        //var n2 = user_date.getTime();
    
        if(user_date === null || user_date === ""){
            //when empty date value
            error1.innerHTML = "Please choose date.";
            error1.className = "error";
        }
        else {
            
            if(n < user_date) { // wrong/expired date
            //document.getElementById('date1').innerHTML = "Please enter a valid date.";
            error1.innerHTML = "Please enter a valid date.";
            error1.className = "error";
            }
            else{
                // correct date
                document.getElementById('date1').innerHTML = user_date;
                error1.innerHTML = "";
            }
              
        }
    }


    function printDate(event){
    
        'use strict';
    var currentDate = new Date();
    document.getElementById('demo').innerHTML = currentDate;
   // document.getElementById('demo2').innerHTML = currentDate;

    
    }





/*

        if(user_date == ""){
            error1.innerHTML = "Please enter a date.";
            error1.className = "error";
        }
       
       

<p id="demo"></p>
<p id="demo2"></p>

<script>
var user_date = new Date();
var currentDate = new Date();
user_date.setDate(user_date.getDate() -0);

if(user_date < currentDate ){

document.getElementById("demo").innerHTML = "you cant choose an expired date.";

}
else{
document.getElementById("demo").innerHTML = "reservation date: "+user_date ;

}



//document.getElementById("demo2").innerHTML = "Today: " + x;

</script>



*/