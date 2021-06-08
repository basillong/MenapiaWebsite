<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript">
    //var onloadCallback = function() {
    //    grecaptcha.render('html_element', {
    //      'sitekey' : '6Lc0G-0ZAAAAAHDIPiI75pyHD7x7c9kZXhb0yFm-'
    //    });
    };
</script>

<!-- Write your comments here -->
    
<div class="contactRow">

    <div class="contactColumnLeft">
        
        <div class="messageContainer">
        <h2>Send a message</h2>

        <form action="#" >
            
            
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" placeholder="Your name.." >

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Your last name.." >

            <label for="yourEmail">Email</label>
            <input type="email" id="yourEmail" name="yourEmail" placeholder="Your email address.." >

            <label for="yourPhone">Phone</label>
            <input type="tel" id="yourPhone" name="yourPhone" placeholder="Your phone number..">                

            <label for="yourMessage">Message</label>
            <textarea id="yourMessage" name="yourMessage" placeholder="Write something.." style="height:120px"></textarea>

            <div class="g-recaptcha" data-sitekey="6Lc0G-0ZAAAAAHDIPiI75pyHD7x7c9kZXhb0yFm-" data-theme="dark" style="width: 80%; float: left"></div>
            <input type="button" value="Send" onclick="sendMessage()">


        </form>
        <p><br /><br /><br /></p>
        </div>
    </div>
    
    <div class="contactColumnRight">
        
        <div class="messageContainer">
        <h2>Contact Details</h2>
            <div>
            <table>
                <tr>
                    <td><img src="{!! asset('images/Location.png') !!}" /></td>
                    <td>Our Location</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        Menapia Software Ltd<br />
                            White Mill Rd<br />
                            Killeens<br />
                            Wexford<br />
                            Y35 N232<br />
                        
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>                
                </tr>   
                
                <tr>
                    <td><img src="{!! asset('images/Phone.png') !!}" /></td>
                    <td>Call Us</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        053 918 9060
                        
                    </td>                
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>                
                </tr>
                
                <tr>
                    <td><img src="{!! asset('images/Email.png') !!}" /></td>
                    <td>Drop us a line</td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <a href="mailto:info@menapiasoftware.com">info@menapiasoftware.com</a>
                    </td>                
                </tr>
                
                
            </table>
            
            </div>
        
        </div>
        
        
    </div>    

</div>

