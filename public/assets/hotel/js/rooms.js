document.getElementsByClassName("suitessss")
document.getElementsByClassName("roomms")


function suiteshow(){
    document.getElementsByClassName("suitessss")[0].style = "display: inline-block";
    document.getElementsByClassName("suitessss")[1].style = "display: inline-block";
    document.getElementsByClassName("roomms")[0].style = "display: none";
    document.getElementsByClassName("roomms")[1].style = "display: none";
}

function roomshow(){
    document.getElementsByClassName("suitessss")[0].style = "display: none";
    document.getElementsByClassName("suitessss")[1].style = "display: none";
    document.getElementsByClassName("roomms")[0].style = "display: inline-block";
    document.getElementsByClassName("roomms")[1].style = "display: inline-block";
}
