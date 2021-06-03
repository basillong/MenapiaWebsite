/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function loadDivContent(target, div)
{

    var rootPath    =   $("#rootPath").val();

    $.ajax({
    url:    rootPath+target,
    data:{
            _token: $('meta[name="_msl_token"]').attr('content')

        },
    type:   'get',
    success: function(data){

            // Put the html returned by the Ajax call into the correct div.
            $("#"+div).html(data);

        }

    });    

}


function loadHeader(target, div)
{
    loadDivContent(target, div);
    
}

function loadBody(obj, target, div)
{
    loadDivContent(target, div);

    $('.active').removeClass('active');     
    $(obj).addClass('active');
    
    
}

function loadFooter(target, div)
{
    loadDivContent(target, div);
    
}


/**
 * Method gathers information from the Menapia Software Website contact message form
 * and validates it.  Once validated it will pass the message over to the server
 * where it will be constructed and emailed.
 * @returns {undefined}
 */
function sendMessage()
{
    
    var rootPath    =   $("#rootPath").val();
    
    var fName       =   $("#firstName").val();
    var sName       =   $("#lastName").val();
    var yourEmail   =   $("#yourEmail").val();
    var yourPhone   =   $("#yourPhone").val();
    var yourMessage =   $("#yourMessage").val();
    

    var fNameCheck  =   validateEntered("#firstName", "First Name");
    if(!fNameCheck)
    {
        $("#firstName").focus();
        return false;
    }
    
    var sNameCheck  =   validateEntered("#lastName", "Last Name");
    if(!sNameCheck)
    {
        $("#lastName").focus();
        return false;
    }
    
    var emailCheck1  =   validateEntered("#yourEmail", "Email");
    if(!emailCheck1)
    {
        $("#yourEmail").focus();
        return false;
    }
    
    var emailCheck2  =   validateEmail("#yourEmail");
    if(!emailCheck2)
    {
        $("#yourEmail").focus();
        return false;
    }
    
    var phoneCheck  =   validatePhoneNumber("#yourPhone", "Phone")
    if(!phoneCheck)
    {
        $("#yourPhone").focus();
        return false;
    }    
    
    var messageCheck  =   validateEntered("#yourMessage", "Message");
    if(!messageCheck)
    {
        $("#yourMessage").focus();
        return false;
    }   


    // Make sure the recaptcha is checked.
    if(grecaptcha && grecaptcha.getResponse().length < 1)
    {
        //The recaptcha is not cheched
        //User must tick the I'm not a robot box.
        notyAlert(" We need to know you are not a Robot. \n Please tick the I'm not a robot tick box.");
        return false;
    }
    

    $.ajax({
    url:    rootPath+"sendMessage",
    data:{
            _token:         $('meta[name="_msl_token"]').attr('content'),
            fName:          fName,
            sName:          sName,
            yourEmail:      yourEmail,
            yourPhone:      yourPhone,
            yourMessage:    yourMessage,
            
        },
    type:   'post',
    success: function(data){


            notyAlert("Your message has been sent.");

        }

    });

    
}







/**
 * Method to validate the email entered is in the correct syntax.
 * 
 * @param {type} obj    =   The object containing the email to be validated
 * @returns {Boolean}   =   True if validated False if not.
 */
function validateEmail(obj)
{
    var x = $(obj).val(); // Get the text to validate.
    // Set initial values for the text and background  the box.
    // This is to catch scenarios where an error has been highlighted and the entry has been removed. 
    $(obj).removeClass("focusError");
    
    // Validate the text.
    if(x.length > 0)
    {
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {


            $(obj).addClass("focusError");
            notyAlert("This is not a valid e-mail address");

            //setTimeout(function () {
            //    $(obj).focus();
            //}, 0);
        
            return false;
        } 
   
    }
    
    return true;
        
}



/**
 * Method is used to validate a phone number is entered in the correct format.
 * 
 * @param {string} obj  =   The object containing the entry to be validated.
 * @param {string} name =   The name of the element (used in alert if necessary).  
 * @returns {Boolean}   =   True if validated False if not.
 */
function validatePhoneNumber(obj, name)
{
    var x = $(obj).val(); // Get the text to validate.
    x = x.replace(/\s+/g, ''); // Remove spaces from the string.

    $(obj).removeClass("focusError");
    
    if(x.length > 0)
    {

        // Validate the remaining characters.
        if(Math.floor(x) != x) // If true the value is not an integer or even a number
        {

            notyAlert("Value for " + name + " must contain numbers only.");
            $(obj).addClass("focusError");
            setTimeout(function () {
                $(obj).focus();
            }, 0);
            
            return false;

        }
    }
    
    return true;
    
}



/**
 * Method to validate the input has the text entered.
 * 
 * @param {type} obj    The object containing the input to be validated.
 * @param {type} name   The name of the object containing the input to be validated.
 * @returns {Boolean}   True if validated False if not.
 */
function validateEntered(obj, name)
{
    var x = $(obj).val(); // Get the text to validate.
    console.log($(obj).val(), name);
    $(obj).removeClass("focusError");
    
    if(x.length < 1)
    {
        $(obj).addClass("focusError");
        notyAlert("You must enter a value for "+name);
        setTimeout(function () {
            $(obj).focus();
        }, 0);        
        return false;
    }
   
    return true;
    
}





/**
 * Method takes in a string and opens an alert dialog (independant of the browser standard alert functionality).
 * 
 * @param {type} notyText   =   Text to be displayed in the alert.
 * @returns {undefined}
 */
function notyAlert(notyText)
{
    
    noty({
    type: 'alert',
    layout: 'center',
    text: notyText,
    modal: true,
    animation: {
            open: {height: 'toggle'},
            close: {height: 'toggle'},          
            easing: 'swing',
            speed: 500 // opening & closing animation speed
            },

    buttons:[
                {
                    addClass: 'btn', 
                    text: '   OK   ', 
                    onClick: function($noty) {
                        $noty.close();
                    }
                },

            ]
            
    });   
    
}

