window.onload = function () {
  const cpf = document.getElementById('cpf')
  const cadastro = document.getElementById('form')
  const campos = document.querySelectorAll('.input')
  const mensagem = document.getElementById('mensagem')
  const mensagem2 = document.getElementById('mensagem2')
  const senha = document.getElementById('senha')
  const sh2 = document.getElementById('sh2')

  cadastro.addEventListener('submit', function (event) {
    validaFormulario(event, campos, mensagem, mensagem2, senha, sh2)
  })
  cpf.addEventListener('keypress', validaCPF)
}

function validaFormulario(event, campos, mensagem, mensagem2, senha, sh2) {
  let msg = ''
  let submeter = true
  let submeter2 = true

  mensagem.innerHTML = ''
  mensagem2.innerHTML = ''

  campos.forEach(function (campo) {
    if (campo.value == '') {
      campo.style.border = '2px solid red'
      msg += ' ' + campo.name
      submeter = false
      campo.addEventListener('change', function () {
        campo.style.border = '1px solid black'
      })
    } else {
      if (campo.classList.contains('invalid')) {
        campo.classList.remove('invalid')
      }
    }
  })

  let sn1 = senha.value
  let sn2 = sh2.value
  if (sn1 != sn2) {
    mensagem2.innerHTML += 'Senha e Confirmação de Senha devem ser iguais'
    submeter2 = false
  } else if (
    (sn1.length > 9 || sn1.length < 5) &&
    (sn2.length > 9 || sn2.length < 5)
  ) {
    mensagem2.innerHTML +=
      'senha deve conter no mínimo 5 e no máximo 9 caracteres'
    submeter2 = false
  }
  if (!submeter) {
    mensagem.innerHTML = 'Os seguintes campos devem ser preenchidos' + msg
  }

  if (!submeter || !submeter2) {
    event.preventDefault()
  }
}

function mascara(cpf) {
  let v = cpf.value
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

