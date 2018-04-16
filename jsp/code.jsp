<html>
	<head>
		<title>Login in form in JSP</title>
	</head>
	<body>
	<%@page import = "java.io.*" %>
	<%@page import = "java.sql.*" %>
	<h2>Login Form</h2>
	<%
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/servlet_login","root","Kshitija97");
			//Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/mydb","root","11rutuja11");
			Statement st=con.createStatement();
			ResultSet rs;
			%>
			Connection established!!
			<%
			String user=request.getParameter("user_name");
			String password=request.getParameter("pwd");
			String db_pswd=null;
			
			rs = st.executeQuery("select * from students where username='"+user+"'");
			if(rs==null)
			{
				%>
				Unsuccessful
				<%
			}
			else
			{
				while(rs.next())
				{
						db_pswd=rs.getString(2);
						
						if(db_pswd.equals(password))
						{
								%>
								Successful
								<%
						}
						else
						{
							%>
							Unsuccessful
							<%
						}
				}
			}
			con.close();
			st.close();
			rs.close();
		}
		catch (Exception e)
		{
	%>
			error
	<%	}
	%>
	</body>
</html>