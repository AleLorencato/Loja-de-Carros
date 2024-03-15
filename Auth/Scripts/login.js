window.onload = function () {
  const envio = document.getElementById('form')
  envio.addEventListener('submit', login)
}
function login(event) {
  var submeter = 0
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
