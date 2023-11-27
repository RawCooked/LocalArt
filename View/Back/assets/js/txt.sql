/* 1 */
CREATE TABLE Chefs (
    cin number(6) constraint pk_cin primary key,
    nom varchar(30) constraint ck_nom not null,
    prenom varchar(30) constraint ck_prenom not null,
    specialite varchar(30) constraint ck_specialte not null,
    idrestaurant number(6),
    constraint fk_idrestaurant foreign key idrestaurant references Restaurants(idrestaurant)
 );

CREATE TABLE Restaurants (
    idrestaurant number(6) pk_idrestaurant primary key,
     nom varchar(20) constraint ck_nom not null,
     Adresse varchar(50),
     capacite number(10) constraint ck_capacite not null
);

CREATE TABLE plats (
    Codeplat number(6) constraint pk_codeplat primary key,
    Nomplat varchar(15) constraint ck_Nomplat not null,
    cout number(6) constraint ck_Cout not null,
    temps_de_preparation number(6),
    temps_de_cuisson number(6),
    temps_de_repos number(6) constraint ck_temps_de_repos  SET DEFAULT 1 ,
    Nbrpersonnes number(6) constraint ck_Nbrpersonnes check ( Nbrpersonnes > 150 and Nbrpersonnes < 500),
    cin_chef number(10) constraint fj_cin_chef foreign key cin_chef references Chefs (cin_chef),
    constraint ck_temps_de_repos check (temps_de_repos < 20)
); 
/* 2 */
ALTER TABLE Restaurants
ADD CONSTRAINT check_capacite CHECK (capacite <= 50);
/* 3 */
insert into Restaurants (idrestaurant,nom,Adresse,capacite)
values (123325,Bab el Houma, 12 B1 géant, 15);

insert into Restaurants (idrestaurant,nom,Adresse,capacite)
values (126969,Hobo, 10 0 géat, 30);
/* 4 */
ALTER TABLE Restaurants
ADD CONSTRAINT check_adresse not null (adresse );
/* 5 */
ALTER TABLE Restaurants
ADD CONSTRAINT check_Nom CHECK (Nom like '[A-Z]%');
/* 6 */
ALTER TABLE Restaurants
ALTER COLUMN capacite SET DEFAULT 1,
ADD CONSTRAINT check_capacite CHECK (capacite <= 6 and capacite >=1 );
/* 7 */
ALTER TABLE Plats
ADD CONSTRAINT unique_temps_preparation UNIQUE (temps_de_preparation);
/* 8 */
ALTER TABLE plats
ADD CONSTRAINT check_cout CHECK (cout < 300);
/* 9 */
ALTER TABLE plats
ADD CONSTRAINT ck_Nbrpersonnes not null (Nbrpersonnes);