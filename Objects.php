<?php

class Functions {
+
    static $formula = array();
    
    public function createFormula($key,$value) {
        self::formula[$key] =  $value;
       
    }

    public function listFormula() {
        //$formulaObject = new Object(self::$formula);
        //self::$formula = $formulaArrayObject->getArrayCopy();
        foreach(self::formula as $key => $value){
            echo $key.' '.$value;
        }
      
    }
   
    public function deleteFormula($key) {

        unset(self::formula[$key]);
        echo 'delete successful'
    }

    public function calculateFormula($Key) {
           
  
    }

    public function quit(){
        exit();
    }
}
?>
