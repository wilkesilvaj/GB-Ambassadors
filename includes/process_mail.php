<?php   

    // Variables used to check for suspicious phrases / email headers
    $suspect = false;

    function isSuspect($value, $pattern, &$suspect) {
        if (is_array($value))   {
            foreach ($value as $item)   {
                isSuspect($item, $pattern, $suspect);
            }
        }   else{     
           
            if (preg_match($pattern, $value))   {
                $suspect = true;
            }           
        }
    }



    //  print_r($_POST);

    function checkMissingFields(&$required) {
        
        global $suspect;
        
        //Looks for Content-type: OR Bcc: OR Cc: AND ITS CASE INSENSITIVE
        $pattern = '/Content-type:|Bcc:|Cc:/i';
        
        $missing = [];
        
        isSuspect($_POST, $pattern, $suspect);
      
    
        if (!$suspect):           

            /** Loops through the form's data (checks if the data sent from the form contains empty values)
             *  IMPORTANT: THIS FOREACH WILL ONLY LOOP THROUGH FIELDS THAT MIGHT HAVE SENT EMPTY STRINGS AS DATA
             *  BELOW THE FOREACH WE MUST VALIDATE IF ALL THE REQUIRED FIELDS HAVE BEEN SET OR NOT
             *  */
            foreach($_POST as $key => $value)   {
                // Verifies if the value is an array. If it isn't its value is trimmed to ignore whitespaces
                $value = is_array($value) ? $value : trim($value);

                // Verifies if $value is empty and if it is a required field. If both are true, it adds that key to the $missing array
                if (empty($value) && in_array($key, $required)) {
                    $missing[] = $key;
                    $$key = '';
                }                       
            }

            /** Loops through the required fields and checks if data has been submitted for each
             *  required field
             */
            foreach ($required as $field)  {
                if (!isset($_POST[$field])) {
                    $missing[] = $field;
                }
            }
        endif;
            return $missing;
    }

    function maintainSubmittedData($fieldName)    {
        // Checks if any data has been submitted for a particular field
        if (isset($_POST[$fieldName]))  {
            
            echo 'value="' . htmlentities($_POST[$fieldName]) . '"';
        }         
    }

    function maintainSubmittedRadioData($fieldName, $fieldId)    {
        // Checks if any data has been submitted for a particular field
        if (isset($_POST[$fieldName]))  {
                   
        

            if (strpos($fieldId,$_POST[$fieldName]))   {    
                
                // echo "<script type='text/javascript'> 
                // alert('Your ".$fieldName." is ".$_POST[$fieldName]. "');
                // </script>";  
                
                echo "<script type='text/javascript'> 
                var radioButton = document.getElementById('".$fieldId."');
                radioButton.checked = true; 
                </script>";     
            }              
        }         
    }



    function validateAdultsForm(&$missing)   {
        $errors = [];
        if ($missing && in_array('firstName', $missing)) {
            $errors[] = "Please enter your first name<br />";   }
        if ($missing && in_array('lastName', $missing)) {
            $errors[] = "Please enter your lastName name<br />";    }
        if ($missing && in_array('dateOfBirth', $missing)) {
            $errors[] = "Please enter your date of birth<br />";    }    
        if ($missing && in_array('belt', $missing)) {
            $errors[] = "Please select your belt<br />";    }
        if ($missing && in_array('dateOfGraduation', $missing)) {
            $errors[] = "Please enter the date of your last graduation<br />";    }
        if ($missing && in_array('phoneNumber', $missing)) {
            $errors[] = "Please enter of your phone number<br />";    }
        if ($missing && in_array('email', $missing)) {
            $errors[] = "Please enter your email address<br />";    }
        if ($missing && in_array('address', $missing)) {
            $errors[] = "Please enter your address<br />";    }
        if ($missing && in_array('homeSchool', $missing)) {
            $errors[] = "Please enter your home school's name<br />";    }
        if ($missing && in_array('homeSchoolAddress', $missing)) {
            $errors[] = "Please enter your home school's address<br />";    }

        return $errors;
    }

    function validateKidsForm(&$missing) {
    }

 ?>  
























  