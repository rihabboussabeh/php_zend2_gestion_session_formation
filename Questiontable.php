<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Question;
 use Zend\Db\TableGateway\TableGateway;
 
class Questiontable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getQuestion($id)
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
  
       
      public function deleteQuestion($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveQuestion(Question $question)
     {
         $data = array(
              
              'id_session' => $question->id_session,
               'id_participant' => $question->id_participant,
          
            'question' => $question->question,
             'date' => $question->date,
        
           
        );

         $id = (int) $question->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getQuestion($id)) {
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
         public function fetchallbysessionid($id_session)
     {
         
         $rowset = $this->tableGateway->select(array('id_session' => $id_session));
         return $rowset;
     }
       
     
 
          
         
  
     
}
