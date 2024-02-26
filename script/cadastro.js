window.onload = function () {
  var cpf = document.getElementById('cpf')
  const cadastro = document.getElementById('form')
  cadastro.addEventListener('submit', validaFormulario)
  cpf.addEventListener('keypress', validaCPF)
}

function validaFormulario(event) {
  var campos = document.querySelectorAll('.input')
  var mensagem = ''
  var submeter = true
  var submeter2 = true
  document.getElementById('mensagem').innerHTML = ''
  document.getElementById('mensagem2').innerHTML = ''

  campos.forEach(function (campo, indice) {
    if (campo.value == '') {
      campo.style.border = '2px solid red'
      mensagem += ' ' + campo.name
      submeter = false
      campo.addEventListener('change', function () {
        campo.style.border = '1px solid black'
      })
    } else {
      if (campo.classList.contains('invalid') == true) {
        campo.classList.remove('invalid')
      }
    }
  })

  let sn1 = document.getElementById('senha').value
  let sn2 = document.getElementById('sh2').value
  if (sn1 != sn2) {
    document.getElementById('mensagem2').innerHTML +=
      'Senha e Confirmação de Senha devem ser iguais'
    submeter2 = false
  } else if (
    (sn1.length > 9 || sn1.length < 5) &&
    (sn2.length > 9 || sn2.length < 5)
  ) {
    document.getElementById('mensagem2').innerHTML +=
      'senha deve conter no mínimo 5 e no máximo 9 caracteres'
    submeter2 = false
  }
  if (submeter == false) {
    document.getElementById('mensagem').innerHTML =
      'Os seguintes campos devem ser preenchidos' + mensagem
  }

  if (submeter != true || submeter2 != true) {
    event.preventDefault()
  }
  // if (submeter == true && submeter2 == true) {
  //   alert('bbbbbbbbbbbbbbbbb')
  //   document.getElementById('cadastro').submit()
  // }
}

function mascara(cpf) {
  var v = cpf.value
  if (v.length == 3 || v.length == 7) cpf.value += '.'
  if (v.length == 11) cpf.value += '-'
}

function validaCPF(event) {
  if (event.keyCode < 48 || event.keyCode > 57) {
    event.preventDefault()
  }
  if (this.value.length >= 14) {
    event.preventDefault()
  }
}
