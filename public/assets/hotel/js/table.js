

var tables = document.querySelectorAll('.ab');

function show(n) {
    tables.forEach(table => {
        
        var rows = table.querySelectorAll('tr');
        console.log(rows.length);
        var start = (n - 1) * 10;
        var end = start + 10;
        if(start < rows.length ){

            if(end <= rows.length){
    
                for (let i = start; i >= 0; i--) {
                    rows[i].style.display = "none";
                }
                for (let i = end; i < rows.length; i++) {
                    rows[i].style.display = "none";
                }
                for (let i = start; i < end; i++) {
                    console.log(i);
                    // rows[i].style.display = "flex";
                    rows[i].removeAttribute("style");
                }
            }else{
                let x = end - rows.length;
                end = end - x;
                for (let i = start; i >= 0; i--) {
                    rows[i].style.display = "none";
                }
                for (let i = end; i < rows.length; i++) {
                    rows[i].style.display = "none";
                }
                for (let i = start; i < end; i++) {
                    console.log(i);
                    // rows[i].style.display = "flex";
                    rows[i].removeAttribute("style");
                }
            }
        }
    });
}
document.addEventListener('DOMContentLoaded', show(1));
numm = document.getElementsByClassName('pageNumber');
for (var i = 0; i < numm.length; i++) {
    numm[i].addEventListener("click", page);
}

function page(event) {
    var buttonClicked = event.target;
    var x = buttonClicked.innerHTML;
    console.log(x);
    show(x);
}


document.querySelector(".pagination a").addEventListener("click", function () {

    var page = document.querySelector(this).text();

    show(page);
});