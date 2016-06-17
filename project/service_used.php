
<?php 
include 'head.php';

// user should be logged in to view this page


?>
        <?php include 'includes/print.php';?>

   
<div id="featured" class="container">
    
    <div class="boxB">
        
        <!-- This page is for the other services offered
            - Limo service
            - a Bidding serivce for used cars, a cheap alternative for our clients
                    for example a client that cannot afford one of the new car models,
                    they can use this service to name their price and we can accommodate by 
                        offering used cars and older models.
        -->
                     

        <form action="process_used.php" method="POST" enctype="multipart/form-data" class="centerform">
                                 <b class="alert alert-danger col-xs-4" >All Bids start at $25</b>

        <legend></legend>

          <div class="alert alert-info" >
         <h4 class="Rform">Name Your Price Service</h4>
              <input type="number" id="bid" name="bid" min="20" max="100" placeholder="$$ Your bid here $$" required>
        </div>
     <legend></legend>


    
        
     Choose a pickup location<br>
        <select id="loc" name="loc" data-role="none">
            <option>118 Broad ST, Regina, SK</option>
            <option>Regina Airport Counter, Regina, SK (YQR)</option>
            <option>John G Diefenbaker Airport, Saskatoon, SK (YXE)</option>
            <option>600 1st Avenue, Saskatoon, SK</option>
        </select><br><br>
        
     Dates and Times:<br>
        
        Pickup date:
        

        <input class="form-control0" data-role="none" data-provide="datepicker" name="pickDate" id="pickDate"  required /><p id="date_error"></p> at 
        <select id="pickTime" name="pickTime" data-role="none">
        <option>Between 7:00 am and 11:59 AM</option>
        <option>Between 12:00 PM and 4:30 PM</option>
        <option>Between 5:00 and 10:30 PM</option>
        <option>Between 12:00 AM and 6:00 AM</option>
        </select> <br><br>
        

        Return date:
        <input class="form-control0" data-role="none" data-provide="datepicker" name="returnDate" id="returnDate"  required /><p id="date_error"></p> at 
        <select id="returnTime" name="returnTime" data-role="none">
        <option>Between 7:00 am and 11:59 AM</option>
        <option>Between 12:00 PM and 4:30 PM</option>
        <option>Between 5:00 and 10:30 PM</option>
        <option>Between 12:00 AM and 6:00 AM</option>
        </select> <br><br>
        
        Age:
        <select id="age" name="age" data-role="none">
        <option>+25</option>
        <option>24</option>
        <option>23</option>
        <option>22</option>
        <option>21</option>
        <option>20</option>
        <option>19</option>
        <option>18</option>
        </select> <br><br>
        
         Choose a return location:<br>
        <select id="returnLoc" name="returnLoc" data-role="none">
            <option>118 Broad ST, Regina, SK</option>
            <option>Regina Airport Counter, Regina, SK (YQR)</option>
            <option>John G Diefenbaker Airport, Saskatoon, SK (YXE)</option>
            <option>600 1st Avenue, Saskatoon, SK</option>
        </select><br><br>
                          <legend></legend>

        <input type="submit" class="btn btn-success" name="Reserve" data-role="none" value="Reserve Now"/>   
        <input type="reset" class="btn btn-info" value="Reset" data-role="none">
    </form>

        



    </div>
</div>















<?php 
include 'footer.php';

?>