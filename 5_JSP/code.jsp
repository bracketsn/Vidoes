<html>
	<head>
		<title> JSP </title>
	</head>
	<body>
		<%@page import = "java.sql.*" %>
		<%@page import = "java.io.*" %>

		<%
		try 
		{
			Class.forName("com.mysql.jdbc.Driver");
			Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/servlet_login", "root", "Kshitija97");
			Statement stmt = conn.createStatement();
			ResultSet rs;
			%>
			Connection Established
			<%
			String user = request.getParameter("username");
			String pass = request.getParameter("password");
			String db_pass = null;

			rs = stmt.executeQuery("select * from students where username = '"+user+"'");
			if (rs==null)
			{
				%> User not found <%
			}
			else 
			{
				while (rs.next())
				{
					db_pass = rs.getString(2);
					if (db_pass.equals(pass))
					{
						%> Successful <%
					}
					else
					{
						%> Password not matched <%
					}
				}
			}
			conn.close();
			stmt.close();
			rs.close();
		}
		catch (Exception e)
		{
			%> Error <%
		}
		%>
	</body>
</html>