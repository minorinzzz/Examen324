using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using MySql.Data;
using MySql.Data.MySqlClient;
using System.Web.UI.HtmlControls;


namespace ejercicio2
{
    public partial class WebForm11 : System.Web.UI.Page
    {

        protected void Page_Load(object sender, EventArgs e)
        {
            string user = Request.QueryString["Usuario"];
            string passw = Request.QueryString["Pass"];
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());
            MySqlCommand cmd = conn.CreateCommand();
            cmd.CommandText = "SELECT usuario,password,ROL FROM usuario";
            conn.Open();
            MySqlDataReader reader = cmd.ExecuteReader();
            bool existo=false;
            string mirol="ESTUDIANTE";
            while (reader.Read())
            {
                string usuario = reader.GetString(0); //obtiene el valor del atributo CI como un entero
                string password = reader.GetString(1); //obtiene el valor del atributo nombreCompleto como una cadena de texto
                string ROL = reader.GetString(2);
                if (usuario == user && passw == password)
                {
                    existo = true;
                    mirol = ROL;
                }

                //Aquí puedes trabajar con los valores obtenidos
            }
            reader.Close();

            if (existo)
            {
                if (mirol == "ESTUDIANTE")
                {
                 //   Button1.Attributes["onclick"] = "inicio.aspx";
                    LinkButton1.PostBackUrl = "inicio.aspx";
                    Label1.Text="Bienvenido Estudiante";
                }
                else{
                   // Button1.Attributes["onclick"] = "WebForm2.aspx";
                    LinkButton1.PostBackUrl = "WebForm2.aspx";
                    Label1.Text="Bienvenido Docente";
                }
            }else{

                   // Button1.Attributes["onclick"] = "index.aspx";
                LinkButton1.PostBackUrl = "index.aspx";
                    Label1.Text="La cuenta no existe";
            }
            conn.Close();
        
        }

    }
}