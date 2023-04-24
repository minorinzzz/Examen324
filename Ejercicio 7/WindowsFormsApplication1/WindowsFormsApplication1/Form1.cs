using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            this.ControlBox = false;
            
        }

        private void Form1_Activated(object sender, EventArgs e)
        {
            this.Refresh();
        }


        public void Form1_Load(object sender, EventArgs e)
        {
            ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
            dataGridView1.DataSource = ws.persona().Tables[0];

            DataGridViewButtonColumn modificarColumn = new DataGridViewButtonColumn();
            modificarColumn.Name = "Modificar";
            modificarColumn.Text = "Modificar";
            modificarColumn.UseColumnTextForButtonValue = true;
            dataGridView1.Columns.Add(modificarColumn);
            
            DataGridViewButtonColumn eliminarColumn = new DataGridViewButtonColumn();
            eliminarColumn.Name = "Eliminar";
            eliminarColumn.Text = "Eliminar";
            eliminarColumn.UseColumnTextForButtonValue = true;
            dataGridView1.Columns.Add(eliminarColumn);
        }
        private void dataGridView1_CellContentClick_1(object sender, DataGridViewCellEventArgs e)
        {
            if (e.ColumnIndex == dataGridView1.Columns["Modificar"].Index)
            {
                string ci = dataGridView1.Rows[e.RowIndex].Cells["CI"].Value.ToString();
                this.Hide();
                Form2 mod = new Form2(ci,this); 
                mod.Show();
            }
            else if (e.ColumnIndex == dataGridView1.Columns["Eliminar"].Index)
            {
                string ci2 = dataGridView1.Rows[e.RowIndex].Cells["CI"].Value.ToString();
                int ci = Int32.Parse(ci2);
                DialogResult result = MessageBox.Show("¿Está seguro de que desea eliminar esta fila?", "Confirmación de eliminación", MessageBoxButtons.YesNo);
                if (result == DialogResult.Yes)
                {
                    ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
                    ws.personaDel(ci);
                    dataGridView1.Rows.RemoveAt(e.RowIndex);
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            List<Form> openForms = new List<Form>(Application.OpenForms.Cast<Form>());
           
            foreach (Form form in openForms)
            {
                form.Close();
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form2 mod = new Form2("0", this);
            mod.Show();
            this.Hide();
        }

    }
}
