import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;
import javax.swing.JFileChooser;
import javax.swing.filechooser.FileSystemView;

public class app {
    
    public static void menu(){
    	JFileChooser jfc = new JFileChooser(FileSystemView.getFileSystemView().getHomeDirectory());
		jfc.setDialogTitle("Escolha onde criar o Arquivo");
		jfc.setFileSelectionMode(JFileChooser.DIRECTORIES_ONLY);

		int returnValue = jfc.showSaveDialog(null);
		if (returnValue == JFileChooser.APPROVE_OPTION) {
			if (jfc.getSelectedFile().isDirectory()) {
				
				System.out.println(jfc.getSelectedFile());
			}
		}
		
    	
        System.out.println("\tManipule o Arquivo\n");
        System.out.println("1. Inclui Nome");
        System.out.println("2. Exibir os Nomes");
        System.out.println("3. Deletar Arquivo\n");
        System.out.println("0. Sair do Programa:\n");
        System.out.println("Escolha uma Opcao:");
        
        
    }

    public static void inclui(){
    	//Instancia o a criação do arquivo 
    	
    	File tarefa = new File("C:/Users/Magdiel.Lemos/Desktop/arquivo.txt");
    	     
        try {
    		if (!tarefa.exists()) {
    		//cria um arquivo (vazio)
    		tarefa.createNewFile();
    		}
    		
    		System.out.println("Inclua um nome no arquivo: ");
    		Scanner entrada = new Scanner (System.in);
    		String nome = entrada.next();
    		
    		//escreve no arquivo
    		FileWriter fw = new FileWriter(tarefa, true);
    		BufferedWriter bw = new BufferedWriter(fw);
    		bw.write(nome);
    		bw.newLine();
    		bw.close();
    		fw.close();
    		} catch (IOException ex) {
    		ex.printStackTrace();
    		}
    }
    
    public static void ler(){
    	String Ambiente = System.getenv("USERPROFILE");
    	File tarefa = new File(Ambiente+"/Desktop/arquivo.txt");
    	
		try {
		if (!tarefa.exists()) {
		//cria um arquivo (vazio)
		tarefa.createNewFile();
		}
		
		//faz a leitura do arquivo

		FileReader fr = new FileReader(tarefa);
		BufferedReader br = new BufferedReader(fr);
		System.out.println("O arquivo contem essas linhas: ");
		//enquanto houver mais linhas
		while (br.ready()) {
		//lê a proxima linha
		String linha = br.readLine();
		//faz algo com a linha
		System.out.println(linha);
		}
		br.close();
		fr.close();
		} catch (IOException ex) {
		ex.printStackTrace();
		}
   }
    
    public static void exclui(){
    	String Ambiente = System.getenv("USERPROFILE");
    	File tarefa = new File(Ambiente+"/Desktop/arquivo.txt");
    	boolean result = tarefa.delete();
        if (result) {
            System.out.println("Arquivo deletado com Sucesso.");
        }
        else {
            System.out.println("Falha ao deletar Arquivo.");
        }
    	
    }
    
    
    public static void main(String[] args) {
        int opcao;
        Scanner entrada = new Scanner(System.in);
                
        do{
            menu();
            opcao = entrada.nextInt();
            
            switch(opcao){
            case 1:
                inclui();
                break;
                
            case 2:
                ler();
                break;
                
            case 3:
                exclui();
                break;
            
                                    
            default:
                System.out.println("Tente uma das Opcoes");
                
            }
        } while(opcao != 0);
        
        System.out.println("Programa encerrado");
    }

	
}

