<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Message {
 public $id;

  public $emetteur;
    public $recepteur;
 
  public $message;
   public $date ;
 
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
         $this->emetteur = (!empty($data['emetteur'])) ? $data['emetteur'] : null;
        $this->recepteur= (!empty($data['recepteur'])) ? $data['recepteur'] : null;
           
             $this->message= (!empty($data['message'])) ? $data['message'] : null;
                 $this->date = (!empty($data['date'])) ? $data['date'] : null;
          
         
        
     }
}
 