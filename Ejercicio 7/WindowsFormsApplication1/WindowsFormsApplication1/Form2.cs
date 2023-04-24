using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Text.RegularExpressions;

namespace WindowsFormsApplication1
{
    public partial class Form2 : Form
    {
        private int ci;
        private string nombreCompleto,telefono,departamento;
        private DateTime fechaDeNacimiento;
        private Form ant;
        private bool op;
        public Form2(string ci2, Form anterior)
        {
            InitializeComponent();

            this.ControlBox = false;
            this.ci = Int32.Parse(ci2);
            this.ant = anterior;

           
             if (ci != 0)
             {
                 ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
                 DataSet ds = ws.personaUniq(ci);

                 if (ds.Tables.Count > 0)
                 {
                     DataTable dt = ds.Tables[0];
                     if (dt.Rows.Count > 0)
                     {
                         DataRow dr = dt.Rows[0];
                         nombreCompleto = dr["nombreCompleto"].ToString();
                         telefono = dr["telefono"].ToString();
                         fechaDeNacimiento = DateTime.Parse(dr["fechaDeNacimiento"].ToString());
                         departamento = dr["departamento"].ToString();
                     }
                 }
                 else
                 {
                     MessageBox.Show("Ocurrio un error", "Error en Web Service", MessageBoxButtons.OK);
                 }

                 textBox1.Enabled = false;
                 textBox1.Text = ci+"";
                 textBox2.Text = nombreCompleto;
                 textBox3.Text = telefono;
                 textBox4.Text = departamento;
                 monthCalendar1.SetDate(fechaDeNacimiento);
                 op = false;
             }
             else
             {
                 textBox1.Enabled = true;
                 op = true;
             }

        }

        private void Form2_Load(object sender, EventArgs e)
        {

            this.ControlBox = false;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
            ant.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            if (!string.IsNullOrEmpty(textBox1.Text))
            {
                ci = int.Parse(textBox1.Text);
                if (!string.IsNullOrEmpty(textBox2.Text))
                {
                    nombreCompleto = textBox2.Text;
                    if (!string.IsNullOrEmpty(textBox3.Text))
                    {
                        telefono = textBox3.Text;
                        if (!string.IsNullOrEmpty(textBox4.Text))
                        {
                            departamento = textBox4.Text;
                            if (monthCalendar1.SelectionRange.Start != null)
                            {
                                fechaDeNacimiento = monthCalendar1.SelectionRange.Start;
                                String fechaDeNacimientoStr = fechaDeNacimiento.ToString("yyyy-MM-dd");
                                if (Regex.IsMatch(departamento, "^[0-9]{2}$"))
                                {
                                    if (Regex.IsMatch(ci + "", "^[0-9]+$"))
                                    {
                                        ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
                                        if (!op)
                                        {
                                            DataSet ds = ws.personaEdit(ci, nombreCompleto, fechaDeNacimientoStr, departamento, telefono);
                                            MessageBox.Show("La edicion fue realizado sin problemas", "Correcto", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                                            Form1 ff = new Form1();
                                            ff.Show();
                                            this.Close();
                                        }
                                        else
                                        {
                                             DataSet ds2 = ws.personaUniq(ci);

                                            DataTable dt = ds2.Tables[0];
                                            if (dt.Rows.Count > 0)
                                            {
                                                    MessageBox.Show("El CI ya existe", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                                            }else{
                                                DataSet ds = ws.personaCrea(ci, nombreCompleto, fechaDeNacimientoStr, departamento, telefono);
                                                MessageBox.Show("La creacion fue realizado sin problemas", "Correcto", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                                                Form1 ff = new Form1();
                                                ff.Show();
                                                this.Close();
                                            }
                                            
                                        }

                                        
                                    }
                                    else
                                    {
                                        MessageBox.Show("El valor del CI no es válido. Debe contener solo dígitos numéricos.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                                    }

                                }
                                else
                                {
                                    MessageBox.Show("El valor del departamento no es válido. Debe contener exactamente dos dígitos del 0 al 9.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                                }
                            }
                            else
                            {
                                MessageBox.Show("El campo Fecha de Nacimiento está vacío.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                            }
                        }
                        else
                        {
                            MessageBox.Show("El campo Departamento está vacío.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        }
                    }
                    else
                    {
                        MessageBox.Show("El campo Teléfono está vacío.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
                else
                {
                    MessageBox.Show("El campo Nombre Completo está vacío.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
            else
            {
                MessageBox.Show("El campo CI está vacío.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            
        }

    }
}
