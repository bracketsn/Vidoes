<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "Kshitija97";
   $dbname = "servlet_login";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
   
   // Retrieve data from Query String
   $username = $_GET['username'];
   
   // Escape User Input to help prevent SQL Injection
   $username = mysql_real_escape_string($username);
  // $name = mysql_real_escape_string($name);
  // $password = mysql_real_escape_string($password);
   
   //build query
   $query = "SELECT * FROM emp WHERE name = '$username'";
   
  /* if(is_numeric($age))
   $query .= " AND age <= $age";
   
   if(is_numeric($wpm))
   $query .= " AND wpm <= $wpm";*/
   
   //Execute query
   $qry_result = mysql_query($query) or die(mysql_error());
   
   //Build Result String
   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>id</th>";
   $display_string .= "<th>username</th>";
   $display_string .= "<th>email</th>";
   $display_string .= "</tr>";
   
   // Insert a new row in the table for each person returned
   while($row = mysql_fetch_array($qry_result)) {
      $display_string .= "<tr>";
	  $display_string .= "<td>$row[id]</td>";
      $display_string .= "<td>$row[name]</td>";
      $display_string .= "<td>$row[email]</td>";
      $display_string .= "</tr>";
   }
   
   $display_string .= "</table>";
   echo $display_string;
?>