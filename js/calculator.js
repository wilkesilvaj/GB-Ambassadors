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

// Variables used to assign dynamic ids to <select> controllers
var countChampionships = 0; 
var selectID = "championships"; 

function getElements()  {
    calculatorForm = document.getElementById("calculatorForm");     
    alert(calculatorForm);
    addChampionship();

}

function addChampionship()  {
    
    var championshipsComboBox = document.createElement("select");
    championshipsComboBox.id = selectID + countChampionships;
    
    countChampionships++; // Increment unique ID identifier
    calculatorForm.appendChild(championshipsComboBox);
    

    for (var i = 0; i < championshipList.length; i++)   {
        var option = document.createElement("option");
        option.value = championshipList[i];
        option.text = championshipList[i];
        championshipsComboBox.appendChild(option);
    }    

    var icon = document.createElement("i");
    icon.className = "fas fa-plus-square";
    calculatorForm.appendChild(icon);
    icon.addEventListener("click", addChampionship, false);

    
}



window.addEventListener("load", getElements, false);