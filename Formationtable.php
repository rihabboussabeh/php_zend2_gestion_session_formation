<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;

 use Zend\Db\TableGateway\TableGateway;
 
class Formationtable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
   public function fetchformation($categ)
     {
        $resultSet = $this->tableGateway->select(array('categ'=> $categ));
         return $resultSet ;
         
     }
      public function saveFormation(Formation $formation)
     {
         $data = array(
          'langage' => $formation->langage,
         'objectif' => $formation->objectif,
              'prequis' => $formation->prequis,
               
          'idformateur' =>$formation->idformateur,
         
            
        );

         $id = (int) $formation->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getFormation($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('formation id does not exist');
             }
         }
     }
           public function fetchbyformateur($idformateur)
     {
         
         $rowset = $this->tableGateway->select(array('idformateur' => $idformateur));
         return $rowset;
     }
     
}
