using MySql.Data.MySqlClient;

namespace loginManagement
{
    public class LoginController
    {
        public static async Task<string> CheckUser(Utente u)
        {
            try
            {
                string result = "";
                var dbCon = new DBConnection();
                dbCon.Server = "localhost";
                dbCon.DatabaseName = "ISL_masterDB";
                //dbCon.Username = u.Username;
                //dbCon.Password = u.Password;
                dbCon.Username = "root";
                dbCon.Password = "";

                if (dbCon.IsConnect())
                {

                    string query = $"SELECT * FROM utenti WHERE username='{u.Username}' AND password='{u.Password}'";
                    var cmd = new MySqlCommand(query, dbCon.Connection);
                    var reader = cmd.ExecuteReader();
                    if (reader.HasRows)
                        result = "Perfetto!";
                    else 
                        result = "Errore nel login";
                }

                dbCon.Close();

                return result;
            }
            catch(Exception e)
            {
                return e.Message;
            }
        }
    }
}
