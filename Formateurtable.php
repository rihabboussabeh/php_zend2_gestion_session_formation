<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Formateur;
 
 use Zend\Db\TableGateway\TableGateway;
 
class Formateurtable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
      public function getFormateur($id)
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
 
       
   
     
     public function deleteFormateur($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
        public function saveFormateur(Formateur $formateur)
     {
         $data = array(
              'nom' => $formateur->nom,
              'prenom' => $formateur->prenom,
             
              'datenaiss' => $formateur->datenaiss,
              'numtel' => $formateur->numtel,
              'ville' => $formateur->ville,
   
             'email' => $formateur->email,
           
             'etud_dip' => $formateur->etud_dip,
               'exp_stage' => $formateur->exp_stage,
                
             'login' => $formateur->login,
               'password' => $formateur->password,
            
        );

         $id = (int) $formateur->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getFormateur($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('formateur id does not exist');
             }
         }
     }
     
     
      public function fetchid($id)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
        public function fetchrecepteur($recepteur)
     {
        $resultSet = $this->tableGateway->select(array('recepteur' => (int) $recepteur));
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
