function validateForm() {
    var namePattern = /^[A-Z][a-z]{1,20}$/;
    /**
     * REMARK
     *  
     * I wasn't able to check on the date
     * The system uses calendar based on the locale of the device. My Google Chrome Browser is in Russian and the the input is automatically masked as DD.MM.YYYY.
     * Opera is in English, so the mask there is MM/DD/YYYY
     * 
     * I honestly have no idea how to check based on it :(
     * 
     * So for now I only added validation for the name, email and phone...
     * 
     * One more thing
     * I used one alert to show the error message and it's triggered after clicking the button. Another approach of how to do it is to use Popovers. In that case 
     * we can use different popovers for different inputs and dynamically check for pattern. I think that the second idea will be a little bit better, but I wasn't
     * able to implement it...
     * 
    */ 

    //assumed that no person older than 110 years (birth year 1909) and no person younger than 16 (birth year 2002) should be allowed on the adults form
    // THIS PATTERN CHECKS FOR dd.mm.yyyy 
    var birhDatePattern1 = /^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.(19[0-9][0-9]|200[0-2])\s*$/; 
    // THIS ONE CHECKS FOR mm/dd/yyy
    var birhDatePattern = /^(((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)(19[0-9][0-9]|200[0-2])$/;
    var phonePattern = /^(1 )*\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})|(\d){3}(-)*(\d){4}$/;
    var emailPattern = /^[_a-zA-Z\\-]+(\.[_a-zA-Z0-9\\-]+)*@[a-zA-Z0-9\\-]+(\.[a-zA-Z0-9\\-]+)*(\.[a-z]{2,6})$/;
    
    var firstName = document.getElementById("firstName").value;

    var lastName = document.getElementById("lastName").value;

    var DOB = document.getElementById("dateOfBirth").value;

    var phone = document.getElementById("phoneNumber").value;

    var email = document.getElementById("email").value;

    var alert = document.getElementById("alert");

    //to check for first name
    if (namePattern.test(firstName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid first name";
        closeAlert();
    }
    /*
    //to check for date pf birth
    if (birhDatePattern.test(DOB) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid date of birth";
        closeAlert();
    }
    */

    //to check for last name
    else if (namePattern.test(lastName) == false) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Please enter a valid last name";
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
    // if everything is correct
    else if (namePattern.test(firstName) == true && namePattern.test(lastName) == true && phonePattern.test(phone) == true && emailPattern.test(email) == true) {
        window.scrollTo(0, 0);
        alert.style.display = "block";
        errorMessage.innerHTML = "Thank you for submitting the form";
        closeAlert();
    }
}

function closeAlert() {
   $(function(){
        $("[data-hide]").on("click", function(){
            $(this).closest("." + $(this).attr("data-hide")).hide();
        });
    });
}

