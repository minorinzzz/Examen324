<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="index.aspx.cs" Inherits="ejercicio2.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server" method="get" action="WebForm1.aspx">
    <div>
        Usuario
        <input id="Text1" type="text" name="Usuario"/> <br />
        Password
        <input id="Text2" type="text" name="Pass"/> <br />

        <input id="Submit1" type="submit" value="aceptar" name="ok" />
    </div>
    </form>
</body>
</html>
