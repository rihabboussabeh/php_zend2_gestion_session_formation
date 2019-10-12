<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Question {
 public $id;

  public $id_session;
    public $id_participant;
 
  public $question;
   public $date;
 
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
         $this->id_session = (!empty($data['id_session'])) ? $data['id_session'] : null;
        $this->id_participant= (!empty($data['id_participant'])) ? $data['id_participant'] : null;
    
             $this->question= (!empty($data['question'])) ? $data['question'] : null;
                 $this->date= (!empty($data['date'])) ? $data['date'] : null;
          
         
        
     }
}
 