


<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"
        ></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="star-rating.js" type="text/javascript"></script>
<link href="star-rating.css" media="all" rel="stylesheet" type="text/css" />

<script>
function saveRating(rating){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200)
            {
                document.getElementById("response").innerHTML = xhttp.responseText;
            }else
            {
                console.log(xhttp.readyState + ',' + xhttp.status);
            }
    };
    xhttp.open("GET","saverating.php?rating=" + rating, true);
    xhttp.send();
}
</script>
        
<input id="myRating" type="text" class="rating" data-size="lg" data-step="1">
    <p id="response"></p>
    
<!-- To use the star ratings all you have to do is:
        1. Include this file on pages that will need it.
        2. Put a rating input wherever you want on the page like this
 <input id="myRating" type="text" class="rating" data-size="lg" > 

        3. Make sure the rating has a unique ID
        4. Use the ID to get the input's value in javascript.
    Thats it-->