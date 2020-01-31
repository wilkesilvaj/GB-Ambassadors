/* Global Variables */
var adultsForm; // Adults Form
var btnAddChampionship; // Button used to add new
var adultsTable; // TBODY used in the Adults Form 


// List of Championships
var medalWeight = [
    "1st place",
    "2nd place",
    "3rd place"
];

var championshipList = [
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
    "Copa Katana"    
];


var yearList = [
    "2018",
    "2019", 
    "2020"    
];

// Variables used to assign dynamic ids to <select> controllers
var championshipIndex = 0; 
var championshipID = "championship"; 
var yearID = "year";


function initializeComponents()  {
    
    // Initializes the application form for adults
    adultsForm = document.getElementById("adultsForm");       

    // Initializes the tbody element within the adults application form
    adultsTable = document.getElementById("adultsTable");
   
    addChampionship();
}

function addChampionship()  {
    
    // Creates the new <div> for the each new ROW of the form
    var formRow = document.createElement("tr");
    
    // Creates Championships <select>
    createChampionshipSelect(formRow);

    // Creates dynamic Edition / Location controllers
    createEditionField(formRow);

    // Creates Year <select>
    createYearSelect(formRow);
    
    // Creates radio buttons
    createRadioButtons(formRow);

    // Creates add and remove buttons
    createRemoveChampionshipButton(formRow);

    // Inserts new POPULATED <TR> element into tbody
    adultsTable.appendChild(formRow);

    // Increments unique ID identifier of the <SELECT>
    championshipIndex++;     
    
    createAddButton();
}

/**
 * Function which adds the "Add another championship" and "remove current championship" icons / buttons
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function createRemoveChampionshipButton(currentFormRow)  {
    
    // Resets the formCol <DIV> to insert new columns
    formCol = document.createElement("td");

    // Inserts new <TD> into the current row
    currentFormRow.appendChild(formCol);    

    // Creates the MINUS icon to REMOVE current championship
    var icon = document.createElement("i");
    icon.className = "far fa-times-circle red";
    icon.name = "deleteChampionship" + championshipIndex;

    formCol.appendChild(icon);    

    // Adds event handler to create more championships by clicking the icon
    icon.addEventListener("click", deleteCurrentChampionship, false);
}

/**
 * Function to create the Calculate button
 */
function createAddButton()   {
   
    var button;

    // Verifies if button already exists, and if so, deletes its previous instance to re-create it at the end of the form
    button = document.getElementById("btnAddChampionship");
    
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
    button.name = "btnAddChampionship";
    button.id = "btnAddChampionship";
    button.className = "margin-top margin-bottom btn btn-danger";
    button.type = "button";
    button.innerHTML = "Add another championship";
    

    // Adds button to <TD>
    formCol.appendChild(button);

    // INSERTS new column into the last ROW
    formRow.appendChild(formCol);    

    // INSERTS last ROW into the form
    adultsTable.appendChild(formRow);

    // Adds event handler  
    document.getElementById("btnAddChampionship").addEventListener("click", addChampionship,false);
}


/**
 * Function to dynamically create each row of radio buttons for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function createRadioButtons(currentFormRow)   {
    
    for (var x = 0; x < medalWeight.length; x++)    {
       
        // Resets the formCol <DIV> to insert new columns
        formCol = document.createElement("td");
        
        // Adds the COLUMN to the current ROW
        currentFormRow.appendChild(formCol);

        // Creates each radioButton

        var radioButton = document.createElement("input");
        radioButton.type = "radio";
        radioButton.name = "title" + championshipIndex;
        radioButton.value = medalWeight[x];
        if (x == 0) {
            radioButton.checked = true;
            radioButton.id = "gold" +championshipIndex;
        }
        else if (x == 1)    {
            radioButton.id = "silver" +championshipIndex;
        }
        else    {
            radioButton.id = "bronze" +championshipIndex;
        }

        // Adds current CHECKBOX to current COLUMN
        formCol.appendChild(radioButton);
    }
}

/**
 * Function to dynamically create each SEASONS <select> for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function createYearSelect(currentFormRow)  {

    // Creates the new <SELECT> for SEASONS and assigns an ID to it
    var yearComboBox = document.createElement("select");
    // Assigns dynamic id to new combo box
    yearComboBox.id = yearID + championshipIndex;
    // Assigns dynamic name to new combo box
    yearComboBox.name = yearID + championshipIndex;

    // Resets the formCol <DIV> to insert SEASON SELECT
    formCol = document.createElement("td");
    
    // Adds SECOND COLUMN to ROW (SEASONS)
    currentFormRow.appendChild(formCol);

    // Adds SEASON SELECT to the page
    formCol.appendChild(yearComboBox);

    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < yearList.length; i++)   {    
        // Creates new options
        
        var option = document.createElement("option");        
        option.text = yearList[i];
        option.value = yearList[i];
        yearComboBox.appendChild(option);
    }   
}

function updateEditionPlaceHolder()    {
    var selectedChampionship = this;

    // Gets the selected championship index
    var selectedChampionshipIndex = this.id.substring(this.id.length - 1,this.id.length);

    // Gets the edition text field in the same row as the championship selected
    var editionTextField = document.getElementById("edition"+selectedChampionshipIndex);

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

function createEditionField(currentFormRow)   {
    // Creates the new <INPUT>
    var editionTextField = document.createElement("input");
    
    // Sets controller to a text field
    editionTextField.type = "text";
    // Assigns dynamic id to new text field
    editionTextField.id = "edition" + championshipIndex;
    // Assigns dynamic id to new text field
    editionTextField.name = "edition" + championshipIndex;
    // Assigns default placeholder
    editionTextField.placeholder = "Adults or Master";

    // Resets the formCol <DIV> to insert new Edition text field
    formCol = document.createElement("td");    
    // Adds SECOND COLUMN to ROW (Edition)
    currentFormRow.appendChild(formCol); 
    // Adds SEASON SELECT to the page
    formCol.appendChild(editionTextField);
}

/**
 * Function to dynamically create each CHAMPIONSHIP <select> for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function createChampionshipSelect(currentFormRow) {

    // Creates the new <div> for the each new COLUMN of the form
    var formCol = document.createElement("td");
    

    // Adds new ROW DIV to form
    adultsForm.appendChild(currentFormRow);

    // Creates the new <SELECT> for Championships and assigns an ID to it
    var championshipsComboBox = document.createElement("select");
    // Assigns dynamic id to new combo box
    championshipsComboBox.id = championshipID + championshipIndex;
    // Assigns dynamic name to new combo box
    championshipsComboBox.name = championshipID + championshipIndex;
    
    // Adds event to update "Edition" text placeholder / hint
    championshipsComboBox.addEventListener("change", updateEditionPlaceHolder,false);

    // Adds FIRST COLUMN to ROW
    currentFormRow.appendChild(formCol);

    // Adds select to the page
    formCol.appendChild(championshipsComboBox);
    
    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < championshipList.length; i++)   {
        // Creates new options
        var option = document.createElement("option");
        //option.value = championshipList[i];
        option.value = championshipList[i];
        option.text = championshipList[i];
        championshipsComboBox.appendChild(option);
    }    

}

function deleteCurrentChampionship(removeChampionshipIcon)    {
    
    var deleteIcon = this;

    // Checks if there are AT LEAST two championships in the form before deleting the current one
    if (adultsTable.children.length > 2) {
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


window.addEventListener("load", initializeComponents, false);