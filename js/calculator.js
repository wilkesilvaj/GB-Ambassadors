/* Global Variables */
var calculatorForm; // Form used in the calculator
var btnAddChampionship; // Button used to add new 
var calculatorResult; // Heading tag used to display user's calculator's results
var calculatorBody;

// List of Championships
var medalWeight = [
    9,
    3,
    1
];

var championshipList = [
    "IBJJF Worlds 2018",
    "IBJJF Pans",
    "IBJJF European 2019",
    "IBJJF Brazilian Nationals",
    "IBJJF American Nationals",
    "IBJJF Pro",
    "IBJJF International Open",
    "UAE World Pro",
    "UAE Grand Slam",
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
    "I",
    "II",
    "III"
];

// Variables used to assign dynamic ids to <select> controllers
var championshipIndex = 0; 
var championshipID = "championships"; 
var seasonID = "season";


function initializeComponents()  {
    
    // Initializes the calculator form
    calculatorForm = document.getElementById("calculatorForm");       

    // Initializes the calculator result heading
    calculatorResult = document.getElementById("calculatorResult");

    // Initializes the calculator tbody element
    calculatorBody = document.getElementById("calculatorBody");

    // Adds event handler to the Calculate button
    document.getElementById("btnCalculate").addEventListener("click", calculatePoints,false);

    addChampionship();
}

function addChampionship()  {
    
    // Creates the new <div> for the each new ROW of the form
    var formRow = document.createElement("tr");
    
    // Creates Championships <select>
    createChampionshipSelect(formRow);

    // Creates Seasons <select>
    createSeasonsSelect(formRow);
    
    // Creates radio buttons
    createRadioButtons(formRow);

    // Creates add and remove buttons
    createRemoveChampionshipButton(formRow);

    // Inserts new POPULATED <TR> element into tbody
    calculatorBody.appendChild(formRow);

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
    formCol.colSpan = 6;    

    // Creates new <button>
    button = document.createElement("button");
    button.name = "btnAddChampionship";
    button.id = "btnAddChampionship";
    button.className = "margin-top margin-bottom";
    button.type = "button";
    button.innerHTML = "Add another championship";
    

    // Adds button to <TD>
    formCol.appendChild(button);

    // INSERTS new column into the last ROW
    formRow.appendChild(formCol);    

    // INSERTS last ROW into the form
    calculatorBody.appendChild(formRow);

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
        radioButton.name = "titles" + championshipIndex;
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
function createSeasonsSelect(currentFormRow)  {

    // Creates the new <SELECT> for SEASONS and assigns an ID to it
    var seasonComboBox = document.createElement("select");
    seasonComboBox.id = seasonID + championshipIndex;

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
        option.value = assignSeasonValue(seasonList[i]);
        seasonComboBox.appendChild(option);
    } 
  
}

/**
 * Function to dynamically create each CHAMPIONSHIP <select> for each new competition added to the calculator
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
function createChampionshipSelect(currentFormRow) {

    // Creates the new <div> for the each new COLUMN of the form
    var formCol = document.createElement("td");
    

    // Adds new ROW DIV to form
    calculatorForm.appendChild(currentFormRow);

    // Creates the new <SELECT> for Championships and assigns an ID to it
    var championshipsComboBox = document.createElement("select");
    championshipsComboBox.id = championshipID + championshipIndex;
    
    // Adds FIRST COLUMN to ROW
    currentFormRow.appendChild(formCol);

    // Adds select to the page
    formCol.appendChild(championshipsComboBox);
    
    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < championshipList.length; i++)   {
        // Creates new options
        var option = document.createElement("option");
        //option.value = championshipList[i];
        option.value = assignChampionshipValue(championshipList[i]);
        option.text = championshipList[i];
        championshipsComboBox.appendChild(option);
    }    

}

/** Creates checkboxes (first demo we had with the 6 checkboxes)
 * @param {*} currentFormRow - the <div> which represents the current row of the calculator form
 */
 function createCheckBoxes(currentFormRow)    {

    // Creates new checkboxes
    for (var x = 0; x < resultList.length; x++) {  
                
        // Resets the formCol <DIV> to insert new columns
        formCol = document.createElement("td");
        
        // Adds the COLUMN to the current ROW
        currentFormRow.appendChild(formCol);

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
 }

// NOT FULLY OPERATIONAL
function calculatePoints()  {
    
    // Initializes candidate's points
    var totalPoints = 0;

    // Gets all formRow <tr> elements in the calculatorForm
    var formRows = calculatorBody.children;

    //alert("Number of championships in TBODY:  " + (formRows.length-1));

    // Loops through each row in the form, excluding the first (header) and last (button)    
    for (var i=0; i<(formRows.length-1); i++)  {

        var rowMultiplier = 1;
        // Gets all <select> tags in each formRow
        var championshipSelect = formRows[i].querySelectorAll("select");       
    
        // Multiplies the value (weight) of the championship and season for the CURRENT for of the form
        for (var x = 0; x < championshipSelect.length; x++)  {
            rowMultiplier *= parseInt(championshipSelect[x].value);
        }        
       
        // Gets the value of the selected radio button
        var radioButton = formRows[i].querySelectorAll("input[type=radio]:checked");
        
        // Adds the ranking multiplied by the championship and season's values to the totalPoints
        totalPoints += rowMultiplier * radioButton[0].value;
    }  
    
    calculatorResult.innerHTML = "Based on the results above, your total points would be: " + totalPoints;
       
}


/** Function which assigns value to each <select> of championships
 * @param championship - the string with the championship name which is used to assign its weight / number of stars
 */
function assignChampionshipValue(championship)  {
    
    var value = 0;
    if (championship.includes("IBJJF Worlds"))  {
        value = 7;
    }
    else if (championship.includes("IBJJF Pans") || championship.includes("IBJJF European")
    || championship.includes("IBJJF European") || championship.includes("UAE World Pro")
    || championship.includes("IBJJF Brazilian"))  {
        value = 6;       
    }
    else if (championship.includes("UAE Grand Slam")|| championship.includes("GB COMPNET")
    || championship.includes("IBJJF American Nationals") || championship.includes("IBJJF Pro"))     {
        value = 5;
    }
    else if (championship.includes("IBJJF International Open"))  {
        value = 4;
    }
    return value;
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

function assignSeasonValue(season)  {

    var value = 0;
    if (season == "I")    {
        value = 2;
    }
    else if (season == "II") {
        value = 3;
    }
    else if (season == "III")    {
        value = 4;
    }
    return value;
}

function deleteCurrentChampionship(removeChampionshipIcon)    {
    
    var deleteIcon = this;

    // Checks if there are AT LEAST two championships in the form before deleting the current one
    if (calculatorBody.children.length > 2) {
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