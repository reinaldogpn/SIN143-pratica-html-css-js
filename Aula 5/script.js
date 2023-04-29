function addNumber() {
    let numbersDiv = document.getElementById("numbers");
    let n = document.createElement("INPUT");
    n.setAttribute("type", "number");
    n.setAttribute("name", "numbers[]");
    numbersDiv.appendChild(n);
    
    // verifica se há pelo menos um número antes de habilitar o botão
    let numInputs = document.querySelectorAll('input[type="number"]').length;
    if (numInputs > 0) {
        document.querySelector('input[type="submit"]').removeAttribute("disabled");
    }
}