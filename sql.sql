database EasyMatch


CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL CHECK (role IN ('conducteur', 'expediteur', 'admin'))
);

CREATE TABLE Conducteur (
    id_conducteur INT PRIMARY KEY,
    badged BOOLEAN NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES Users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Annonce (
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    statut VARCHAR(50) NOT NULL CHECK (statut IN ('Active', 'close')),
    from_city VARCHAR(255) NOT NULL,
    to_city VARCHAR(255) NOT NULL,
    date_depart TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    conducteur_id INT,
    FOREIGN KEY (conducteur_id) REFERENCES Users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Type (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE Demande (
    id SERIAL PRIMARY KEY,
    statut VARCHAR(50) NOT NULL CHECK (statut IN ('Soumis', 'Accepte', 'Refuse')),
    longueur FLOAT NOT NULL,
    largeur FLOAT NOT NULL,
    hauteur FLOAT NOT NULL,
    poids FLOAT NOT NULL,
    depart VARCHAR(255) NOT NULL,
    destination VARCHAR(255) NOT NULL,
    expediteur_id INT,
    annonce_id INT,
    type_id INT,
    FOREIGN KEY (expediteur_id) REFERENCES Users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (annonce_id) REFERENCES Annonce(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (type_id) REFERENCES Type(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Evaluation (
    id SERIAL PRIMARY KEY,
    rate INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    annonce_id INT,
    FOREIGN KEY (annonce_id) REFERENCES Annonce(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Transaction (
    id_transaction INT PRIMARY KEY,
    current_destination VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR(50) NOT NULL CHECK (statut IN ('en cours', 'arrive')),
    FOREIGN KEY (id_transaction) REFERENCES Demande(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table trajet(
     id SERIAL PRIMARY KEY,
     city varchar(50) not null,
	 "order" int,
	 annonce_id int,
	 FOREIGN KEY (annonce_id) REFERENCES Annonce(id) ON DELETE CASCADE ON UPDATE CASCADE

);
