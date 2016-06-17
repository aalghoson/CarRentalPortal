
// jQuery

  // this script is for the date inputs
// it will set the minimum date to the current date, for both pick and return dates.
        $('#pickDate').datepicker({
            startDate: new Date(), autoclose:true
        });
         $('#returnDate').datepicker({
            startDate: new Date(), autoclose:true
        });



//ignore
//document.getElementById("email").addEventListener("blur", check_email, false);
//document.getElementById("date").addEventListener("blur", check_date, false);
//document.getElementById("dc").addEventListener("click", printDate, false);