
// const xhttp = new XMLHttpRequest();
let btn_clicked = document.querySelectorAll(".btn-getId");
for (let i = 0; i < btn_clicked.length; i++) {
  btn_clicked[i].addEventListener("click", getIDd);
//   console.log(btn_clicked[i].parentElement.parentElement.childNodes[1].innerHTML);
}

function getFirstNumber(str) {
    const match = str.match(/[0-9]+/);
  
    return parseInt(match[0]);
  }


function getIDd(event) {
    var button = event.target;
    let id = button.parentElement.parentElement.childNodes[1].innerHTML;
    let type = button.parentElement.parentElement.childNodes[3].innerHTML;
    let capacite = button.parentElement.parentElement.childNodes[5].innerHTML;
    let prix = getFirstNumber(button.parentElement.parentElement.childNodes[7].innerHTML);
    console.log(prix);
    document.getElementById("typeroomupdate").value = type;
    document.getElementById("capaciteupdate").value = capacite;
    document.getElementById("priceupdate").value = prix;
    document.getElementById("ghaber").value = id;

    // xhttp.open("GET","roomA.php?IDROOM=" + x , true);
    // xhttp.send();
}
