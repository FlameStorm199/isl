using loginManagement;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.ResponseCompression;
using Microsoft.AspNetCore.SignalR;
using Microsoft.OpenApi.Models;

var builder = WebApplication.CreateBuilder(args);

builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen(c =>
{
    c.SwaggerDoc("v1", new OpenApiInfo { Title = "ISL API", Description = "Main API back-end methods for ISL", Version = "v1" });
});
builder.Services.AddResponseCompression(opts =>
{
    opts.MimeTypes = ResponseCompressionDefaults.MimeTypes.Concat(
        new[] { "application/octet-stream" });
});
//builder.Services.AddSignalR();

var app = builder.Build();

app.UseSwagger();
app.UseSwaggerUI(c =>
{
    c.SwaggerEndpoint("/swagger/v1/swagger.json", "ISL API V1");
});



app.MapGet("/", () => "Hello World!");
app.MapPost("/Login/CheckUser", (Utente u) => LoginController.CheckUser(u));
//app.MapPost("/Services/StartWindowsService", (Service s) => ServicesController.StartWindowsService(s));
//app.MapPost("/Services/StopWindowsService", (Service s) => ServicesController.StopWindowsService(s));
//app.MapPost("/Services/RestartWindowsService", (Service s) => ServicesController.RestartWindowsService(s));
//app.MapPost("/Services/PrintServiceStatus", (Service s) => ServicesController.PrintServiceStatus(s));
//app.MapPost("/Services/RestoreDatabase", (Database d) => ServicesController.RestoreDatabase(d));
//app.MapPost("/Services/RestoreDatabaseII", (Database d) => ServicesController.RestoreDatabaseII(d));
//app.MapPost("/Services/RestoreDatabaseIII", (Database d) => ServicesController.RestoreDatabaseIII(d));
//app.MapPost("/Services/MakeQueryForLogs", (Database d) => ServicesController.MakeQueryForLogs(d));
//app.MapPost("/Services/SetMomAppServerMachineNames", (Database d) => ServicesController.SetMomAppServerMachineNames(d));
//app.MapPost("/Services/ExecuteSQLCommands", (Database d) => ServicesController.ExecuteSQLCommands(d));
//app.MapPost("/Services/IsAdministrator", () => ServicesController.IsAdministrator());

app.Run("http://0.0.0.0:5207");
