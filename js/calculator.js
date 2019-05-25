/* Global Variables */
var calculatorForm; // Form used in the calculator
var btnAddChampionship; // Button used to add new 
// List of Championships
var championshipList = [
    "IBBJF Worlds 2018",
    "IBBJF Pans",
    "IBJJF European 2019",
    "IBJJF Brazilian Nationals",
    "IBJJF American Nationals",
    "IBJJF Pro",
    "IBJJF International Open",
    "UAE World Pro",
    "UAE Grand slam",
    "GB COMPNET"    
];

var resultList  =   [
    "Weight 1st place",
    "Weight 2nd place",
    "Weight 3rd place",
    "Open Class 1st place",
    "Open Class 2nd place",
    "Open Class 3rd place"
];

var seasonList = [
    "Season I",
    "Season II",
    "Season III"
];

// Variables used to assign dynamic ids to <select> controllers
var countChampionships = 0; 
var championshipID = "championships"; 
var seasonID = "season";


function getElements()  {
    calculatorForm = document.getElementById("calculatorForm");       
    addChampionship();
}

function addChampionship()  {
    
    // Creates the new <div> for the each new ROW of the form
    var formRow = document.createElement("div");
    formRow.className = "form-row";

    // Creates the new <div> for the each new COLUMN of the form
    var formCol = document.createElement("div");
    formCol.className = "form-group col-";

    // Adds new ROW DIV to form
    calculatorForm.appendChild(formRow);

    // Creates the new <SELECT> for Championships and assigns an ID to it
    var championshipsComboBox = document.createElement("select");
    championshipsComboBox.id = championshipID + countChampionships;
    
    // Creates the new <SELECT> for SEASONS and assigns an ID to it
    var seasonComboBox = document.createElement("select");
    seasonComboBox.id = seasonID + countChampionships;

    // Adds FIRST COLUMN to ROW
    formRow.appendChild(formCol);

    // Adds select to the page
    formCol.appendChild(championshipsComboBox);
    
    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < championshipList.length; i++)   {
        // Creates new options
        var option = document.createElement("option");
        option.value = championshipList[i];
        option.text = championshipList[i];
        championshipsComboBox.appendChild(option);
    }    

    // Resets the formCol <DIV> to insert SEASON SELECT
    formCol = document.createElement("div");
    formCol.className = "form-group col-"; 

    // Adds SECOND COLUMN to ROW (SEASONS)
    formRow.appendChild(formCol);

    // Adds SEASON SELECT to the page
    formCol.appendChild(seasonComboBox);

    // Populates the new <SELECT> with the championships from the array
    for (var i = 1; i <= seasonList.length; i++)   {    
        // Creates new options
        var option = document.createElement("option");
        option.value = seasonList[i];
        option.text = seasonList[i-1];
        seasonComboBox.appendChild(option);
    } 

    // Creates new checkboxes
    for (var x = 0; x < resultList.length; x++) {  
                
        // Resets the formCol <DIV> to insert new columns
        formCol = document.createElement("div");
        formCol.className = "form-group col-";  

        // Adds the COLUMN to the current ROW
        formRow.appendChild(formCol);

        // Creates each checkbox
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "titles";
        checkbox.value = assignCheckboxValue(resultList[x]);       
        
        // Allows to display the value of the selected CHECKBOX by clicking it - CHECKBOXES ARE BUGGED
        //checkbox.addEventListener("click", function (){alert(checkbox.value);},false);
        
        // Adds current CHECKBOX to current COLUMN
        formCol.appendChild(checkbox);
    }

    // Creates the new icon to add new championships
    var icon = document.createElement("i");
    icon.className = "fas fa-plus-square";
    
    // Adds the icon to the form
    formRow.appendChild(formCol);
    formCol.appendChild(icon);

    // Adds event handler to create more championships by clicking the icon
    icon.addEventListener("click", addChampionship, false);

    // Increments unique ID identifier of the <SELECT>
    countChampionships++;     

    addCalculateButton();
}

function addCalculateButton()   {
   
    var button;

    // Verifies if button already exists, and if so, deletes its previous instance to re-create it at the end of the form
    button = document.getElementById("btnCalculate");
    
    if (button != null) {
        button.parentElement.removeChild(button);
    }

    // Creates the new <div> for the each new ROW of the form
    var formRow = document.createElement("div");
    formRow.className = "form-row";

    calculatorForm.appendChild(formRow);

    // Creates new <button>
    button = document.createElement("button");
    button.name = "btnCalculate";
    button.id = "btnCalculate";
    button.innerHTML = "Calculate";

    // Adds button to form
    formRow.appendChild(button);

    // Adds event handler
    document.getElementById("btnCalculate").addEventListener("click", calculatePoints,false);
}

/**
 * TO BE FURTHER IMPLEMENTED
 */
function calculatePoints()  {
    
}

function assignCheckboxValue(ranking)  {
    var value;
    if (ranking.includes("1st"))    {        
        value = 9;  
    }
    else if (ranking.includes("2nd"))    {
        value = 3;
    }
    else    {
        value = 1;
    }
    return value;
}

window.addEventListener("load", getElements, false);