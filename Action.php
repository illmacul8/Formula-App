<?php

class Action {

    public $formulaList = array();
    
    public function add($title,$value) {
        
        $this->formulaList[$title] = $value;
        return true;
    }

    public function listAll() {

        foreach($this->formulaList as $key => $value){
            echo $key ." - ". $value. "\n";
        }
      
    }
   
    public function deleteOne($key) {

       unset($this->formulaList[$key]);
       return true;
    }

    public function calculateFormula($initialValue, $secondValue, $formula) {
        
        if(!in_array($formula,$this->formulaList)){
            echo "Formula not available";
            return false;
        }
        $operator = $this->formulaList[$formula];
        $evaluate = eval(`$initialValue $operator $secondValue`);
    }

    public function quit(){
        exit();
    }
}

?>
