let botao1 = document.querySelector('#btn1');


botao1.onclick = function(){
//pegando as variaveis
let a1 = parseFloat(document.querySelector('#a1').value);
let razao = parseFloat(document.querySelector('#razao').value);
let termos = parseFloat(document.querySelector('#termos').value);
let resultado = document.querySelector('#resultado');



//Cria array com PA

let valores = [];
valores.push(a1);
let mensagem = `${a1}`;
let soma = a1;
for (let i = 1; i < termos; i++){
    valores[i] = valores[i -1]+ razao;
    mensagem += `&nbsp;&nbsp;&nbsp;&nbsp; ${valores[i]}`;
    soma += valores[i];
}

let somaPA = soma;
resultado.innerHTML = `<br>
<p>A P.A é: </p>
<p>${mensagem}</p> <hr>
<p>A soma dos elementos da PA é: ${somaPA}</p> `



}
let botao2 = document.querySelector('#btn2');
botao2.onclick = function(){
    //pegando as variaveis
    let a1 = parseFloat(document.querySelector('#a1').value = "");
    let razao = parseFloat(document.querySelector('#razao').value = "");
    let termos = parseFloat(document.querySelector('#termos').value = "");
    document.querySelector('#resultado').innerHTML = "";
}