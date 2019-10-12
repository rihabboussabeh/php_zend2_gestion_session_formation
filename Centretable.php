<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Centre;
 
 use Zend\Db\TableGateway\TableGateway;
 
class Centretable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
      public function getCentre($id)
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
 
       
   
     
     public function deleteCentre($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
        public function saveCentre(Centre $centre)
     {
         $data = array(
 
              'nom' => $centre->nom,
              
              'ville' => $centre->ville,
             'adress' => $centre->adress,
              'num_tel' => $centre->num_tel,
             
             'email' => $centre->email,
           
            
             
                 
             'login' => $centre->login,
               'password' => $centre->password,
            
        );

         $id = (int) $centre->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCentre($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('centre id does not exist');
             }
         }
     }
     
     
      public function fetchid($id)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
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
