<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Classes;

/**
 * This class holds basic methods for the alerts system.
 */

class emailClass
{

    private $headers        =   array();

    private $errorTo        =   array("basil@menapiasoftware.ie");
    private $errorFrom      =   "orchidError@goggins.eu";
    private $errorSubject   =   "Orchid Error";

    
    
    /**
     *  On construction set the email headers.
     */
    public function __construct() {
        
        $this->headers[]    =   'MIME-Version: 1.0';
        $this->headers[]    =   'Content-type: text/html; charset=iso-8859-1';
           
    }
    
    
    /**
     * Method constructs the email header and then sends the email.
     * @param type $to      -   The address email is sent to.
     * @param type $from    -   The address email appears to come from.
     * @param type $subject -   The subject of the email.
     * @param type $message -   The actual body of the email.
     */
    public function sendHtmlEmail($to, $from, $subject, $message)
    {

        $this->headers[]    =   'To: '.implode(",", $to);                               //  Set the to field in the header.
        $this->headers[]    =   'From: '.$from;                                         //  Set the from field in the header.
        mail(implode(",", $to), $subject, $message, implode("\r\n", $this->headers) );  // Send the email.
 
    }
    
    
    
    public function sendErrorEmail($error, $file, $line)
    {
        
        $message    =   "<div>$error</div>";
        $message    .=  "<div>$file</div>";
        $message    .=  "<div>$line</div>";
        
        $this->headers[]    =   'To: '.implode(",", $this->errorFrom);                  //  Set the to field in the header.
        $this->headers[]    =   'From: '.$this->errorFrom;                              //  Set the from field in the header.
        
        mail($this->errorTo, $this->errorSubject, $message, implode("\r\n", $this->headers) );     // Send the email.        
        
        
    }
    

}

