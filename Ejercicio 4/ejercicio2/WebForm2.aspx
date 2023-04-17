<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm2.aspx.cs" Inherits="ejercicio2.WebForm2" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <asp:Table ID="Table1" runat="server">
            <asp:TableRow>
                <asp:TableHeaderCell>
                    La Paz
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Cochabamba
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Oruro
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Chuquisaca
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Beni
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Tarija
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Potosi
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Santa_Cruz
                </asp:TableHeaderCell>
                <asp:TableHeaderCell>
                    Pando
                </asp:TableHeaderCell>
            </asp:TableRow>
            <asp:TableRow>
                <asp:TableCell>
                    <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label3" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label4" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label5" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label6" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label7" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>
                <asp:TableCell>
                    <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
                </asp:TableCell>

            </asp:TableRow>
        </asp:Table>
    
    </div>
        <asp:LinkButton ID="LinkButton1" runat="server" PostBackUrl="index.aspx">Cerrar Sesion</asp:LinkButton>
    </form>
</body>
</html>
