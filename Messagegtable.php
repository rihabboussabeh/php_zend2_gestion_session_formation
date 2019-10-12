<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Messageg;
 use Zend\Db\TableGateway\TableGateway;
 
class Messagegtable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getMessageg($id)
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
  
       
      public function deleteMessageg($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveMessageg(Messageg $messageg)
     {
         $data = array(
              
              'id_session' => $messageg->id_session,
               'id_formateur' => $messageg->id_formateur,
         
               'objet' => $messageg->objet,
            'message' => $messageg->message,
             'datemessage' => $messageg->datemessage,
        
           
        );

         $id = (int) $messageg->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getMessageg($id)) {
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
        public function fetchallbyformateurid($id_formateur)
     { 
         $rowset = $this->tableGateway->select(array('id_formateur' => $id_formateur));
         return $rowset;
     }
     
 
          
         
  
     
}
