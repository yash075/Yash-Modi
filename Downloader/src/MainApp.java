import java.util.Scanner;
public class MainApp {
    public static void main(String []args){
        Scanner sc=new Scanner(System.in);
        System.out.println("Enter url:-");
        String strurl=sc.nextLine();
        System.out.println("Enter url:-");
        String strdest=sc.nextLine();
        new MyDownloader(strurl,strdest);
    }//("https://www.akc.org/dog-breeds/golden-retriever/"
      //          ,"C:\\personal\\try\\try1.txt")
}
