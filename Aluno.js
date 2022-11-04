class Aluno{

    constructor(nome, matricula, n1, n2, n3){
        this.nome = nome;
        this.matricula = matricula;
        this.nota1 = n1;
        this.nota2 = n2;
        this.nota3 = n3;
    }
    exibeinfo(){
        return ` Aluno: ${this.nome} - mat: ${this.matricula} Notas: N1 ${this.nota1} N2 ${this.nota2} N3 ${this.nota3} Media:${this.cauculamedia}`
    }
}

const a1 = new Aluno('Magdiel', 4321, 10, 10, 12);
console.log(a1);