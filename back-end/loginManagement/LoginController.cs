using MySql.Data.MySqlClient;

namespace loginManagement
{
    public class LoginController
    {
        public static async Task<bool> CheckUser(Utente u)
        {
            try
            {
                bool result = false;
                var dbCon = DBConnection.Instance();
                dbCon.Server = "localhost";
                dbCon.DatabaseName = "ISL_masterDB";
                dbCon.Username = u.Username;
                dbCon.Password = u.Password;

                if (dbCon.IsConnect())
                {

                    string query = $"SELECT * FROM utenti WHERE username='{u.Username}' AND password='{u.Password}'";
                    var cmd = new MySqlCommand(query, dbCon.Connection);
                    var reader = cmd.ExecuteReader();
                    if (reader.HasRows)
                        result = true;
                    else 
                        result = false;
                    dbCon.Close();
                }

                return result;
            }
            catch(Exception)
            {
                return false;
            }
        }
    }
}
