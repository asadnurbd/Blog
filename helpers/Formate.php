<?php

 class Formate{
  public function formatDate($date){

    return date('F j, Y, g:i a',strtotime($date));

  }


  public function shorter($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}


 public function Validation($data){
     $data=trim($data);
     $data=stripslashes($data);
     $data=htmlspecialchars($data);
     return $data;


 }

 public function title(){
   $path=$_SERVER['SCRIPT_FILENAME'];
   $title=basename($path,'.php');
   if ($title=='index') {
     $title="home";
     
   }elseif($title=='contact'){
    $title="contact";

   }
   return  $title=ucwords($title);

 }


 
}
?>