import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Test extends HttpServlet
{
	protected void doGet(HttpServletRequest req,HttpServletResponse res)throws ServletException,IOException
	{
		PrintWriter pw=res.getWriter();
		res.setContentType("text/html");
		ResultSet rs;
		pw.println("Initializing Connection ..");

		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/servlet_login","root","Kshitija97");
			Statement st=con.createStatement();
			pw.println("\nConnection established successfully ..!");
			
			String user=req.getParameter("user_name");
			String password=req.getParameter("pwd");
			String db_pswd=null;
			
			pw.println(user);
			pw.println(password);
			
			rs = st.executeQuery("select * from students where username='"+user+"'");
			if(rs==null)
			{
				pw.println("\nUnsuccessful");
			}
			else
			{
				while(rs.next())
				{
						db_pswd=rs.getString(2);
						
						if(db_pswd.equals(password))
						{
								pw.println("\nSuccessful");
						}
						else
						{
							pw.println("\nUnsuccessful");
						}
				}
			}
			con.close();
			st.close();
			rs.close();
			pw.close();
		}
		catch (Exception e)
		{
			pw.println("The error is:"+e.getMessage());
		}
	}
}