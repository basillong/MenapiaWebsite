<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Menapia Software Ltd</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_msl_token" content="{{ csrf_token() }}">

<script src="{!! asset('js/jquery/jquery.min.js') !!}" ></script>

<!-- Include Jquery noty plugin -->
<script src="{!! asset('js/jquery/plugins/noty/packaged/jquery.noty.packaged.min.js') !!}" ></script>  
    
<link href="{!! asset('css/sheet1.css?') !!}{{ time() }}" rel='stylesheet' type='text/css'>
<script src="{!! asset('js/msl.js') !!}?{{ time() }}" type="text/javascript"></script>


</head>
<body>
{{ csrf_field() }}
<input type="hidden" id="rootPath" name="rootPath" value="{!! asset('') !!}" />

<div id="wsHeader">Header</div>

<div id="wsBody">Body</div>   
    
<div id="wsFooter">Footer</div>    
 
</body>
</html>
<script lang="javascript">
    
    $(document).ready(function() {
        
        loadHeader('header', 'wsHeader');
        
        loadBody('', 'home', 'wsBody');
        
        loadFooter('footer', 'wsFooter');
        
    });
    
</script>
