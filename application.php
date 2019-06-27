<?php    
    $errors = [];
    $missing = [];      

    require_once("./includes/process_mail.php");
   
    // If the user has clicked on the submit button of the "Adults Form"
    if (isset($_POST['submit']))    {
        $expected = ['firstName','lastName', 'dateOfBirth',
    'gender', 'belt', 'address', 'homeSchool', 'homeSchoolAddress',
    'icp6', 'icpUpToDate', 'uniform', 'attendance', 'results'  ];

    $required = ['firstName','lastName', 'dateOfBirth', 
    'gender', 'belt', 'dateOfGraduation', 'phoneNumber', 'email', 'address', 'homeSchool', 'homeSchoolAddress',
    'icp6', 'icpUpToDate', 'uniform', 'attendance', 'results'  ]; 

    // Gets all the missing fields based on its fields
    $missing = checkMissingFields($required);

    // Gets error messages for missing fields, if any
    $errors = validateAdultsForm($missing);
    
    }
    // If the user has clicked on the submit button of the "Kids Form"
    else if (isset($_POST['chSubmit'])) {
        $expected = ['chFirstName','chLastName', 'chDateOfBirth',
    'chGender', 'chBelt', 'chDateOfGraduation', 'chPhoneNumber', 'chEmail', 'chAddress', 'chHomeSchool', 'chHomeSchoolAddress',
    'chIcp6', 'chIcpUpToDate', 'chUniform', 'chAttendance', 'chResults'  ];

        $required = ['chFirstName','chLastName', 'chParentName', 'chDateOfBirth',
        'chGender', 'chBelt', 'chDateOfGraduation', 'chPhoneNumber', 'chEmail', 'chAddress', 'chHomeSchool', 'chHomeSchoolAddress',
        'chIcp6', 'chIcpUpToDate', 'chUniform', 'chAttendance', 'chResults'  ];
 
    // Gets all the missing fields based on its fields
    $missing = checkMissingFields($required);
    
  
   
    }
  
?>
<!doctype html>
<html lang = "en">
  <head>
    <!-- Required meta tags -->
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
    
    <!-- Customized css -->
    <link rel = "stylesheet" href= "css/application.css">

    <!-- Form validation-->
    <!--<script" src = "js/formvalidation.js"></script>-->

    <title>GB Ambassadors Program Pacific Northwest</title>
    </head>
    <body>
        <!-- Nav Bar with the logo-->
        <nav class = "navbar navbar-expand-lg ">
            <a class = "navbar-brand no-margin"  href = "index.html">
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
                    <a class = "nav-link" href = "application.html">Apply Now</a>
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
                        <form class = "padding-sides padding-bottom" method = "POST" action = "<?= $_SERVER['PHP_SELF']; ?>">
                            <!-- First row with First and Last Name fields-->
                            <div class = "form-row padding-top" >
                                <div class = "form-group col-md-6">
                                    <label for = "firstName">First Name</label>
                                    <?php if ($missing && in_array('firstName', $missing)) : ?>
                                        <span class = "warning">Please enter your first name</span>
                                    <?php endif; ?>
                                    <input type = "text" class = "form-control" name = "firstName" id = "firstName" placeholder = "Enter your First Name">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "lastName">Last Name</label>
                                    <?php if ($missing && in_array('lastName', $missing)) : ?>
                                        <span class = "warning">Please enter your last name</span>
                                    <?php endif; ?>
                                    <input type = "text" class = "form-control" name = "lastName" id = "lastName" placeholder = "Enter your Last Name">
                                </div>
                            </div>
                            <!-- Second row with DOB and rdb fields-->
                            <div class = "form-row">
                                <div class = "form-group col-md-4">
                                    <label for = "dateOfBirth">Date of Birth:</label>
                                    <?php if ($missing && in_array('dateOfBirth', $missing)) : ?>
                                        <span class = "warning">Please enter your date of birth</span>
                                    <?php endif; ?>
                                    <input type = "date" name = "dateOfBirth" id = "dateOfBirth" placeholder = "yyyy-mm-dd" /><br />
                                </div>
                                <div class = "form-group col-md-4">
                                    Gender:
                                    <?php if ($missing && in_array('gender', $missing)) : ?>
                                        <span class = "warning">Please select your gender</span>
                                    <?php endif; ?>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "gender"  id = "rdbMale" value = "Male">
                                        <label class = "form-check-label" for = "inlineRadio1">Male</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "gender"  id = "rdbFemale" value = "Female">
                                        <label class = "form-check-label" for = "inlineRadio2">Female</label>
                                    </div>
                                </div>
        
                                <div class = "form-group col-md-4">
                                    Belt:
                                    <?php if ($missing && in_array('belt', $missing)) : ?>
                                        <span class = "warning">Please select your belt</span>
                                    <?php endif; ?>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbBlack" value = "Black">
                                        <label class = "form-check-label" for = "rdbBlack">Black</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbBrown" value = "Brown">
                                        <label class = "form-check-label" for = "rdbBrown">Brown</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbPurple" value = "Purple">
                                        <label class = "form-check-label" for = "rdbPurple">Purple</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbBlue" value = "Blue">
                                        <label class = "form-check-label" for = "rdbBlue">Blue</label>
                                    </div>
                                    <div class = "form-check form-check-inline">
                                        <input class = "form-check-input" type = "radio" name = "belt" id = "rdbWhite" value = "White">
                                        <label class = "form-check-label" for = "rdbWhite">White</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Third row-->
                            <div class = "form-group">
                                <label for = "dateOfGraduation">Date of your last graduation(Belt):</label>
                                <?php if ($missing && in_array('dateOfGraduation', $missing)) : ?>
                                        <span class = "warning">Please enter the date of your last graduation</span>
                                <?php endif; ?>
                                <input type = "date" class = "form-control" id = "dateOfGraduation" placeholder = "yyyy-mm-dd">
                            </div>
                            <!-- Forth row-->
                            <div class = "form-row">
                                <div class = "form-group col-md-6">
                                    <label for = "phoneNumber">Phone Number:</label>
                                    <?php if ($missing && in_array('phoneNumber', $missing)) : ?>
                                        <span class = "warning">Please enter your phone number</span>
                                    <?php endif; ?>
                                    <input type = "text" class = "form-control" id = "phoneNumber" placeholder = "Enter your phone number">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "email">Email:</label>
                                    <?php if ($missing && in_array('email', $missing)) : ?>
                                        <span class = "warning">Please enter your email address</span>
                                    <?php endif; ?>
                                    <input type = "email" class = "form-control" id = "email" placeholder = "example@hotmail.com" data-toggle = "popover" data-trigger = "hover"
                                    data-content = "My popover content.">
                                </div>
                            </div>
                            <!-- Fifth row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-4">
                                        <label for = "address">Address:</label>
                                        <?php if ($missing && in_array('address', $missing)) : ?>
                                            <span class = "warning">Please enter your address</span>
                                         <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "address" id = "address" placeholder = "1234 Example Street, Vancouver">
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "homeSchool">Home School:</label>
                                        <?php if ($missing && in_array('homeSchool', $missing)) : ?>
                                            <span class = "warning">Please enter your home school</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "homeSchool" id = "homeSchool" placeholder = "Gracie Barra Vancouver">
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "homeSchoolAddress">Home School Address:</label>
                                        <?php if ($missing && in_array('homeSchoolAddress', $missing)) : ?>
                                            <span class = "warning">Please enter your first name</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "homeSchoolAddress" id = "homeSchoolAddress" placeholder = "987 GB Avenue, Vancouver">
                                    </div>
                            </div>
                            <!-- Sixth row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "icp6">ICP 6 is a requirement for applying to the GB Ambassadors Ambassadors Program. Did you complete the last ICP?:</label>
                                        <?php if ($missing && in_array('icp6', $missing)) : ?>
                                            <span class = "warning">Please specify if you have completed the last ICP</span>
                                        <?php endif; ?>
                                        <input id = "icp6Yes" type = "radio" name = "icp6" value = "yes" />Yes
                                        <input id = "icp6No" type = "radio" name = "icp6" value = "no" />No
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "icpUpToDate">Is the Head Instructor and all the Staff members of your Home School aligned and updated with the latest ICP?</label>
                                        <?php if ($missing && in_array('icpUpToDate', $missing)) : ?>
                                            <span class = "warning">Please specify if your home school is updated with the latest ICP</span>
                                        <?php endif; ?>
                                        <input id = "icpUpToDateYes" type = "radio" name = "icpUpToDate" value = "yes" />Yes
                                        <input id = "icpUpToDateNo" type = "radio" name = "icpUpToDate" value = "no" />No
                                    </div>
                            </div>
                            <hr class = "divider">
                            <!-- Seventh row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "uniform">Wearing the Full Gracie Barra Uniform and wearing the latest Gracie Barra Red Competition Shirt is mandatory to apply for the GB Pacific Northwest Ambassadors Program. Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('uniform', $missing)) : ?>
                                            <span class = "warning">Please specify if you comply with the uniform requirements</span>
                                        <?php endif; ?>
                                        <input id = "uniformYes" type = "radio" name = "uniform" value = "yes" />Yes
                                        <input id = "uniformNo" type = "radio" name = "uniform" value = "no" />No
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "attendance">In order to be a GB Ambassadors Pacific Northwest, it is required your attendance in at least 80% of our 3 times per week competition training, hosted at GB Vancouver (Mon, Wed, Fri 12pm). Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('attendance', $missing)) : ?>
                                            <span class = "warning">Please specify if you have the minimum required attendance</span>
                                        <?php endif; ?>
                                        <input id = "attendanceYes" type = "radio" name = "attendance" value = "yes" />Yes
                                        <input id = "attendanceNo" type = "radio" name = "attendance" value = "no" />No
                                    </div>
                            </div>
                            <hr class = "divider">
                            <!-- Eigth row-->
                            <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "results"> Our criteria to elect the athletes that will be granted support from the GB Ambassadors Pacific Northwest is based on the info collected on this form and the results in competitions throughout the Season. Are you willing to make the commitment to send the results you get in competitions to the GB Ambassadors Pacific Northwest Staff?</label>
                                        <?php if ($missing && in_array('results', $missing)) : ?>
                                            <span class = "warning">Please comply with the results requirements</span>
                                        <?php endif; ?>
                                        <input id = "resultsYes" type = "radio" name = "results" value = "yes" />Yes
                                        <input id = "resultsNo" type = "radio" name = "results" value = "no" />No
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "titles">Please list below your last titles since the IBJJF Worlds 2017:</label>                                        
                                        <textarea id = "titles" rows = "4" cols = "50" placeholder = "Please separate your titles with the comma ','"></textarea>
                                    </div>
                            </div>
                            <div class = "form-row" id = "submitbutton">
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
                            <form class = "padding-sides padding-bottom" method = "POST" action = "<?= $_SERVER['PHP_SELF']; ?>">
                                <!-- First row with First and Last Name fields-->
                                <div class = "form-row padding-top">
                                    <div class = "form-group col-md-6">
                                        <label for = "chFirstName">First Name</label>
                                        <?php if ($missing && in_array('chFirstName', $missing)) : ?>
                                            <span class = "warning">Please enter your first name</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chFirstName" id = "chFirstName" placeholder = "Enter the child's First Name">
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chLastName">Last Name</label>
                                        <?php if ($missing && in_array('chLastName', $missing)) : ?>
                                            <span class = "warning">Please enter your last name</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chLastName" id = "chLastName" placeholder = "Enter the child's Last Name">
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "chParentName">Parent's Full Name</label>
                                        <?php if ($missing && in_array('chParentName', $missing)) : ?>
                                            <span class = "warning">Please enter one of your parent's full name</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chParentName" id = "chParentName" placeholder = "Enter the parent's Full Name">
                                    </div>
                                </div>
                                <!-- Second row with DOB and rdb fields-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-4">
                                        <label for = "chDateOfBirth">Date of Birth:</label>
                                        <?php if ($missing && in_array('chDateOfBirth', $missing)) : ?>
                                            <span class = "warning">Please enter your date of birth</span>
                                        <?php endif; ?>
                                        <input type = "date" name = "chDateOfBirth" id = "chDateOfBirth" placeholder = "yyyy-mm-dd" /><br />
                                    </div>
                                    <div class = "form-group col-md-4">
                                        Gender:
                                        <?php if ($missing && in_array('chGender', $missing)) : ?>
                                            <span class = "warning">Please select your gender</span>
                                        <?php endif; ?>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chGender"  id = "chRdbMale" value = "Male">
                                            <label class = "form-check-label" for = "inlineRadio1">Male</label>
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chGender"  id = "chRdbFemale" value = "Female">
                                            <label class = "form-check-label" for = "inlineRadio2">Female</label>
                                        </div>
                                    </div>
            
                                    <div class = "form-group col-md-4">
                                        Belt:
                                        <?php if ($missing && in_array('chBelt', $missing)) : ?>
                                            <span class = "warning">Please select your belt</span>
                                        <?php endif; ?>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbBlack" value = "Black">
                                            <label class = "form-check-label" for = "rdbBlack">Black</label>
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbBrown" value = "Brown">
                                            <label class = "form-check-label" for = "rdbBrown">Brown</label>
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbPurple" value = "Purple">
                                            <label class = "form-check-label" for = "rdbPurple">Purple</label>
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "chBelt" id = "chRdbBlue" value = "Blue">
                                            <label class = "form-check-label" for = "rdbBlue">Blue</label>
                                        </div>
                                        <div class = "form-check form-check-inline">
                                            <input class = "form-check-input" type = "radio" name = "belt" id = "rdbWhite" value = "White">
                                            <label class = "form-check-label" for = "rdbWhite">White</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third row-->
                                <div class = "form-group">
                                    <label for = "chDateOfGraduation">Date of your last graduation(Belt):</label>
                                    <?php if ($missing && in_array('chDateOfGraduation', $missing)) : ?>
                                            <span class = "warning">Please enter the date of your alst graduation</span>
                                    <?php endif; ?>
                                    <input type = "date" class = "form-control" name = "chDateOfGraduation" id = "chDateOfGraduation" placeholder = "yyyy-mm-dd">
                                </div>
                                <!-- Forth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chPhoneNumber">Phone Number:</label>
                                        <?php if ($missing && in_array('chPhoneNumber', $missing)) : ?>
                                            <span class = "warning">Please enter your phone number</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chPhoneNumber" id = "chPhoneNumber" placeholder = "Enter your phone number">
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chEmail">Email:</label>
                                        <?php if ($missing && in_array('chEmail', $missing)) : ?>
                                            <span class = "warning">Please enter your email address</span>
                                        <?php endif; ?>
                                        <input type = "email" class = "form-control" name = "chEmail" id = "chEmail" placeholder = "example@hotmail.com">
                                    </div>
                                </div>
                                <!-- Fifth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-4">
                                        <label for = "chAddress">Address:</label>
                                        <?php if ($missing && in_array('chAddress', $missing)) : ?>
                                            <span class = "warning">Please enter your address</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chAddress" id = "chAddress" placeholder = "1234 Example Street, Vancouver">
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "chHomeSchool">Home School:</label>
                                        <?php if ($missing && in_array('chHomeSchool', $missing)) : ?>
                                            <span class = "warning">Please enter your home school</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chHomeSchool" id = "chHomeSchool" placeholder = "Gracie Barra Vancouver">
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "chHomeSchoolAddress">Home School Address:</label>
                                        <?php if ($missing && in_array('chHomeSchoolAddress', $missing)) : ?>
                                            <span class = "warning">Please enter your home school's address</span>
                                        <?php endif; ?>
                                        <input type = "text" class = "form-control" name = "chHomeSchoolAddress" id = "chHomeSchoolAddress" placeholder = "987 GB Avenue, Vancouver">
                                    </div>
                                </div>
                                <!-- Sixth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chIcp6">ICP 6 is a requirement for applying to the GB Ambassadors Ambassadors Program. Did you complete the last ICP?:</label>
                                        <?php if ($missing && in_array('chIcp6', $missing)) : ?>
                                            <span class = "warning">Please specify if you comply with the ICP6 requirement</span>
                                        <?php endif; ?>
                                        <input type = "radio" name = "chIcp6" id = "chIcp6Yes" value = "yes" />Yes
                                        <input type = "radio" name = "chIcp6" id = "chIcp6No" value = "no" />No
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chIcpUpToDate">Is the Head Instructor and all the Staff members of your Home School aligned and updated with the latest ICP?</label>
                                        <?php if ($missing && in_array('chIcpUpToDate', $missing)) : ?>
                                            <span class = "warning">Please specify if your home school is aligned with the latest ICP</span>
                                        <?php endif; ?>
                                        <input type = "radio" name = "chIcpUpToDate" id = "chIcpUpToDateYes" value = "yes" />Yes
                                        <input type = "radio" name = "chIcpUpToDate" id = "chIcpUpToDateNo" value = "no" />No
                                    </div>
                                </div>
                                <hr class = "divider">
                                <!-- Seventh row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chUniform">Wearing the Full Gracie Barra Uniform and wearing the latest Gracie Barra Red Competition Shirt is mandatory to apply for the GB Pacific Northwest Ambassadors Program. Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('chUniform', $missing)) : ?>
                                            <span class = "warning">Please specify if you comply with the uniform requirements</span>
                                        <?php endif; ?>
                                        <input type = "radio" name = "chUniform" id = "chUniformYes" value = "yes" />Yes
                                        <input type = "radio" name = "chUniform" id = "chUniformNo" value = "no" />No
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "chAttendance">In order to be a GB Ambassadors Pacific Northwest, it is required your attendance in at least 80% of our 3 times per week competition training, hosted at GB Vancouver (Mon, Wed, Fri 12pm). Are you willing to make that commitment?</label>
                                        <?php if ($missing && in_array('chAttendance', $missing)) : ?>
                                            <span class = "warning">Please specify if you comply with the attendance requirements</span>
                                        <?php endif; ?>
                                        <input type = "radio" name = "chAttendance" id = "chAttendanceYes" value = "yes" />Yes
                                        <input type = "radio" name = "chAttendance" id = "chAttendanceNo" value = "no" />No
                                    </div>
                                </div>
                                <hr class = "divider">
                                <!-- Eigth row-->
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "chResults"> Our criteria to elect the athletes that will be granted support from the GB Ambassadors Pacific Northwest is based on the info collected on this form and the results in competitions throughout the Season. Are you willing to make the commitment to send the results you get in competitions to the GB Ambassadors Pacific Northwest Staff?</label>
                                        <?php if ($missing && in_array('chResults', $missing)) : ?>
                                            <span class = "warning">Please specify if you comply with the competition results requirements</span>
                                        <?php endif; ?>
                                        <input type = "radio" name = "chResults" id = "chResultsYes" value = "yes" />Yes
                                        <input type = "radio" name = "chResults" id = "chResultsNo" value = "no" />No
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "titles">Please list below your last titles since the IBJJF Worlds 2017:</label>
                                        <textarea id = "titles" rows = "4" cols = "50"></textarea>
                                    </div>
                                </div>
                                <div class = "form-row" id = "chSubmitbutton">
                                    <!-- <input type = "button" id = "chValidate" class = "btn btn-danger" value = "Validate" onclick = "chValidateForm();"/> -->
                                    <input type = "submit" name = "chSubmit" id = "chSubmit"  class = "btn btn-danger" value = "Submit"/>
                                </div>            
                            </form>
                    </div>
                </div>
        </div>      
       

    <!-- Footer at the end of the page-->
    <footer class = "footer mt-auto center">
        <img class = "gblogo" src = "images/gblogonoback.png">
        <p class = "text-center">GB Ambassadors Program Pacific Northwest</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin = "anonymous"></script>
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity = "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin = "anonymous"></script>  
  </body>
</html>