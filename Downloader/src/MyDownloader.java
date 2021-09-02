import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.FileOutputStream;
import java.net.URL;
import java.net.URLConnection;

public class MyDownloader extends Thread{
    private String strURL ;
    private String destPath;

    public MyDownloader (String strURL , String destPath){
        this.strURL=strURL;
        this.destPath=destPath;
        start();
    }
    @Override
    public void run(){
       try{
          URL url=new URL(strURL);
          URLConnection cn=url.openConnection();
          try(BufferedInputStream in= new BufferedInputStream(cn.getInputStream())){
              try(BufferedOutputStream out=new BufferedOutputStream(new FileOutputStream(destPath))){
                  byte []buffer= new byte[1024*20];
                  int numReads=0;
                  while((numReads=in.read(buffer,0,buffer.length))>0){
                      out.write(buffer,0,numReads);
                  }
              }
          }
          System.out.println("downloading finish");
       }catch(Exception ex){
           ex.printStackTrace();
       }
    }
}
