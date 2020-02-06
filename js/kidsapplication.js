/* Global Variables */
var kidsForm; // Kids Form
var btnChchAddChampionship; // Button used to add new
var kidsTable; // TBODY used in the kids Form 


// List of Championships
var kidsMedalWeight = [
    "1st place",
    "2nd place",
    "3rd place"
];

var kidsChampionshipList = [
    "IBJJF Worlds",
    "IBJJF Pans",
    "IBJJF European",
    "IBJJF Brazilian Nationals",
    "IBJJF American Nationals",
    "IBJJF Pro",
    "IBJJF International Open",
    "UAE World Pro",
    "UAE Grand Slam",
    "GB Compnet",
    "IBJJF South American",
    "Copa Katana",
    "Revolution"    
];

var kidsYearList = [
    "2018",
    "2019", 
    "2020"    
];


// Variables used to assign dynamic ids to <select> controllers
var chChampionshipIndex = 0; 
var chChampionshipID = "chChampionship"; 
var chYearID = "chYear";


function chInitializeComponents()  {
    
    // Initializes the calculator form
    kidsForm = document.getElementById("kidsForm");       

    // Initializes the calculator tbody element
    kidsTable = document.getElementById("kidsTable");    
   
    // Adds the first (default) championship to the form
    chAddChampionship();
}

function chAddChampionship()  {
    
    // Creates the new <div> for the each new ROW of the form
    var formRow = document.createElement("tr");
    
    // Creates Championships <select>
    chCreateChampionshipSelect(formRow);

    // Creates dynamic Edition / Location controllers
    chCreateEditionField(formRow);

    // Creates Seasons <select>
    chCreateYearsSelect(formRow);
    
    // Creates radio buttons
    chCreateRadioButtons(formRow);

    // Creates add and remove buttons
    chCreateRemoveChampionshipButton(formRow);

    // Inserts new POPULATED <TR> element into tbody
    kidsTable.appendChild(formRow);

    // Increments unique ID identifier of the <SELECT>
    chChampionshipIndex++;     
    
    chCreateAddButton();
}


/**
 * Function which adds the "Add another championship" and "remove current championship" icons / buttons
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function chCreateRemoveChampionshipButton(currentFormRow)  {
    
    // Resets the formCol <DIV> to insert new columns
    formCol = document.createElement("td");

    // Inserts new <TD> into the current row
    currentFormRow.appendChild(formCol);    

    // Creates the MINUS icon to REMOVE current championship
    var icon = document.createElement("i");
    icon.className = "far fa-times-circle red";
    icon.name = "chDeleteChampionship" + chChampionshipIndex;

    formCol.appendChild(icon);    

    // Adds event handler to create more championships by clicking the icon
    icon.addEventListener("click", chDeleteCurrentChampionship, false);
}



/**
 * Function to create the Calculate button
 */
function chCreateAddButton()   {
   
    var button;

    // Verifies if button already exists, and if so, deletes its previous instance to re-create it at the end of the form
    button = document.getElementById("btnChchAddChampionship");
    
    if (button != null) {
        var parentTD = button.parentElement;
        var parentTR = parentTD.parentElement;
        button.parentElement.removeChild(button);     
        parentTD.parentElement.removeChild(parentTD);  
        parentTR.parentElement.removeChild(parentTR);
    }

    // Creates the new <TR> for the each new ROW of the form
    var formRow = document.createElement("tr");
    
    // Creates new <TD> element
    var formCol = document.createElement("td");
    formCol.colSpan = 7;    

    // Creates new <button>
    button = document.createElement("button");
    button.name = "btnChchAddChampionship";
    button.id = "btnChchAddChampionship";
    button.className = "margin-top margin-bottom btn btn-danger";
    button.type = "button";
    button.innerHTML = "Add another championship";
    

    // Adds button to <TD>
    formCol.appendChild(button);

    // INSERTS new column into the last ROW
    formRow.appendChild(formCol);    

    // INSERTS last ROW into the form
    kidsTable.appendChild(formRow);

    // Adds event handler  
    document.getElementById("btnChchAddChampionship").addEventListener("click", chAddChampionship,false);
}


/**
 * Function to dynamically create each row of radio buttons for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function chCreateRadioButtons(currentFormRow)   {
    
    for (var x = 0; x < kidsMedalWeight.length; x++)    {
       
        // Resets the formCol <DIV> to insert new columns
        formCol = document.createElement("td");
        
        // Adds the COLUMN to the current ROW
        currentFormRow.appendChild(formCol);

        // Creates each radioButton

        var radioButton = document.createElement("input");
        radioButton.type = "radio";
        radioButton.name = "chTitle" + chChampionshipIndex;
        radioButton.value = kidsMedalWeight[x];
        if (x == 0) {
            radioButton.checked = true;
        }

        // Adds current CHECKBOX to current COLUMN
        formCol.appendChild(radioButton);
    }
}


function chCreateEditionField(currentFormRow)   {
    // Creates the new <INPUT>
    var editionTextField = document.createElement("input");
    
    // Sets controller to a text field
    editionTextField.type = "text";
    // Assigns dynamic id to new text field
    editionTextField.id = "chEdition" + chChampionshipIndex;
    // Assigns dynamic id to new text field
    editionTextField.name = "chEdition" + chChampionshipIndex;
    // Assigns default placeholder
    editionTextField.placeholder = "Adults or Master";

    // Resets the formCol <DIV> to insert new Edition text field
    formCol = document.createElement("td");    
    // Adds SECOND COLUMN to ROW (Edition)
    currentFormRow.appendChild(formCol); 
    // Adds SEASON SELECT to the page
    formCol.appendChild(editionTextField);
}


function chUpdateEditionPlaceHolder()    {
    var selectedChampionship = this;

    // Gets the selected championship index
    var selectedChampionshipIndex = this.id.substring(this.id.length - 1,this.id.length);

        // Gets the edition text field in the same row as the championship selected
    var editionTextField = document.getElementById("chEdition"+selectedChampionshipIndex);

  

    editionTextField.disabled = false;
    editionTextField.value = "";
    
    // IBJJF Worlds - Adult or Master
    if (selectedChampionship.value =="IBJJF Worlds")  {
        editionTextField.placeholder = "Adults or Master";
    }
    // Compnet and Copa Katana - Edition names. e.g: Mitsuyo Maeda
    else if (selectedChampionship.value == "GB Compnet")    {
        editionTextField.placeholder = "E.g: Mistuyo Maeda I";
    }
    else if (selectedChampionship.value == "Copa Katana")   {
        editionTextField.placeholder = "E.g: Ohana III";
    } 
    // Gi or NoGi
    else if(selectedChampionship.value == "IBJJF Brazilian Nationals")  {
        editionTextField.placeholder = "Gi or NoGi";
    }
    // IBJJF International Open - Location (City) and Gi or NoGi
    else if(selectedChampionship.value == "IBJJF International Open")  {
        editionTextField.placeholder = "Los Angeles - Gi or NoGi";
    }
    // Pro - Location (City)
    else if(selectedChampionship.value == "IBJJF Pro") {
        editionTextField.placeholder = "Atlanta or another location";
    }
    else    {
        editionTextField.value = "Not required";
        editionTextField.disabled = true;
    }
}



/**
 * Function to dynamically create each SEASONS <select> for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function chCreateYearsSelect(currentFormRow)  {

    // Creates the new <SELECT> for SEASONS and assigns an ID to it
    var yearComboBox = document.createElement("select");
    // Assigns dynamic id to new combo box
    yearComboBox.id = chYearID + chChampionshipIndex;
    // Assigns dynamic name to new combo box
    yearComboBox.name = chYearID + chChampionshipIndex;

    // Resets the formCol <DIV> to insert SEASON SELECT
    formCol = document.createElement("td");
    
    // Adds SECOND COLUMN to ROW (SEASONS)
    currentFormRow.appendChild(formCol);

    // Adds SEASON SELECT to the page
    formCol.appendChild(yearComboBox);

    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < kidsYearList.length; i++)   {    
        // Creates new options
        var option = document.createElement("option");        
        option.text = kidsYearList[i];
        option.value = kidsYearList[i];
        yearComboBox.appendChild(option);
    } 
  
}

/**
 * Function to dynamically create each CHAMPIONSHIP <select> for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function chCreateChampionshipSelect(currentFormRow) {

    // Creates the new <div> for the each new COLUMN of the form
    var formCol = document.createElement("td");
    

    // Adds new ROW DIV to form
    kidsForm.appendChild(currentFormRow);

    // Creates the new <SELECT> for Championships and assigns an ID to it
    var championshipsComboBox = document.createElement("select");
    // Assigns dynamic id to new combo box
    championshipsComboBox.id = chChampionshipID + chChampionshipIndex;
    // Assigns dynamic name to new combo box
    championshipsComboBox.name = chChampionshipID + chChampionshipIndex;
    
    // Adds event to update "Edition" text placeholder / hint
    championshipsComboBox.addEventListener("change", chUpdateEditionPlaceHolder,false);

    // Adds FIRST COLUMN to ROW
    currentFormRow.appendChild(formCol);

    // Adds select to the page
    formCol.appendChild(championshipsComboBox);
    
    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < kidsChampionshipList.length; i++)   {
        // Creates new options
        var option = document.createElement("option");
        //option.value = kidsChampionshipList[i];
        option.value = kidsChampionshipList[i];
        option.text = kidsChampionshipList[i];
        championshipsComboBox.appendChild(option);
    }    

}

function chAssignSeasonValue(season)  {

    var value = 0;
    if (season == "I")    {
        value = "Season I";
    }
    else if (season == "II") {
        value = "Season II";
    }
    else if (season == "III")    {
        value = "Season III";
    }
    return value;
}

function chDeleteCurrentChampionship(removeChampionshipIcon)    {
    
    var deleteIcon = this;

    // Checks if there are AT LEAST two championships in the form before deleting the current one
    if (kidsTable.children.length > 2) {
        var parentTD = deleteIcon.parentElement;
        var parentTR = parentTD.parentElement;
        deleteIcon.parentElement.removeChild(deleteIcon);     
        parentTD.parentElement.removeChild(parentTD);  
        parentTR.parentElement.removeChild(parentTR);
    }
    else{
        alert("You cannot delete all championships from the calculator.");
    }    
}


window.addEventListener("load", chInitializeComponents, false);