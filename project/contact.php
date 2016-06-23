<div id="contact" class="boxB">
<h3>Contact</h3>
<p>Contact us with the form below!<br></p>
<form name="contactform" id="contactform" onsubmit="return false;">
<label for="first_name">First Name *</label>

<input type="text" name="first_name" maxlength="50" size="30" required>
<br>
<label for="last_name">Last Name *</label>

<input type="text" name="last_name" maxlength="50" size="30" required>
<br>
<label for="email">Email Address *</label>

<input type="email" name="email" maxlength="80" size="30" required>

<label for="telephone">Telephone Number</label>

<input type="text" name="telephone" maxlength="30" size="30">

<label for="comments">Comments *</label>
<br>
<textarea name="comments" maxlength="1000" cols="25" rows="6"></textarea>
<br>
<input type="submit" id="comment" value="Submit">
</form>
<div id="response"></div>
</div>
    
<script>
                $(document).ready(function () {
                    $('#comment').click(function (e) {
                        var fd = new FormData(document.querySelector("#contactform"));
                        e.preventDefault();
                        $.ajax({
                            type: 'POST'
                            , url: 'sendmail.php'
                            , data: fd,
                            processData: false,
                            contentType: false,
                                success: function (data) {
                                $("#response").html(data);
                                $('#contactform')[0].reset();
                            }
                        });
                    });
                });
            </script>
