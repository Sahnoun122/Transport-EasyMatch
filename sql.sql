database EasyMatch

CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL CHECK (role IN ('conducteur', 'expediteur' , 'admin'))
	
	);


CREATE TABLE Conducteur (
    id_conducteur int PRIMARY KEY,
    badged BOOLEAN NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES Users(id) on delete cascade on update cascade 
);


CREATE TABLE Annonce (
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    Statut VARCHAR(50) NOT NULL CHECK (Statut IN ('Active',  'close')),
    fromcity VARCHAR(255) NOT NULL,
    tocity VARCHAR(255) NOT NULL,
    datedepart TIMESTAMP NOT NULL,
	createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	conducteur_id INT,
	 FOREIGN KEY ( conducteur_id ) REFERENCES Users(id) on delete cascade on update cascade 
    
);

CREATE TABLE Demande (
    id SERIAL PRIMARY KEY,
    Statut VARCHAR(50) NOT NULL CHECK (Statut IN ('Soumis',  'Accepte',  'Refuse')),
    longueur FLOAT NOT NULL,
    largeur FLOAT NOT NULL,
    hauteur FLOAT NOT NULL,
    poids FLOAT NOT NULL,
    depart VARCHAR(255) NOT NULL,
    destination VARCHAR(255) NOT NULL,
    expediteur_id INT,
	annonce_id INT,
    type_id INT;
	FOREIGN KEY (expediteur_id) REFERENCES Users(id) on delete cascade on update cascade,
	FOREIGN KEY (annonce_id) REFERENCES Annonce(id) on delete cascade on update cascade
    FOREIGN KEY ( type_id) REFERENCES Type(id) on delete cascade on update cascade 

);



CREATE TABLE Evaluation (
    id SERIAL PRIMARY KEY,
    rate INT NOT NULL,
    comment TEXT NOT NULL,
    createdAt TIMESTAMP NOT NULL,
	annonce_id INT,
	FOREIGN KEY (annonce_id) REFERENCES Annonce(id) on delete cascade on update cascade 
);

CREATE TABLE Type (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,

);

CREATE TABLE Transaction (
    id_transaction int PRIMARY KEY,
    current_destination varchar(50),
	createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Statut VARCHAR(50) NOT NULL CHECK (Statut IN ('en cours',  'arrive')  ),

    FOREIGN KEY (id_transaction) REFERENCES Demande(id) on delete cascade on update cascade 
);