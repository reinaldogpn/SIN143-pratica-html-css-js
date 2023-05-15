function validarFormulario() {

    let nome = document.getElementById("name").value;
    let telefone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    let cidade = document.getElementById("city").value;
    let estado = document.getElementById("state").value;
    let bairro = document.getElementById("district").value;
    let rua = document.getElementById("street").value;
    let numero = document.getElementById("number").value;

    // Verifica se algum campo está vazio
    if (nome === "" || telefone === "" || email === "" || cidade === "" || estado === "" || bairro === "" || rua === "" || numero === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
    }
  
    // Define as expressões regulares para validação
    let regexTelefone = /^[0-9]+$/;
    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let regexNumero = /^[0-9]+$/;
  
    // Valida o campo "telefone"
    if (!regexTelefone.test(telefone)) {
      alert("Telefone inválido. Por favor, digite apenas números.");
      return false;
    }
  
    // Valida o campo "email"
    if (!regexEmail.test(email)) {
      alert("Email inválido. Por favor, digite um email válido.");
      return false;
    }
  
    // Valida o campo "numero"
    if (!regexNumero.test(numero)) {
      alert("Número inválido. Por favor, digite apenas números.");
      return false;
    }
  
    return true;
}