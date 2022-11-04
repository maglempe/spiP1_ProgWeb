let form = document.querySelector('form');
let ul = document.querySelector('ul');
form.onsubmit = function(evento){
    evento.preventDefault();
    let input = form.querySelector('input');
    let valor = input.value;
    
    if (valor == "") return;
    let li  = document.createElement('li');
    li.textContent = valor;
    let botao = document.createElement('button');
    botao.textContent = 'X';
    botao.setAttribute('class', 'botao');

    li.appendChild(botao);
    ul.appendChild(li);
    input.value = "";
}

ul.onclick = evento => {
    if (evento.target.classList.contains('botao')) {
        if (confirm('Deseja Remover o Item?')) {
            evento.target.parentElement.remove()    ;
        }
    
    }
}

form.addEventListener('dblclick', (evento) => {
    console.log("Clicou duas Vezes");
});
