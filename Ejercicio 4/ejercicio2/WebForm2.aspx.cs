using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using MySql.Data;
using MySql.Data.MySqlClient;

namespace ejercicio2
{
    public partial class WebForm2 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());
            MySqlCommand cmd = conn.CreateCommand();
            cmd.CommandText = "SELECT AVG(i.notaFinal) as Promedio, p.departamento FROM inscripcion i JOIN persona p ON i.CIestudiante = p.CI GROUP BY p.departamento";
            conn.Open();
            MySqlDataReader reader = cmd.ExecuteReader();
            string[,] data = new string[9, 2];
            data[0, 0] = "01";
            data[1, 0] = "02";
            data[2, 0] = "03";
            data[3, 0] = "04";
            data[4, 0] = "05";
            data[5, 0] = "06";
            data[6, 0] = "07";
            data[7, 0] = "08";
            data[8, 0] = "09";
            data[0, 1] = "0";
            data[1, 1] = "0";
            data[2, 1] = "0";
            data[3, 1] = "0";
            data[4, 1] = "0";
            data[5, 1] = "0";
            data[6, 1] = "0";
            data[7, 1] = "0";
            data[8, 1] = "0";
            while (reader.Read())
            {
                string promedio = reader["Promedio"].ToString();
                string departamento = reader["departamento"].ToString();
                int i=0;
                while (i < 9)
                {
                    if (departamento == data[i, 0])
                    {
                        data[i, 1] = promedio;
                    }
                    i += 1;
                }
            }
            Label1.Text = data[0, 1];
            Label2.Text = data[1, 1];
            Label3.Text = data[2, 1];
            Label4.Text = data[3, 1];
            Label5.Text = data[4, 1];
            Label6.Text = data[5, 1];
            Label7.Text = data[6, 1];
            Label8.Text = data[7, 1];
            Label9.Text = data[8, 1];
        }
    }
}