CREATE DATABASE IF NOT EXISTS isl_masterDB;

use isl_masterDB;

create table magazzini(
    codice_magazzino char(10) primary key,
    indirizzo varchar(50)
);

create table utenti(
    username varchar(50) binary primary key,
    password varchar(20) binary not null,
    nome varchar(50),
    cognome varchar(50),
    data_nascita date,
    telefono varchar(15),
    codice_magazzino char(10),
    foreign key(codice_magazzino) references magazzini(codice_magazzino)
);

create table task(
    id_task bigint unsigned zerofill auto_increment primary key,
    descrizione varchar(100) not null,
    status tinyint not null,
    data_ora_inizio datetime,
    data_ora_termine datetime
);

create table ruoli(
    id_ruolo int unsigned primary key,
    descrizione varchar(100) not null
);

create table aree(
    codice_area char(10),
    codice_magazzino char(10),
    foreign key(codice_magazzino) references magazzini(codice_magazzino),
    primary key(codice_area, codice_magazzino)
);

create table scaffali(
    codice_scaffale char(10),
    codice_area char(10),
    codice_magazzino char(10),
    foreign key(codice_area,codice_magazzino) references magazzini(codice_area,codice_magazzino),
    primary key(codice_scaffale, codice_area, codice_magazzino)
);

create table bancali(
    codice_bancale char(20) primary key,
    peso decimal,
    altezza decimal,
    lunghezza decimal,
    larghezza decimal,
    carico char(20),
    fragile boolean,
    codice_scaffale char(10),
    codice_area char(10),
    codice_magazzino char(10),
    foreign key(codice_scaffale,codice_area,codice_magazzino) references scaffali(codice_scaffale,codice_area,codice_magazzino)
);

create table bancali_task(
    codice_bancale char(20),
    id_task bigint unsigned zerofill,
    foreign key(codice_bancale) references bancali(codice_bancale),
    foreign key(id_task) references task(id_task),
    primary key(codice_bancale, id_task)
);

create table utenti_task(
    username varchar(50) binary,
    id_task bigint unsigned zerofill,
    foreign key(username) references utenti(username),
    foreign key(id_task) references task(id_task),
    primary key(username, id_task)
);

create table ruoli_task(
    id_ruolo int unsigned,
    id_task bigint unsigned zerofill,
    foreign key(id_ruolo) references ruoli(id_ruolo),
    foreign key(id_task) references task(id_task),
    primary key(id_ruolo, id_task)
);

create table utenti_ruoli(
    username varchar(50) binary,
    id_ruolo int unsigned,
    foreign key(username) references utenti(username),
    foreign key(id_ruolo) references ruoli(id_ruolo),
    primary key(username, id_ruolo)
);

INSERT INTO utenti(username,password) VALUES('utente','123');
INSERT INTO utenti(username,password) VALUES('dbadmin','password');
