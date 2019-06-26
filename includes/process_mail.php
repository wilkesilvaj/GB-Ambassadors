<?php    

    /**
     * Function which checks if all required fields have been filled
     */

    // // Loops through the form's data
    // foreach($_POST as $key => $value)   {
    //     // Verifies if the value is an array. If it isn't its value is trimmed to ignore whitespaces
    //     $value = is_array($value) ? $value : trim($value);

    //     // Verifies if $value is empty and if it is a required field. If both are true, it adds that key to the $missing array
    //     if (empty($value) && in_array($key, $required)) {
    //         $missing[] = $key;
    //         $$key = '';
    //     }
    //     // If the value submitted is not empty and it is required, create a variable variable from it
    //     elseif (in_array($key, $expected))  {
    //         /* Creates a variable variable named after each form field containing the value submitted
    //         e.g: this creates a $firstName variable which will hold the value of user's first name
    //         that was submitted*/    
    //         $$key = $value;
    //     }
    //     /*
    //     else    {
    //         /* Creates a variable variable named after each form field containing the value submitted
    //         e.g: this creates a $firstName variable which will hold the value of user's first name
    //         that was submitted
            
    //         $$key = $value;
    //     }
    //     */
    
    // }

    function checkMissingFields(&$required) {

        // Loops through the form's data
        foreach($_POST as $key => $value)   {
            // Verifies if the value is an array. If it isn't its value is trimmed to ignore whitespaces
            $value = is_array($value) ? $value : trim($value);

            // Verifies if $value is empty and if it is a required field. If both are true, it adds that key to the $missing array
            if (empty($value) && in_array($key, $required)) {
                $missing[] = $key;
                $$key = '';
            }      
        }
        return $missing;
    }


    function validateAdultsForm(&$missing)   {
        $errors = [];
        if ($missing && in_array('firstName', $missing)) {
            $errors[] = "Please enter your first name<br />";   }
        if ($missing && in_array('lastName', $missing)) {
            $errors[] = "Please enter your lastName name<br />";    }

        return $errors;
    }

    function validateKidsForm(&$missing) {

    }

 ?>  
























  