<?php   
    // Assume that initially the email message hasn't been sent
    $mailSent = false;

    // Message variable
    $message ='';

    // Assume that initially the input contains nothing suspect
    $suspect = false;

    /** Recurssive function that checks for suspect phrases
     *  $suspect is passed by reference
     */
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

    function checkMissingFields(&$required) {
        
       
        global $suspect;
        global $errors;
        global $headers;
        global $expected;
        global $to;
        global $subject;
        global $authorized;
        
        // Regular expression to search for suspect phrases
        $pattern = '/Content-type:|Bcc:|Cc:/i';
        
        $missing = [];
        
        // Checks the $_POST array for suspect phrases
        isSuspect($_POST, $pattern, $suspect);
      
        // Process the form only if no suspect phrases are found
        if (!$suspect):           

            /** Check that required fields have been filled in
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
                elseif (in_array($key, $expected))  {
                    $$key = $value;
                }                     
            }

            /** Loops through the required fields and checks if data has been submitted for each
             *  required field
             */
            foreach ($required as $field)  {
                if (!isset($_POST[$field])) {
                    $missing[] = $field;
                }
                // This verifies if the applicant has agreed to radio buttons which are 'Yes' or 'No' ones
                else if ($_POST[$field] == 'No')    {
                    $missing[] = $field;
                }
            }     
            
            /* Crashes on kid's form
            // Validate date of birth
            if (!preg_match("/^((19[0-9][0-9]|200[0-2])(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1]))|((((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(19[0-9][0-9]|200[0-2]))|(\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(19[0-9][0-9]|200[0-2])\s)$/", $_POST['dateOfBirth'])) {
                $missing[] = $required[2];
            }
            // Validate phone number
            if (!preg_match("/^(1 )*\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})|(\d){3}(-)*(\d){4}$/", $_POST['phoneNumber'])) {
                $missing[] = $required[6];
            }
            */

            // Validate user's email
            if (!$missing && !empty($_POST['email'])) {
                $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                if ($validemail)    {
                    $header[] = "Reply-to: $validemail";
                }
                else{
                    $errors['email'] = true;
                }
            }
            else if (!$missing && !empty($_POST['chEmail'])) {
                $validemail = filter_input(INPUT_POST, 'chEmail', FILTER_VALIDATE_EMAIL);
                if ($validemail)    {
                    $header[] = "Reply-to: $validemail";
                }
                else{
                    $errors['chEmail'] = true;
                }
            }
            // if no errors, create headers and message body
            if (!$errors && !$missing):
                $headers = implode("\r\n", $headers);
                // Initializing message (reference the global variable)
                global $message;
                foreach ($expected as $field)   :
                    if (isset($$field) && !empty($$field))  {
                        $val = $$field;
                    }
                    else{
                        $val = 'Not selected';
                    }
                  
                    // If an array, expand to a comma-separated string
                    if (is_array($val)) {
                        $val = implode(',',$val);
                    }
                    
                    // Insert an empty space ' ' before each capital letter
                    $field = preg_replace('/(?<!\ )[A-Z]/', ' $0', $field);

                    // IF structuring data from a child's form, replaces ch with Child in the message body
                    if (strpos($field, 'ch') !== false)                 {
                        $field = str_replace('ch ','Child ', $field);                        
                    }            
                    
                    $message .= ucfirst($field). ":". $val . "\r\n\r\n";
                endforeach;  
                /* Wraps message content (by default, each line on an email message)
                    should only be 70 characters long.*/
                $message = wordwrap($message, 70);
                
                // References global variable
                global $mailSent;

                // Attempts to send email and stores true if successful and false if unsucessful in variable
                $mailSent = true;
                // $mailSent = mail($to, $subject, $message, $headers, $authorized);  
                
                if (!$mailSent) {
                    $errors['mailfail'] = true;
                }             
            endif;
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
                         
            // Verifies if the input value matches the current fieldId, if it does, makes that radio button checked.
            if (strpos($fieldId,$_POST[$fieldName]))   {    
                           
                echo "<script type='text/javascript'> 
                var radioButton = document.getElementById('".$fieldId."');
                radioButton.checked = true; 
                </script>";     
            }              
        }         
    }




 ?>  
























  