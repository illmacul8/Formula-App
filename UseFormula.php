<?php

require "Action.php";

    echo "Hello, WELCOME TO MY formula APP\n
    Press 1: To create a formula\n
    Press 2: To view all formulas\n
    Press 3: To delete a formula\n
    Press 4: To calculate with a formula\n
    Press 5: To Quit\n";

    $userInput = readline("Enter input here: ");

    $input = trim($userInput);

    $allowed_values = [1,2,3,4,5];

    if(!in_array($input, $allowed_values)){
        echo 'Invalid parameter supplied';
        exit;
    }

    $input = (int)$input;

    $formula = new Action();
    
    switch($input){
    
        case  1:

            $formulaTitlePrompt = "Please enter the title of the formula here: ";
            $formulaTitle = readline($formulaTitlePrompt);
            if(!validateInput($formulaTitle)){
                $formulaTitle = readline($formulaTitlePrompt);
            }

            $formulaValuePrompt = "Please enter the formula here: ";
            $formulaValue = readline($formulaValuePrompt);
            if(!validateInput($formulaValue)){
                $formulaValue = readline($formulaTitlePrompt);
            }

            if($formula->add($formulaTitle, $formulaValue)){
                echo "Creation successful";
            };

        break;

        case 2:
            $formula->listAll();
        break;

        case 3:

            $deletePromptText = "Please enter the title of the formula here: ";
            $deleteValue = readline($deletePromptText);
            if(!validateInput($deleteValue)){
                $deleteValue = readline($secondValuePrompt);
            }
            
            if($formula->deleteOne($deleteValue)){
                echo "Delete successful";
            };

        break;

        case 4:

            $initialValuePrompt = "Enter initial value: ";
            $initialValue = readline($initialValuePrompt);
            if(!validateCalculationInput($initialValue)){
                $initialValue = readline($initialValuePrompt);
            }
            
            $secondValuePrompt = "Enter next value: ";
            $secondValue = readline($secondValuePrompt);
            if(!validateCalculationInput($secondValue)){
                $secondValue = readline($secondValuePrompt);
            }

            $formulaValuePrompt = "Enter formula: ";
            $formulaValue = readline($formulaValuePrompt);
            if(!validateInput($secondValue)){
                $formulaValue = readline($secondValuePrompt);
            }

            $formula->calculateFormula($initialValue, $secondValue,$formulaValue);
        break;

        case  5:
            exit;
        break;

    };


    function validateInput($input){
        if(!trim($input)){
            echo "Invalid input \n";
            return false;
        }
        return true;
    }

    function validateCalculationInput($input){
        if(!trim($input) || !is_numeric($input)){
            echo "Invalid input \n";
            return false;
        }
        return true;
    }
