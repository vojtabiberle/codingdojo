import java.io.Reader;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.FileReader;
import java.io.FileInputStream;
import java.io.IOException;

public class Minefield
{
	public static void main (String args[]) 
	{
		BufferedReader reader = null;
 
		try {
 
			int readed;
 
			reader = new BufferedReader(new FileReader("../data1.txt"));

			String firstLine = reader.readLine();

			System.out.println(firstLine);
 
			while ( (readed = reader.read()) != -1) {
				char character = (char) readed;
				System.out.print(character);
			}
 
		} catch (IOException e) {
			e.printStackTrace();
		} finally {
			try {
				if (reader != null)reader.close();
			} catch (IOException ex) {
				ex.printStackTrace();
			}
		}
	}
}