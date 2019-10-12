<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Repense;
 use Zend\Db\TableGateway\TableGateway;
 
class Repensetable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getRepense($id)
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
  
       
      public function deleteRepense($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveRepense(Repense $repense)
     {
         $data = array(
              
              'id_question' => $repense->id_question,
             
          
            'repense' => $repense->repense,
               'id_formateur' => $repense->id_formateur,
             'date' => $repense->date,
        
           
        );

         $id = (int) $repense->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getRepense($id)) {
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
         public function fetchallbysessionid($id_question)
     {
         
         $rowset = $this->tableGateway->select(array('id_question' => $id_question));
         return $rowset;
     }
       
     
 
          
         
  
     
}
