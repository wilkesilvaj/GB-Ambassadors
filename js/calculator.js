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

// Variables used to assign dynamic ids to <select> controllers
var countChampionships = 0; 
var selectID = "championships"; 

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
    championshipsComboBox.id = selectID + countChampionships;
    
    // Increment unique ID identifier of the <SELECT>
    countChampionships++; 

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

    // Creates new checkboxes
    for (var x = 0; x < resultList.length; x++) {  
        
        // Resets the formCol <DIV> as to insert new columns
        formCol = document.createElement("div");
        formCol.className = "form-group col-";  

        // Adds the COLUMN to the current ROW
        formRow.appendChild(formCol);

        // Creates each checkbox
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "titles";
        checkbox.value = resultList[x];       
        
        // Allows to display the value of the selected CHECKBOX by clicking it - CHECKBOXES ARE BUGGED
        // checkbox.addEventListener("click", function (){alert(checkbox.value);},false);
        
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

    
}



window.addEventListener("load", getElements, false);