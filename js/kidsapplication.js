/* Global Variables */
var kidsForm; // Kids Form
var btnChchAddChampionship; // Button used to add new
var kidsTable; // TBODY used in the kids Form 


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


var seasonList = [
    "I",
    "II",
    "III"
];

// Variables used to assign dynamic ids to <select> controllers
var chChampionshipIndex = 0; 
var chChampionshipID = "chChampionship"; 
var chyearID = "chSeason";


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

    // Creates Seasons <select>
    chCreateSeasonsSelect(formRow);
    
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
    formCol.colSpan = 6;    

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
    
    for (var x = 0; x < medalWeight.length; x++)    {
       
        // Resets the formCol <DIV> to insert new columns
        formCol = document.createElement("td");
        
        // Adds the COLUMN to the current ROW
        currentFormRow.appendChild(formCol);

        // Creates each radioButton

        var radioButton = document.createElement("input");
        radioButton.type = "radio";
        radioButton.name = "chTitle" + chChampionshipIndex;
        radioButton.value = medalWeight[x];
        if (x == 0) {
            radioButton.checked = true;
        }

        // Adds current CHECKBOX to current COLUMN
        formCol.appendChild(radioButton);
    }
}

/**
 * Function to dynamically create each SEASONS <select> for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function chCreateSeasonsSelect(currentFormRow)  {

    // Creates the new <SELECT> for SEASONS and assigns an ID to it
    var seasonComboBox = document.createElement("select");
    // Assigns dynamic id to new combo box
    seasonComboBox.id = chyearID + chChampionshipIndex;
    // Assigns dynamic name to new combo box
    seasonComboBox.name = chyearID + chChampionshipIndex;

    // Resets the formCol <DIV> to insert SEASON SELECT
    formCol = document.createElement("td");
    
    // Adds SECOND COLUMN to ROW (SEASONS)
    currentFormRow.appendChild(formCol);

    // Adds SEASON SELECT to the page
    formCol.appendChild(seasonComboBox);

    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < seasonList.length; i++)   {    
        // Creates new options
        var option = document.createElement("option");        
        option.text = "Season " + seasonList[i];
        option.value = chAssignSeasonValue(seasonList[i]);
        seasonComboBox.appendChild(option);
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