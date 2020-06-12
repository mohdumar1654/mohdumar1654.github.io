<?php
   class Books {
      /* Member variables */
      var $price;
      var $title;
      
      /* Member functions */
     
      function Books( $par1, $par2 ) {
        $this->title = $par1;
        $this->price = $par2;
     }

      function getPrice(){
         echo $this->price ."<br/>";
      }
          
      function getTitle(){
         echo $this->title ." <br/>";
      }
   }

    $physics = new Books( "Physics for High School", 10 );
    $maths = new Books ( "Advanced Chemistry", 15 );
    $chemistry = new Books ("Algebra", 7 );
        
    $physics->getTitle();
    $chemistry->getTitle();
    $maths->getTitle();
    $physics->getPrice();
    $chemistry->getPrice();
    $maths->getPrice();
?>