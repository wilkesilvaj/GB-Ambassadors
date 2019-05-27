function validateForm() {
    /**
     * REMARK
     *
     * I used one alert to show the error message and it's triggered after clicking the button. Another approach of how to do it is to use Popovers. In that case 
     * we can use different popovers for different inputs and dynamically check for pattern. I think that the second idea will be a little bit better, but I wasn't
     * able to implement it...
     * 
    */ 

    //assumed that no person older than 110 years (birth year 1909) and no person younger than 16 (birth year 2002) should be allowed on the adults form
    // THIS PATTERN CHECKS FOR dd.mm.yyyy 
    var birhDatePattern1 = /^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(19[0-9][0-9]|200[0-2])\s*$/; 
    // THIS ONE CHECKS FOR mm/dd/yyy
    var birhDatePattern2 = /^(((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(19[0-9][0-9]|200[0-2])$/;
    // THIS ONE CHECKS FOR yyyy-mm-dd
    var birhDatePattern3 = /^(19[0-9][0-9]|200[0-2])(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1])$/;
    // OVERALL BIRTH PATTERN
    var birhDatePattern = /^((19[0-9][0-9]|200[0-2])(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1]))|((((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(19[0-9][0-9]|200[0-2]))|(\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(19[0-9][0-9]|200[0-2])\s)$/;
    var namePattern = /^[A-z ]{1,20}$/;
    var gradPattern = /^((19[6-9][0-9]|20[0-9][0-9])(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1]))|((((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(19[0-9][0-9]|200[0-2]))|(\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(19[0-9][0-9]|200[0-2])\s)$/;
    var phonePattern = /^(1 )*\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})|(\d){3}(-)*(\d){4}$/;
    var emailPattern = /^[_a-zA-Z0-9\\-]+(\.[_a-zA-Z0-9\\-]+)*@[a-zA-Z0-9\\-]+(\.[a-zA-Z0-9\\-]+)*(\.[a-z]{2,6})$/;
    var addressPattern = /^[0-9A-z, -]{1,50}$/;
    var schoolPattern = /^[A-z ]{3,30}$/;
    
    var firstName = document.getElementById("firstName").value;

    var lastName = document.getElementById("lastName").value;

    var DOB = document.getElementById("dateOfBirth").value;

    var graduation = document.getElementById("dateOfGraduation").value;

    var phone = document.getElementById("phoneNumber").value;

    var email = document.getElementById("email").value;

    var address = document.getElementById("address").value;

    var school = document.getElementById("homeSchool").value;

    var schoolAdress = document.getElementById("homeSchoolAddress").value;

    var alert = document.getElementById("alert");

    //to check for first name
    if (namePattern.test(firstName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid first name";
        closeAlert();
    }
    //to check for last name
    else if (namePattern.test(lastName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid last name";
        closeAlert();
    }
    //to check for date of birth
    else if (birhDatePattern.test(DOB) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid date of birth";
        closeAlert();
    }
    // to check for the graduation (belt) 
    else if (gradPattern.test(graduation) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid graduation date";
        closeAlert();
    }
    //to check for phone number
    else if (phonePattern.test(phone) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid phone number";
        closeAlert();
    }
    //to check for email
    else if (emailPattern.test(email) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a vaild email address";
        closeAlert();
    }
    //to check for the address
    else if (addressPattern.test(address) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a vaild address";
        closeAlert();
    }
    //to check for school
    else if (schoolPattern.test(school) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a vaild name of your home school";
        closeAlert();
    }
    //to check for school address
    else if (addressPattern.test(schoolAdress) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a vaild school address";
        closeAlert();
    }
    // if any checkbox is not checked
    else if (isChecked() == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please make sure to answer all questions";
        closeAlert();
    }
    // if everything is correct
    else if (namePattern.test(firstName) == true && namePattern.test(lastName) == true && phonePattern.test(phone) == true && emailPattern.test(email) == true) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Thank you for submitting the form";
        closeAlert();
    }
}

// function to check if all the radiobuttons are checked
function isChecked() {
    if ($('input[name=rbdGender]:checked').length > 0 &&
    $('input[name=rdbBelt]:checked').length > 0 &&
    $('input[name=icp6]:checked').length > 0 &&
    $('input[name=icpUpToDate]:checked').length > 0 &&
    $('input[name=uniform]:checked').length > 0 &&
    $('input[name=attendance]:checked').length > 0 &&
    $('input[name=results]:checked').length > 0) {
        return true;
    }
    return false;
}

function closeAlert() {
   $(function(){
        $("[data-hide]").on("click", function(){
            $(this).closest("." + $(this).attr("data-hide")).hide();
        });
    });
}

function chValidateForm() {

    // OVERALL BIRTH PATTERN (from 2000)
    var birhDatePattern = /^((3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(20[0-1][0-9]))|((((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(20[0-1][0-9]))|(20[0-1][0-9])(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1])$/;
    var namePattern = /^[A-z ]{1,20}$/;
    var gradPattern = /^((19[6-9][0-9]|20[0-9][0-9])(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1]))|((((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(19[0-9][0-9]|200[0-2]))|(\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(19[0-9][0-9]|200[0-2])\s)$/;
    var phonePattern = /^(1 )*\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})|(\d){3}(-)*(\d){4}$/;
    var emailPattern = /^[_a-zA-Z0-9\\-]+(\.[_a-zA-Z0-9\\-]+)*@[a-zA-Z0-9\\-]+(\.[a-zA-Z0-9\\-]+)*(\.[a-z]{2,6})$/;
    var addressPattern = /^[0-9A-z, -]{1,50}$/;
    var schoolPattern = /^[A-z ]{3,30}$/;
    
    var firstName = document.getElementById("chFirstName").value;

    var lastName = document.getElementById("chLastName").value;

    var parentName = document.getElementById("chParentName").value;

    var DOB = document.getElementById("chDateOfBirth").value;

    var graduation = document.getElementById("chDateOfGraduation").value;

    var phone = document.getElementById("chPhoneNumber").value;

    var email = document.getElementById("chEmail").value;

    var address = document.getElementById("chAddress").value;

    var school = document.getElementById("chHomeSchool").value;

    var schoolAdress = document.getElementById("chHomeSchoolAddress").value;

    var alert = document.getElementById("chAlert");

    //to check for first name
    if (namePattern.test(firstName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a valid child's first name";
        closeAlert();
    }
    //to check for last name
    else if (namePattern.test(lastName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a valid child's last name";
        closeAlert();
    }
    // to check for parent's name
    else if (namePattern.test(parentName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a valid parent's name";
        closeAlert();
    }
    //to check for date of birth
    else if (birhDatePattern.test(DOB) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a valid date of birth";
        closeAlert();
    }
    // to check for the graduation (belt) 
    else if (gradPattern.test(graduation) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a valid graduation date";
        closeAlert();
    }
    //to check for phone number
    else if (phonePattern.test(phone) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a valid phone number";
        closeAlert();
    }
    //to check for email
    else if (emailPattern.test(email) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a vaild email address";
        closeAlert();
    }
    //to check for the address
    else if (addressPattern.test(address) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a vaild address";
        closeAlert();
    }
    //to check for school
    else if (schoolPattern.test(school) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a vaild name of your home school";
        closeAlert();
    }
    //to check for school address
    else if (addressPattern.test(schoolAdress) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please enter a vaild school address";
        closeAlert();
    }
    // if any checkbox is not checked
    else if (chIsChecked() == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Please make sure to answer all questions";
        closeAlert();
    }
    // if everything is correct
    else if (namePattern.test(firstName) == true && namePattern.test(lastName) == true && phonePattern.test(phone) == true && emailPattern.test(email) == true) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        chErrorMessage.innerHTML = "Thank you for submitting the form";
        closeAlert();
    }
}

// function to check if all the radiobuttons are checked
function chIsChecked() {
    if ($('input[name=chRbdGender]:checked').length > 0 &&
    $('input[name=chRbBelt]:checked').length > 0 &&
    $('input[name=chIcp6]:checked').length > 0 &&
    $('input[name=chIcpUpToDate]:checked').length > 0 &&
    $('input[name=chUniform]:checked').length > 0 &&
    $('input[name=chAttendance]:checked').length > 0 &&
    $('input[name=chResults]:checked').length > 0) {
        return true;
    }
    return false;
}

