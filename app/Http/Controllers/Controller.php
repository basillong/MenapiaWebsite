<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Mail;
use App\Classes\emailClass;

/**
 *  reCAPTCHA
 *  Account:    basillong@gmail.com
 *  Label:      Menapia Software Ltd
 *  Site Key:   6Lc0G-0ZAAAAAHDIPiI75pyHD7x7c9kZXhb0yFm-
 *  Secret Key: 6Lc0G-0ZAAAAAPJLjydrpj4bXw2B7rPJUx0jkchC
 * 
 */



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $sendEmailsTo     =   array("basil@menapiasoftware.ie");
    
    public function index()
    {
        // Load the resource main view
        return view('welcome');      
 
    }
    
    public function header()
    {
        // Load the resource main view
        return view('header');      
 
    }   
    
    public function footer()
    {
        // Load the resource main view
        return view('footer');      
 
    }     
    
    
    public function home()
    {
        // Load the resource main view
        return view('home');      
 
    }    
    
    public function services()
    {
        // Load the resource main view
        return view('services');      
 
    }  

    public function careers()
    {
        // Load the resource main view
        return view('careers');      
 
    }  
    
    public function contact()
    {
        // Load the resource main view
        return view('contact');      
 
    }  
    
    
    public function sendMessage()
    {
        
        
        $fName          =   filter_input(INPUT_POST, 'fName');
        $sName          =   filter_input(INPUT_POST, 'sName');
        $yourEmail      =   filter_input(INPUT_POST, 'yourEmail');
        $yourPhone      =   filter_input(INPUT_POST, 'yourPhone');
        $yourMessage    =   filter_input(INPUT_POST, 'yourMessage');
        
        $yourMessage    =   "<p>From:  ".$fName." ".$sName."</p>"
                        .   "<p>Phone: ".$yourPhone."</p>"
                        .   "<p>Email: ".$yourEmail."</p>"
                        .   "<p>".$yourMessage."</p>";
        
        
        $em         =   new emailClass();
        $subject    =   "New Message From Menapia Website.".$_SERVER['SERVER_NAME'];  
        $em->sendHtmlEmail($this->sendEmailsTo, $yourEmail, $subject, $yourMessage); 

        
    }
    
    
    
}
