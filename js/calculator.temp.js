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
var countChampionships = 0; 
var championshipID = "championships"; 
var seasonID = "season";


var emptyList = true;

var listItemIndx = 0;

function addElements(listItemIndx) {
    if (emptyList) {
        document.getElementById("calc").deleteRow(0);
    }
    var tblCalc = document.getElementById("calc");
    var calcRow = document.createElement("tr");
    calcRow.setAttribute("id", listItemIndx);

    var tdChampionship = document.createElement("td");
    var tdSeason = document.createElement("td");
    var tdRdb = document.createElement("td");

    // Creates the new <SELECT> for Championships and assigns an ID to it
    var championshipsComboBox = document.createElement("select");
    championshipsComboBox.id = championshipID + countChampionships;
    //championshipsComboBox.setAttribute("id", championshipID);
    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < championshipList.length; i++)   {
        // Creates new options
        var option = document.createElement("option");
        option.value = assignChampionshipValue(championshipList[i]);
        option.text = championshipList[i];
        championshipsComboBox.appendChild(option);
    }  

    var txt1 = document.createTextNode("Just a Test");

    
    // Creates the new <SELECT> for SEASONS and assigns an ID to it
    var seasonComboBox = document.createElement("select");
    seasonComboBox.id = seasonID + countChampionships;
    // Populates the new <SELECT> with the championships from the array
    for (var i = 0; i < seasonList.length; i++)   {    
        // Creates new options
        var option = document.createElement("option");        
        option.text = "Season " + seasonList[i];
        option.value = assignSeasonValue(seasonList[i]);
        seasonComboBox.appendChild(option);
    }
    

    tdChampionship.appendChild(championshipsComboBox);
    tdSeason.appendChild(seasonComboBox);

    calcRow.appendChild(tdChampionship);
    calcRow.appendChild(tdSeason);

    tblCalc.appendChild(calcRow);

    listItemIndx++;
    emptyList = false;    
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

