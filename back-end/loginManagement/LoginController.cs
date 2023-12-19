using MySql.Data.MySqlClient;

namespace loginManagement
{
    public class LoginController
    {
        public static async Task<LoginResult> CheckUser(Utente u)
        {
            try
            {
                LoginResult result = 0;
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
                        result = LoginResult.LoginSuccesful;
                    else 
                        result = LoginResult.LoginFailed;
                }

                dbCon.Close();

                return result;
            }
            catch(Exception)
            {
                return LoginResult.Exception;
            }
        }
    }
}
