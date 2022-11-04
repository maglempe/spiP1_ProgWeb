
//escreve(tit);

let tit = 45
function print(texto) {
    console.log(texto)
}
print(tit);

function pula() {
    return '<br>';
}

function fatorial(n) {
    if ( n == 0) {
        return 1;
    } else {
        return n * fatorial(n-1)
    }
}
for (let i =0;i <=20;i++) {
    print(`Fatorial de ${i} = ${fatorial(i)}${pula()}`)
    
}
