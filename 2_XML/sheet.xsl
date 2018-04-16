<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>
			<head>
				<title> Info People </title>
			</head>
			<body>
				<table>
					<caption> INFORMATION </caption>
					<tr>
						<th> <b> Name </b> </th>
						<th> <b> Phone </b> </th>
						<th> <b> Age </b> </th>
					</tr>
					<xsl:for-each select="Information/Person">
						<tr>
							<td> <b> <xsl:value-of select="Name"/> </b></td>
							<td> <xsl:value-of select="Phone"/> </td>
							<td> <i> <xsl:value-of select="Age"/> </i></td>
						</tr>
					</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
