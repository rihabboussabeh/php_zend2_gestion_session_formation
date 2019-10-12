<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;

use Application\Model\Participant;
 
 use Zend\Db\TableGateway\TableGateway;
 
class Participanttable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
      public function getParticipant($id)
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
 
       
   
     
     public function deleteParticipant($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
        public function saveParticipant(Participant $participant)
     {
         $data = array(
             'cin' => $participant->cin,
              'nom' => $participant->nom,
              'prenom' => $participant->prenom,
             'numtel' => $participant->numtel,
             'email' => $participant->email,
              'login' => $participant->login,
               'password' => $participant->password,
            
             
             
             
            
        );

         $id = (int) $participant->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getParticipant($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('participant id does not exist');
             }
         }
     }
     
     
      public function fetchid($id)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
     
           public function fetchallbysessionid($idsession)
     {
         
         $rowset = $this->tableGateway->select(array('idsession' => $idsession));
         return $rowset;
     }
     
     
   public function fetchlogin($login)
     {
         
         $rowset = $this->tableGateway->select(array('login' => $login));
         return $rowset;
     }
        public function fetchemail($email)
     {
         
         $rowset = $this->tableGateway->select(array('email' => $email));
         return $rowset;
     }
     
     
     
     
     
}
