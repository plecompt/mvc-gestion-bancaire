#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE `mvc-gestion-bancaire`;
USE `mvc-gestion-bancaire`;

#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        user_id        Int Auto_increment NOT NULL,
        user_firstName Varchar (50) NOT NULL,
        user_lastName  Varchar (50) NOT NULL,
        user_email     Varchar (255) NOT NULL,
        user_phone     Varchar (20) NOT NULL,
        user_address   Varchar (255),
        CONSTRAINT User_PK PRIMARY KEY (user_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Account
#------------------------------------------------------------

CREATE TABLE Account(
        account_id      Int Auto_increment NOT NULL,
        account_iban    Varchar (50) NOT NULL,
        account_type    Enum("Compte courant", "Compte épargne")  NOT NULL,
        account_balance Double NOT NULL,
        user_id         Int NOT NULL,
        CONSTRAINT Account_PK PRIMARY KEY (account_id),
        CONSTRAINT Account_User_FK FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contract
#------------------------------------------------------------

CREATE TABLE Contract(
        contract_id      Int Auto_increment NOT NULL,
        contract_type    ENUM("Assurance vie", "Assurance habitation", "Crédit immobilier", "Crédit à la consommation", "Compte épargne logement") NOT NULL,
        contract_cost    Double NOT NULL,
        contract_duration Int NOT NULL,
        user_id          Int NOT NULL,
        CONSTRAINT Contract_PK PRIMARY KEY (contract_id),
        CONSTRAINT Contract_User_FK FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        admin_id       Int Auto_increment NOT NULL,
        admin_email    Varchar (255) NOT NULL,
        admin_password Varchar (60) NOT NULL,
        CONSTRAINT Admin_PK PRIMARY KEY (admin_id)
)ENGINE=InnoDB;