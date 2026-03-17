function loadCar(){

    const xhr = new XMLHttpRequest();

    xhr.onload = function(){

        const xml = this.responseXML;

        const name =
        xml.getElementsByTagName("Name")[0].textContent;

        const price =
        xml.getElementsByTagName("RentPerDay")[0].textContent;

        document.getElementById("carName").innerHTML = name;
        document.getElementById("price").innerHTML = price + " MUR";
    }

    xhr.open("GET","car.xml");
    xhr.send();
}