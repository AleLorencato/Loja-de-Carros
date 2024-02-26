window.onload = function () {
  const envio = document.getElementById('form')
  envio.addEventListener('submit', login)
}
var submeter = 0
function login(event) {
  var campos = document.querySelectorAll('.input')

  campos.forEach(function (campo, indice) {
    if (campo.value == '') {
      text.innerHTML = 'Campos Obrigatórios'
      submeter = 1
    }
  })
  if (submeter == 1) {
    event.preventDefault()
  }
}
