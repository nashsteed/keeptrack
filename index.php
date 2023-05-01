<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'login.php';
      break; 
   // case '/login.php':                   // URL (without file name) to a default screen
      // require '.php';
      // break; 
   case '/simpleform.php':     // if you plan to also allow a URL with the file name 
      require 'simpleform.php';
      break;  
   case '/login.php': 
      require 'login.php'; 
      break;            
   case '/signup.php':
      require 'signup.php';
      break;
   case '/viewDB.php':
      require 'viewDB.php';
      break;
   case '/home.php':
      require 'home.php';
      break;
   case '/friendDB.php':
      require 'friendDB.php';
      break; 
   case '/addFriend.php':
      require 'addFriend.php';
      break;
   case '/loan.php':
      require 'loan.php';
      break;
   default:
      http_response_code(404);
      exit('Not Found');
}  
?>