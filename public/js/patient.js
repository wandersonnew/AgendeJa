function validateForm(event) {
    let name = document.forms["register"]["name"].value;
    let email = document.forms["register"]["email"].value;
    let tel = document.forms["register"]["tel"].value;
    let address = document.forms["register"]["address"].value;
    let password = document.forms["register"]["password"].value;
    if(name.length < 3) {
        event.preventDefault();
    }
    if(tel.length < 15)  {
        event.preventDefault();
    }
    document.getElementById("demo").innerHTML = "Campos inválido!";
}