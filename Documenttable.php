<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Document;
 use Zend\Db\TableGateway\TableGateway;
 
class Documenttable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getDocument($id)
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
  
       
      public function deleteDocument($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveDocument(Document $document)
     {
         $data = array(
                'libelle' => $document->libelle,
              'id_session' => $document->id_session,
         
               'code' => $document->code,
           'etat' => $document->etat,
        
           
        );

         $id = (int) $document->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getDocument($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Proposisition id does not exist');
             }
         }
     }
     
      public function fetchid($idp)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
         public function fetchallbysessionid($id_session)
     {
         
         $rowset = $this->tableGateway->select(array('id_session' => $id_session));
         return $rowset;
     }
     
 
          
         
  
     
}
