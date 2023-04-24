using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Web;
using System.Web.Services;
using MySql.Data;
using System.Data;
using MySql.Data.MySqlClient;


namespace WebService1
{
    /// <summary>
    /// Descripción breve de Service1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    public class Service1 : System.Web.Services.WebService
    {

        [WebMethod]
        public string HelloWorld()
        {
            return "Hola a todos";
        }

        [WebMethod]
        public int suma(int a, int b)
        {
            return a + b;
        }
        [WebMethod]
        public DataSet persona()
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());           
            DataSet ds = new DataSet();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = conn;
            ada.SelectCommand.CommandText = "select * from persona";
            ada.Fill(ds);
            return ds;
        }
        [WebMethod]
        public DataSet personaUniq(int ci)
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());
            DataSet ds = new DataSet();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = conn;
            ada.SelectCommand.CommandText = "select * from persona where CI="+ci;
            ada.Fill(ds);
            return ds;
        }
        [WebMethod]
        public DataSet personaDel(int ci)
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());
            DataSet ds = new DataSet();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = conn;
            ada.SelectCommand.CommandText = "delete from persona where CI=" + ci;
            ada.Fill(ds);
            return ds;
        }
        [WebMethod]
        public DataSet personaCrea(int ci, string nombreCompleto, string fechaDeNacimiento, string departamento, string telefono)
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());
            DataSet ds = new DataSet();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = conn;
            ada.SelectCommand.CommandText = "insert into persona (CI, nombreCompleto, fechaDeNacimiento, telefono, departamento) values(" + ci+",'"+nombreCompleto+"','"+fechaDeNacimiento+"','"+telefono+"','"+departamento+"')";
            ada.Fill(ds);
            return ds;
        }
        [WebMethod]
        public DataSet personaEdit(int ci, string nombreCompleto, string fechaDeNacimiento, string departamento, string telefono)
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = "localhost";
            builder.UserID = "usuario";
            builder.Password = "123456";
            builder.Database = "academicosarai";
            MySqlConnection conn = new MySqlConnection(builder.ToString());
            DataSet ds = new DataSet();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = conn;
            ada.SelectCommand.CommandText = "update persona SET nombreCompleto='"+nombreCompleto+"', fechaDeNacimiento='"+fechaDeNacimiento+"', telefono='"+telefono+"', departamento='"+departamento+"' where CI="+ci;
            ada.Fill(ds);
            return ds;
        }
    }
}