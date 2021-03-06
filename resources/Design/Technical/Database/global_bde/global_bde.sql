#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: gender
#------------------------------------------------------------

CREATE TABLE gender(
        ID_Gender Int  Auto_increment  NOT NULL ,
        Gender    Varchar (50) NOT NULL
	,CONSTRAINT gender_PK PRIMARY KEY (ID_Gender)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        ID_Role Int  Auto_increment  NOT NULL ,
        Role    Varchar (50) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (ID_Role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: campus
#------------------------------------------------------------

CREATE TABLE campus(
        ID_Campus Int  Auto_increment  NOT NULL ,
        Campus    Varchar (50) NOT NULL
	,CONSTRAINT campus_PK PRIMARY KEY (ID_Campus)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        ID_Users  Int  Auto_increment  NOT NULL ,
        F_Name    Varchar (50) NOT NULL ,
        L_Name    Varchar (50) NOT NULL ,
        Email     Varchar (50) NOT NULL ,
        ID_Campus Int NOT NULL ,
        ID_Gender Int NOT NULL ,
        ID_Role   Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (ID_Users)
	,CONSTRAINT users_campus_FK FOREIGN KEY (ID_Campus) REFERENCES campus(ID_Campus)
	,CONSTRAINT users_gender0_FK FOREIGN KEY (ID_Gender) REFERENCES gender(ID_Gender)
	,CONSTRAINT users_role1_FK FOREIGN KEY (ID_Role) REFERENCES role(ID_Role)
)ENGINE=InnoDB;

