<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Message;
 use Zend\Db\TableGateway\TableGateway;
 
class Messagetable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getMessage($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
  
       
      public function deleteMessage($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveMessage(Message $message)
     {
         $data = array(
              
              'emetteur' => $message->emetteur,
               'recepteur' => $message->recepteur,
          
            'message' => $message->message,
             'date' => $message->date,
        
           
        );

         $id = (int) $message->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getMessage($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Proposisition id does not exist');
             }
         }
     }
     
      public function fetchid($id)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
         public function fetchmessage($emetteur,$recepteur)
     {
         
         $rowset = $this->tableGateway->select(array('emetteur' => $emetteur,'recepteur' => $recepteur));
         return $rowset;
     }
        public function fetchrecepteur($recepteur)
     { 
         $rowset = $this->tableGateway->select(array('recepteur' => $recepteur));
         return $rowset;
     }
     
   public function fetchemeteur() 
     { 
         $rowset = $this->tableGateway->select(array('emetteur' => $emetteur));
         return $rowset;
     }
      
          
         
  
     
}
