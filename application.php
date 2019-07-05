<?php    

    $errors = [];
    $missing = [];   
    
    // Alina's email
    // empty7empty@gmail.com 
    
    /*Mail variables */
    $to = 'João Wilke <wilke.joao@gmail.com>';
    $subject = 'GB Pacific Northwest Ambassadors Program Application';    
    $headers = [];
    $headers[] = 'From: wilke.joao.test@gmail.com';
    $headers[] = 'Cc: empty7empty@gmail.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    // $authorized = null;
    $authorized = '-fwilke.joao.test@gmail.com';

    // Includes other files
    require("./includes/process_mail.php");
   
    // If the user has clicked on the submit button of the "Adults Form"
    if (isset($_POST['submit']))    {
        $expected = ['firstName','lastName', 'dateOfBirth', 
        'gender', 'belt', 'dateOfGraduation', 'phoneNumber', 'email', 'address', 'homeSchool', 'homeSchoolAddress',
        'icp6', 'icpUpToDate', 'uniform', 'attendance', 'results'  ]; 

    $required = ['firstName','lastName', 'dateOfBirth', 
    'gender', 'belt', 'dateOfGraduation', 'phoneNumber', 'email', 'address', 'homeSchool', 'homeSchoolAddress',
    'icp6', 'icpUpToDate', 'uniform', 'attendance', 'results'  ]; 

    // Gets all the missing fields based on its fields
    $missing = checkMissingFields($required);

   
    }
    // If the user has clicked on the submit button of the "Kids Form"
    else if (isset($_POST['chSubmit'])) {
        $expected = ['chFirstName','chLastName', 'chParentName', 'chDateOfBirth',
        'chGender', 'chBelt', 'chDateOfGraduation', 'chPhoneNumber', 'chEmail', 'chAddress', 'chHomeSchool', 'chHomeSchoolAddress',
        'chIcp6', 'chIcpUpToDate', 'chUniform', 'chAttendance', 'chResults'  ];

        $required = ['chFirstName','chLastName', 'chParentName', 'chDateOfBirth',
        'chGender', 'chBelt', 'chDateOfGraduation', 'chPhoneNumber', 'chEmail', 'chAddress', 'chHomeSchool', 'chHomeSchoolAddress',
        'chIcp6', 'chIcpUpToDate', 'chUniform', 'chAttendance', 'chResults'  ];
 
    // Gets all the missing fields based on its fields
    $missing = checkMissingFields($required); 
    
    }

    if ($mailSent)  {
        echo "<script type='text/javascript'> ";
        echo "alert('Mail was sent!')";
        echo "</script>";  
    }

    function displayError($fieldId)   {        
        echo "<style>
            #".$fieldId." {
                border: 3px solid rgb(148, 0, 0);
                box-shadow: 0 4px 8px 0 rgba(148, 0, 0, 0.2), 0 6px 20px 0 rgba(148, 0, 0, 0.19);
            }
        </style>";
    }
  
?>
<!doctype html>
<html lang = "en">
  <head>
    <!-- Required meta tags -->
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=No">
    
    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "aNonymous">
    
    <!-- Font Awesome Icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Customized css -->
    <link rel = "stylesheet" href= "css/application.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Adults Form Championship Generation Script-->
    <script type="text/javascript" src="js/application.js"></script>

    <!-- Kids Form Championship Generation Script-->
    <script type="text/javascript" src="js/kidsapplication.js"></script>

    <!-- Script to keep the active tab -->
    <script type="text/javascript" src="js/tabs.js"></script>

    <title>GB Ambassadors Program Pacific Northwest</title>
    </head>
    <body>
        <!-- Nav Bar with the logo-->
        <nav class = "navbar navbar-expand-lg ">
            <a class = "navbar-brand No-margin"  href = "index.html">
                <img src = "images/gblogocrop.jpeg" alt = "Gracie Barra Ambassadors logo"  class = "d-inline-block align-top">                 
            </a>
            <!-- Inserted a canadian flag, as per Rodrigo's request-->
            <img src = "images/canada.jpg" alt = "Canadian flag"  class = "d-inline-block valign">  
            <ul class = "nav justify-content-center" id = "navhead">
                <li class = "nav-item active">
                        <a class = "nav-link" href = "index.html">Home<span class = "sr-only"></span></a>
                </li>
                <li class = "nav-item active">
                    <a class = "nav-link" href = "aboutus.html">About Us <span class = "sr-only"></span></a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "application.php">Apply Now</a>
                </li>
                <li class = "nav-item">
                        <a class = "nav-link" href = "calculator.html">Points Calculator</a>
                </li>
                <li class = "nav-item">
                <a class = "nav-link" href = "sponsors.html">Sponsors</a>
                </li>
            </ul>
        </nav>
        <!-- END OF NAV BAR-->
    
        <!-- Title with the descritption-->
        <div class = "content">
            <div class = "row featurette" id = "featurette1">
                    <!-- <div class = "col-md-7 flex-padding-top" style = "text-align: center;"></div>-->
                        <h2 class = "featurette-heading gbpacific">Gracie Barra Ambassadors Pacific Northwest Application</span></h2>
                    <!-- </div>-->
            </div>               
        </div> 

        <div class = "container" id = "holder">
            <ul class = "nav nav-tabs" id = "myTab" role = "tablist">
                <li class = "nav-item">
                    <a class = "nav-link active" id = "home-tab" data-toggle = "tab" href = "#adults" role = "tab" aria-controls = "adults" aria-selected = "true">Adults Form</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" id = "profile-tab" data-toggle = "tab" href = "#kids" role = "tab" aria-controls = "kids" aria-selected = "false">Kids Form</a>
                </li>
            </ul>          
           
            <div class = "tab-content" id = "myTabContent">
                <div class = "tab-pane fade show active" id = "adults" role = "tabpanel" aria-labelledby = "home-tab">
                    <div class = "container no-padding">
                        <!-- Beggining of the form-->                        
                        <form class = "padding-sides padding-bottom" id = "adultsForm" method = "POST" action = "<?= $_SERVER['PHP_SELF']; ?>">
                        <!-- Checks if there is any suspicious data in the form -->
                        <?php  if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
                            <div class = "form-row">
                                <p class = "warning">Sorry, your mail couldn't be sent!</p>
                            </div>
                        <?php endif; ?>   
                        
                        <!-- Not sure if we need this, but that's an alert message -->
                        <?php if ($missing && (in_array('firstName', $missing) || in_array('lastName', $missing)
                        || in_array('dateOfBirth', $missing) || in_array('gender', $missing) || in_array('dateOfGraduation', $missing)
                        || in_array('phoneNumber', $missing) || in_array('email', $missing) || in_array('address', $missing)
                        || in_array('homeSchool', $missing) || in_array('homeSchoolAddress', $missing) || in_array('icp6', $missing) 
                        || in_array('icpUpToDate', $missing) || in_array('uniform', $missing) || in_array('attendance', $missing)
                        || in_array('results', $missing) || in_array('belt', $missing))): ?>
                            <p class="alert alert-danger" role="alert" aria-live="assertive">
                                <span class="center">Please fix the errors</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p> 
                        <?php endif; ?> 
                        
                        <!-- First row with First and Last Name fields-->
                            <div class = "form-row padding-top" >
                                <div class = "form-group col-md-6">                     
                                    <label for = "firstName">First Name</label>
                                    <?php if ($missing && in_array('firstName', $missing)) :
                                        displayError('firstName');
                                    endif; ?>
                                    <input type = "text" class = "form-control" name = "firstName" id = "firstName" placeholder = "Enter your First Name"
                                    <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedData('firstName');
                                        } 
                                    ?>
                                    >
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "lastName">Last Name</label>
                                    <?php if ($missing && in_array('lastName', $missing)) : 
                                        displayError('lastName');
                                    endif; ?>
                                    <input type = "text" class = "form-control" name = "lastName" id = "lastName" placeholder = "Enter your Last Name"
                                    <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedData('lastName');
                                        } 
                                    ?>
                                    >
                                </div>
                            </div>
                            <!-- Second row with DOB and rdb fields-->
                            <div class = "form-row">
                                <div class = "form-group col-md-4">
                                    <label for = "dateOfBirth">Date of Birth:</label>
                                    <?php if ($missing && in_array('dateOfBirth', $missing)) : 
                                        displayError('dateOfBirth');
                                    endif; ?>
                                    <input type = "date" name = "dateOfBirth" id = "dateOfBirth" placeholder = "yyyy-mm-dd" 
                                    <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedData('dateOfBirth');
                                        } 
                                    ?>
                                    ><br />
                                </div>
                                <div class = "form-group col-md-4">
                                    Gender:
                                    <?php if ($missing && in_array('gender', $missing)) : 
                                        displayError('rdb_gender_area');
                                    endif; ?>
                                    <div id="rdb_gender_area">
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "gender"  id = "rdbMale" value = "Male">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('gender', 'rdbMale');
                                        } 
                                        ?>                                        
                                        <label class = "form-check-label" for = "inlineRadio1">Male</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "gender"  id = "rdbFemale" value = "Female">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('gender', 'rdbFemale');
                                        } 
                                        ?>                                        
                                        <label class = "form-check-label" for = "inlineRadio2">Female</label>
                                    </div>
                                    </div>
                                </div>
        
                                <div class = "form-group col-md-4">
                                    Belt:
                                    <?php if ($missing && in_array('belt', $missing)) : 
                                        displayError('rdb_belt_area');
                                    endif; ?>
                                    <div id="rdb_belt_area">
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbBlack" value = "Black">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('belt', 'rdbBlack');
                                        } 
                                        ?> 
                                        <label class = "form-check-label" for = "rdbBlack">Black</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbBrown" value = "Brown">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('belt', 'rdbBrown');
                                        } 
                                        ?> 
                                        <label class = "form-check-label" for = "rdbBrown">Brown</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbPurple" value = "Purple">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('belt', 'rdbPurple');
                                        } 
                                        ?> 
                                        <label class = "form-check-label" for = "rdbPurple">Purple</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbBlue" value = "Blue">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('belt', 'rdbBlue');
                                        } 
                                        ?> 
                                        <label class = "form-check-label" for = "rdbBlue">Blue</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbWhite" value = "White">
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('belt', 'rdbWhite');
                                        } 
                                        ?> 
                                        <label class = "form-check-label" for = "rdbWhite">White</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Third row-->
                            <div class = "form-group">
                                <label for = "dateOfGraduation">Date of your last graduation(Belt):</label>
                                <?php if ($missing && in_array('dateOfGraduation', $missing)) :
                                  displayError('dateOfGraduation');   
                                endif; ?>
                                <input type = "date" class = "form-control" name = "dateOfGraduation" id = "dateOfGraduation" placeholder = "yyyy-mm-dd"
                                    <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedData('dateOfGraduation');
                                        } 
                                    ?>
                                >
                            </div>
                            <!-- Forth row-->
                            <div class = "form-row">
                                <div class = "form-group col-md-6">
                                    <label for = "phoneNumber">Phone Number:</label>
                                    <?php if ($missing && in_array('phoneNumber', $missing)) : 
                                        displayError('phoneNumber');
                                    endif; ?>
                                    <input type = "text" class = "form-control" name = "phoneNumber" id = "phoneNumber" placeholder = "Enter your phone number"
                                        <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedData('phoneNumber');
                                            } 
                                        ?>
                                    >
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "email">Email:</label>
                                    <?php if ($missing && in_array('email', $missing)) : 
                                        displayError('email');
                                    elseif (isset($errors['email'])) : 
                                        displayError('email');
                                    endif; ?>
                                    <input type = "email" class = "form-control" name = "email" id = "email" placeholder = "example@hotmail.com" data-toggle = "popover" data-trigger = "hover"
                                    data-content = "My popover content."
                                        <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedData('email');
                                            } 
                                        ?>
                                    >
                                </div>
                            </div>
                            <!-- Fifth row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-4">
                                        <label for = "address">Address:</label>
                                        <?php if ($missing && in_array('address', $missing)) :
                                            displayError('address');
                                         endif; ?>
                                        <input type = "text" class = "form-control" name = "address" id = "address" placeholder = "1234 Example Street, Vancouver"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('address');
                                                } 
                                            ?>
                                        >
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "homeSchool">Home School:</label>
                                        <?php if ($missing && in_array('homeSchool', $missing)) :
                                            displayError('homeSchool');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "homeSchool" id = "homeSchool" placeholder = "Gracie Barra Vancouver"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('homeSchool');
                                                } 
                                            ?>
                                        >
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "homeSchoolAddress">Home School Address:</label>
                                        <?php if ($missing && in_array('homeSchoolAddress', $missing)) : 
                                            displayError('homeSchoolAddress');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "homeSchoolAddress" id = "homeSchoolAddress" placeholder = "987 GB Avenue, Vancouver"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('homeSchoolAddress');
                                                } 
                                            ?>
                                        >
                                    </div>
                            </div>
                            <!-- Sixth row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "icp6">ICP 6 is a requirement for applying to the GB Ambassadors Ambassadors Program. Did you complete the last ICP?:</label>
                                        <?php if ($missing && in_array('icp6', $missing)) :
                                            displayError('icp6_area');
                                        endif; ?>
                                        <div id="icp6_area">
                                        <input type = "radio" name = "icp6" id = "icp6Yes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('icp6', 'icp6Yes');
                                                } 
                                            ?> 
                                        <input type = "radio" class = "margin-left" name = "icp6" id = "icp6No" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('icp6', 'icp6No');
                                                } 
                                            ?> 
                                        </div>
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "icpUpToDate">Is the Head Instructor and all the Staff members of your Home School aligned and updated with the latest ICP?</label>
                                        <?php if ($missing && in_array('icpUpToDate', $missing)) :
                                            displayError('icp_area');
                                        endif; ?>
                                        <div id="icp_area">
                                        <input type = "radio" name = "icpUpToDate" id = "icpUpToDateYes"  value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('icpUpToDate', 'icpUpToDateYes');
                                                } 
                                            ?> 
                                        <input type = "radio" class = "margin-left" name = "icpUpToDate" id = "icpUpToDateNo" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('icpUpToDate', 'icpUpToDateNo');
                                                } 
                                            ?> 
                                        </div>
                                    </div>
                            </div>
                            <hr class = "divider">
                            <!-- Seventh row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "uniform">Wearing the Full Gracie Barra Uniform and wearing the latest Gracie Barra Red Competition Shirt is mandatory to apply for the GB Pacific Northwest Ambassadors Program. Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('uniform', $missing)) :
                                            displayError('uniform_area');
                                        endif; ?>
                                        <div id="uniform_area">
                                        <input  type = "radio" name = "uniform" id = "uniformYes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('uniform', 'uniformYes');
                                                } 
                                            ?> 
                                        <input  type = "radio" class = "margin-left" name = "uniform" id = "uniformNo" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('uniform', 'uniformNo');
                                                } 
                                            ?> 
                                        </div>
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "attendance">In order to be a GB Ambassadors Pacific Northwest, it is required your attendance in at least 80% of our 3 times per week competition training, hosted at GB Vancouver (Mon, Wed, Fri 12pm). Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('attendance', $missing)) : 
                                            displayError('attendance_area');
                                        endif; ?>
                                        <div id="attendance_area">
                                        <input type = "radio" name = "attendance" id = "attendanceYes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('attendance', 'attendanceYes');
                                                } 
                                            ?> 
                                        <input type = "radio" class = "margin-left" name = "attendance" id = "attendanceNo" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('attendance', 'attendanceNo');
                                                } 
                                            ?> 
                                        </div>
                                    </div>
                            </div>
                            <hr class = "divider">
                            <!-- Eigth row-->
                            <div class = "form-row">                                    
                                <label for = "results"> Our criteria to elect the athletes that will be granted support from the GB Ambassadors Pacific Northwest is based on the info collected on this form and the results in competitions throughout the Season. Are you willing to make the commitment to send the results you get in competitions to the GB Ambassadors Pacific Northwest Staff?</label>
                                <?php if ($missing && in_array('results', $missing)) :
                                    displayError('results_area');
                                endif; ?>
                                <div id="results_area">
                                <input  type = "radio" name = "results" id = "resultsYes" value = "Yes" />Yes
                                    <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('results', 'resultsYes');
                                        } 
                                    ?>
                                <input type = "radio" class = "margin-left" name = "results" id = "resultsNo" value = "No" />No
                                    <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedRadioData('results', 'resultsNo');
                                        } 
                                    ?>
                                </div>        
                            </div>
                            <!-- Ninth row -->
                            <div class = "form-row">
                                <table class = "center" style = "width: 100%;">
                                    <thead>
                                        <tr>
                                            <th colspan="6"><h3>Tournament History</h3></th>
                                        </tr>
                                        <tr>
                                            <th>Championships</th>
                                            <th>Seasons</th>
                                            <th>1st place</th>
                                            <th>2nd place</th>
                                            <th>3rd place</th>
                                            <td><!--ICONS--></td>
                                        </tr>
                                    </thead>
                                    <tbody id = "adultsTable">

                                    </tbody>
                                </table>
                            </div>
                            <div class = "form-row padding-top" id = "submitbutton">
                                <!-- <input type = "button" id = "validate" class = "btn btn-danger" value = "Validate" onclick = "validateForm();"/> -->
                                <input type = "submit" name = "submit" id = "submit"  class = "btn btn-danger" value = "Submit"/>
                               
                            </div>
        
                        </form>
            </div> 
            </div>
            <!-- KIDS FORM-->
            <div class = "tab-pane fade" id = "kids" role = "tabpanel" aria-labelledby = "profile-tab">
                    <div class = "container no-padding">
                            <!-- Beggining of the form-->
                            <form class = "padding-sides padding-bottom" id = "kidsForm" method = "POST" action = "<?= $_SERVER['PHP_SELF'] ?>">
                                <!-- Checks if there is any suspicious data in the form -->
                                <?php  if ($_POST && $suspect) : ?>
                                    <div class = "form-row">
                                        <p class = "warning">Sorry, your mail couldn't be sent!</p>
                                    </div>
                                <?php endif; ?> 
           
                                <!-- Not sure if we need this, but that's an alert message -->
                                <?php if ($missing && (in_array('chFirstName', $missing) || in_array('chLastName', $missing)
                                || in_array('chParentName', $missing) || in_array('chDateOfBirth', $missing) || in_array('chGender', $missing)
                                || in_array('chBelt', $missing) || in_array('chDateOfGraduation', $missing) || in_array('chPhoneNumber', $missing)
                                || in_array('chEmail', $missing) || in_array('chHomeSchool', $missing) || in_array('chHomeSchoolAddress', $missing) 
                                || in_array('chIcp6', $missing) || in_array('chIcpUpToDate', $missing) || in_array('chUniform', $missing)
                                || in_array('chAttendance', $missing) || in_array('chResults', $missing))): ?>
                                    <p class="alert alert-danger" role="alert" aria-live="assertive">
                                        <span class="center">Please fix the errors</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </p> 
                                <?php endif; ?> 

                                <!-- First row with First and Last Name fields-->
                                <div class = "form-row padding-top">
                                    <div class = "form-group col-md-6">
                                        <label for = "chFirstName">First Name</label>
                                        <?php if ($missing && in_array('chFirstName', $missing)) : 
                                            displayError('chFirstName');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chFirstName" id = "chFirstName" placeholder = "Enter the child's First Name"
                                        <?php
                                        if ($errors || $missing)    {
                                            maintainSubmittedData('chFirstName');
                                        } 
                                        ?>
                                        >
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chLastName">Last Name</label>
                                        <?php if ($missing && in_array('chLastName', $missing)) : 
                                            displayError('chLastName');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chLastName" id = "chLastName" placeholder = "Enter the child's Last Name"
                                            <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedData('chLastName');
                                            } 
                                            ?>
                                        >
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "chParentName">Parent's Full Name</label>
                                        <?php if ($missing && in_array('chParentName', $missing)) :
                                            displayError('chParentName');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chParentName" id = "chParentName" placeholder = "Enter the parent's Full Name"
                                            <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedData('chParentName');
                                            } 
                                            ?>
                                        >
                                    </div>
                                </div>
                                <!-- Second row with DOB and rdb fields-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-4">
                                        <label for = "chDateOfBirth">Date of Birth:</label>
                                        <?php if ($missing && in_array('chDateOfBirth', $missing)) :
                                            displayError('chDateOfBirth');
                                        endif; ?>
                                        <input type = "date" name = "chDateOfBirth" id = "chDateOfBirth" placeholder = "yyyy-mm-dd" 
                                            <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedData('chDateOfBirth');
                                            } 
                                            ?>
                                        ><br />
                                    </div>
                                    <div class = "form-group col-md-4">
                                        Gender:
                                        <?php if ($missing && in_array('chGender', $missing)) : 
                                            displayError('chGender_area');
                                        endif; ?>
                                        <div id="chGender_area">
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chGender"  id = "chRdbMale" value = "Male">
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chGender', 'chRdbMale');
                                                } 
                                            ?> 
                                            <label class = "form-check-label" for = "inlineRadio1">Male</label>
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chGender"  id = "chRdbFemale" value = "Female">
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chGender', 'chRdbFemale');
                                                } 
                                            ?> 
                                            <label class = "form-check-label" for = "inlineRadio2">Female</label>
                                        </div>
                                        </div>
                                    </div>
            
                                    <div class = "form-group col-md-4">
                                        Belt:
                                        <?php if ($missing && in_array('chBelt', $missing)) : 
                                            displayError('chBelt_area');
                                        endif; ?>
                                        <div id="chBelt_area">
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbBlack" value = "Black">
                                            <label class = "form-check-label" for = "rdbBlack">Black</label>
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chBelt', 'chRdbBlack');
                                                } 
                                            ?> 
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbBrown" value = "Brown">
                                            <label class = "form-check-label" for = "rdbBrown">Brown</label>
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chBelt', 'chRdbBrown');
                                                } 
                                            ?> 
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbPurple" value = "Purple">
                                            <label class = "form-check-label" for = "rdbPurple">Purple</label>
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chBelt', 'chRdbPurple');
                                                } 
                                            ?> 
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbBlue" value = "Blue">
                                            <label class = "form-check-label" for = "rdbBlue">Blue</label>
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chBelt', 'chRdbBlue');
                                                } 
                                            ?> 
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "belt" id = "chRdbWhite" value = "White">
                                            <label class = "form-check-label" for = "chRdbWhite">White</label>
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chBelt', 'chRdbWhite');
                                                } 
                                            ?> 
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third row-->
                                <div class = "form-group">
                                    <label for = "chDateOfGraduation">Date of your last graduation(Belt):</label>
                                    <?php if ($missing && in_array('chDateOfGraduation', $missing)) : 
                                        displayError('chDateOfGraduation');
                                    endif; ?>
                                    <input type = "date" class = "form-control" name = "chDateOfGraduation" id = "chDateOfGraduation" placeholder = "yyyy-mm-dd"
                                        <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedData('chDateOfGraduation');
                                            } 
                                        ?>
                                    >
                                </div>
                                <!-- Forth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chPhoneNumber">Phone Number:</label>
                                        <?php if ($missing && in_array('chPhoneNumber', $missing)) : 
                                            displayError('chPhoneNumber');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chPhoneNumber" id = "chPhoneNumber" placeholder = "Enter your phone number"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('chPhoneNumber');
                                                } 
                                            ?>
                                        >
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chEmail">Email:</label>
                                        <?php if ($missing && in_array('chEmail', $missing)) : 
                                            displayError('chEmail');
                                        elseif (isset($errors['chEmail'])) :
                                            displayError('chEmail');                                       
                                        endif; ?>
                                        <input type = "email" class = "form-control" name = "chEmail" id = "chEmail" placeholder = "example@hotmail.com"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('chEmail');
                                                } 
                                            ?>
                                        >
                                    </div>
                                </div>
                                <!-- Fifth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-4">
                                        <label for = "chAddress">Address:</label>
                                        <?php if ($missing && in_array('chAddress', $missing)) : 
                                            displayError('chAddress');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chAddress" id = "chAddress" placeholder = "1234 Example Street, Vancouver"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('chAddress');
                                                } 
                                            ?>                                        
                                        >
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "chHomeSchool">Home School:</label>
                                        <?php if ($missing && in_array('chHomeSchool', $missing)) : 
                                            displayError('chHomeSchool');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chHomeSchool" id = "chHomeSchool" placeholder = "Gracie Barra Vancouver"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('chHomeSchool');
                                                } 
                                            ?>
                                        >
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "chHomeSchoolAddress">Home School Address:</label>
                                        <?php if ($missing && in_array('chHomeSchoolAddress', $missing)) : 
                                            displayError('chHomeSchoolAddress');
                                        endif; ?>
                                        <input type = "text" class = "form-control" name = "chHomeSchoolAddress" id = "chHomeSchoolAddress" placeholder = "987 GB Avenue, Vancouver"
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedData('chHomeSchoolAddress');
                                                } 
                                            ?>
                                        >
                                    </div>
                                </div>
                                <!-- Sixth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chIcp6">ICP 6 is a requirement for applying to the GB Ambassadors Ambassadors Program. Did you complete the last ICP?:</label>
                                        <?php if ($missing && in_array('chIcp6', $missing)) : 
                                            displayError('chIcp6_area');
                                        endif; ?>
                                        <div id="chIcp6_area">
                                        <input type = "radio" name = "chIcp6" id = "chIcp6Yes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chIcp6', 'chIcp6Yes');
                                                } 
                                            ?>
                                        <input type = "radio" class = "margin-left" name = "chIcp6" id = "chIcp6No" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chIcp6', 'chIcp6No');
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chIcpUpToDate">Is the Head Instructor and all the Staff members of your Home School aligned and updated with the latest ICP?</label>
                                        <?php if ($missing && in_array('chIcpUpToDate', $missing)) :
                                            displayError('chIcpUpToDate_area');
                                        endif; ?>
                                        <div id="chIcpUpToDate_area">
                                        <input type = "radio" name = "chIcpUpToDate" id = "chIcpUpToDateYes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chIcpUpToDate', 'chIcpUpToDateYes');
                                                } 
                                            ?>
                                        <input type = "radio" class = "margin-left" name = "chIcpUpToDate" id = "chIcpUpToDateNo" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chIcpUpToDate', 'chIcpUpToDateNo');
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <hr class = "divider">
                                <!-- Seventh row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chUniform">Wearing the Full Gracie Barra Uniform and wearing the latest Gracie Barra Red Competition Shirt is mandatory to apply for the GB Pacific Northwest Ambassadors Program. Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('chUniform', $missing)) : 
                                            displayError('chUniform_area');
                                        endif; ?>
                                        <div id="chUniform_area">
                                        <input type = "radio" name = "chUniform" id = "chUniformYes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chUniform', 'chUniformYes');
                                                } 
                                            ?>
                                        <input type = "radio" class = "margin-left" name = "chUniform" id = "chUniformNo" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chUniform', 'chUniformNo');
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chAttendance">In order to be a GB Ambassadors Pacific Northwest, it is required your attendance in at least 80% of our 3 times per week competition training, hosted at GB Vancouver (Mon, Wed, Fri 12pm). Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('chAttendance', $missing)) :
                                            displayError('chAttendance_area');
                                        endif; ?>
                                        <div id="chAttendance_area">
                                        <input type = "radio" name = "chAttendance" id = "chAttendanceYes" value = "Yes" />Yes
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chAttendance', 'chAttendanceYes');
                                                } 
                                            ?>
                                        <input type = "radio" class = "margin-left" name = "chAttendance" id = "chAttendanceNo" value = "No" />No
                                            <?php
                                                if ($errors || $missing)    {
                                                    maintainSubmittedRadioData('chAttendance', 'chAttendanceNo');
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <hr class = "divider">
                                <!-- Eigth row-->
                                <div class = "form-row">
                                    <label for = "chResults"> Our criteria to elect the athletes that will be granted support from the GB Ambassadors Pacific Northwest is based on the info collected on this form and the results in competitions throughout the Season. Are you willing to make the commitment to send the results you get in competitions to the GB Ambassadors Pacific Northwest Staff?</label>
                                    <?php if ($missing && in_array('chResults', $missing)) : 
                                        displayError('chResults_area');
                                    endif; ?>
                                    <div id="chResults_area">
                                    <input type = "radio" name = "chResults" id = "chResultsYes" value = "Yes" />Yes
                                        <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedRadioData('chResults', 'chResultsYes');
                                            } 
                                        ?>
                                    <input type = "radio" class = "margin-left" name = "chResults" id = "chResultsNo" value = "No" />No
                                        <?php
                                            if ($errors || $missing)    {
                                                maintainSubmittedRadioData('chResults', 'chResultsNo');
                                            } 
                                        ?>
                                    </div>
                                </div>
                                <!-- Ninth row -->
                                <div class = "form-row">
                                    <table class = "center" style = "width: 100%;">
                                        <thead>
                                            <tr>
                                                <th colspan="6"><h3>Tournament History</h3></th>
                                            </tr>
                                            <tr>
                                                <th>Championships</th>
                                                <th>Seasons</th>
                                                <th>1st place</th>
                                                <th>2nd place</th>
                                                <th>3rd place</th>
                                                <td><!--ICONS--></td>
                                            </tr>
                                        </thead>
                                        <tbody id = "kidsTable">

                                        </tbody>
                                    </table>
                                </div>
                                <div class = "form-row padding-top" id = "chSubmitbutton">
                                    <!-- <input type = "button" id = "chValidate" class = "btn btn-danger" value = "Validate" onclick = "chValidateForm();"/> -->
                                    <input type = "submit" name = "chSubmit" id = "chSubmit"  class = "btn btn-danger" value = "Submit"/>
                                </div>            
                            </form>
                    </div>
                </div>
        </div>      
       

    <!-- Footer at the end of the page-->
    <footer class = "footer mt-auto center">
        <img class = "gblogo" alt="Gracie Barra Ambassadors logo" src = "images/gblogoNoback.png">
        <p class = "text-center">GB Ambassadors Program Pacific Northwest</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "aNonymous"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin = "aNonymous"></script>
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity = "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin = "aNonymous"></script>  
   
</body>
</html>