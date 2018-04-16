import java.io.*;
import java.sql.*;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Kshitija extends HttpServlet
{
	protected void doGet (HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException
	{
		PrintWriter pw = res.getWriter();
		res.setContentType("text/html");
		pw.println("\n Initialing connection \n");
		ResultSet rs;

		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/servlet_login", "root", "Kshitija97");
			Statement stmt = conn.createStatement();
			pw.println("\n Connection succesfully established \n");

			String user = req.getParameter("user");
			String pwd = req.getParameter("password");
			String queried_password = null;

			rs = stmt.executeQuery("select * from students where username = '"+user+"'");
			if (rs == null)
				pw.println("\nUsername does not exist");
			else
			{
				while (rs.next())
				{
					queried_password = rs.getString(2);
					if (queried_password.equals(pwd))
						pw.println("\nsuccesfully logged in");
					else
						pw.println("\npassword doesnt match");
				}
			}
			conn.close();
			pw.close();
			stmt.close();
			rs.close();
		}
		catch (Exception e)
		{
			pw.println("The error is"+e.getMessage());
		}
	}
}