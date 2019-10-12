<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Inscrit;
 use Zend\Db\TableGateway\TableGateway;
 
class Inscrittable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getInscrit($id)
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
  
       
      public function deleteInscrit($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveInscrit(Inscrit $document)
     {
         $data = array(
          
              'id_session' => $document->id_session,
         
        
        
           
        );

         $id = (int) $document->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getInscrit($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Proposisition id does not exist');
             }
         }
     }
     
  
   public function fetchsession($id_session)
     {
        $resultSet = $this->tableGateway->select(array('id_session'=> $id_session));
         return $resultSet ;
         
     }
          
         
  
     
}
