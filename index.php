<?php

require 'src/dribbble.php';

$dribbble = new Dribbble();


$popular_shots = $dribbble->get_shots_list('popular', 1, 30);
$popular_shots2 = $dribbble->get_shots_list('popular', 2, 30);
$popular_shots3 = $dribbble->get_shots_list('popular', 3, 30);

?>

<!DOCTYPE html>  
<html>  
<head> 
       <meta charset="UTF-8" /> 
       <title>Dribbble view</title> 
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <link rel="stylesheet" href="s.css" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
       <script type="text/javascript">



              

              $(document).ready(function() {

                     $('li a').live('click', function(e){
                            $('#shots').toggleClass('animation-play-state-paused');
                            console.log('action clic sur image');  
                            e.preventDefault();
                     });                 
                     

                     function randomize(ulName) {

                            $(ulName).each(function(){
                                   // get current ul
                                   var $ul = $(this);
                                   // get array of list items in current ul
                                   var $liArr = $ul.children('li');
                                   // sort array of list items in current ul randomly
                                   $liArr.sort(function(a,b){
                                          // Get a random number between 0 and 10
                                          var temp = parseInt( Math.random()*10 );
                                          // Get 1 or 0, whether temp is odd or even
                                          var isOddOrEven = temp%2;
                                          // Get +1 or -1, whether temp greater or smaller than 5
                                          var isPosOrNeg = temp>5 ? 1 : -1;
                                          // Return -1, 0, or +1
                                   return( isOddOrEven*isPosOrNeg );
                                   })
                                   // append list items to ul
                                   .appendTo($ul);            
                            });

                     }
                     
                     $('.list-1').clone().appendTo('#shots').addClass('list-2').removeClass('list-1');
                     randomize('.list-1');
                     randomize('.list-2');
                     $('.list-1').clone().appendTo('#shots').addClass('list-3').removeClass('list-1');
                     $('.list-2').clone().appendTo('#shots').addClass('list-4').removeClass('list-2');




              });

       </script>
</head>
<body>
       <div id="logo">
              <img src="http://dribbble.com/images/dribbble-ball-1col-dnld.png" width="80" height="80" />
              <h1>Popular</h1>
       </div>
       <div id="content">
              <div id="shots">
                     <ul class="list-1">
                            <?php
                            foreach ($popular_shots->shots as $shot) :
                                   echo '<li><a href="#"><img src="'.$shot->image_url.'" width="400" height="300" /></a></li>';
                            endforeach;
                             foreach ($popular_shots2->shots as $shot) :
                                   echo '<li><a href="#"><img src="'.$shot->image_url.'" width="400" height="300" /></a></li>';
                            endforeach;    
                             foreach ($popular_shots3->shots as $shot) :
                                   echo '<li><a href="#"><img src="'.$shot->image_url.'" width="400" height="300" /></a></li>';
                            endforeach;                                                   
                            ?>
                     </ul>
              </div>
       </div>
</body>

</html>