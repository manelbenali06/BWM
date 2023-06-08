#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user    Int  Auto_increment  NOT NULL ,
        last_name  Varchar (50) NOT NULL ,
        first_name Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        password   Varchar (50) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: order
#------------------------------------------------------------

CREATE TABLE order(
        id_order       Int  Auto_increment  NOT NULL ,
        created_at     Datetime NOT NULL ,
        reference      Varchar (50) NOT NULL ,
        stripe_session Varchar (50) NOT NULL ,
        state          Int NOT NULL ,
        id_user        Int NOT NULL
	,CONSTRAINT order_PK PRIMARY KEY (id_order)

	,CONSTRAINT order_User_FK FOREIGN KEY (id_user) REFERENCES User(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Address
#------------------------------------------------------------

CREATE TABLE Address(
        id_address Int  Auto_increment  NOT NULL ,
        first_name Varchar (50) NOT NULL ,
        last_name  Varchar (50) NOT NULL ,
        name       Varchar (50) NOT NULL ,
        compagny   Varchar (50) NOT NULL ,
        address    Varchar (500) NOT NULL ,
        postal     Varchar (50) NOT NULL ,
        city       Varchar (50) NOT NULL ,
        country    Varchar (50) NOT NULL ,
        phone      Varchar (50) NOT NULL ,
        id_user    Int NOT NULL
	,CONSTRAINT Address_PK PRIMARY KEY (id_address)

	,CONSTRAINT Address_User_FK FOREIGN KEY (id_user) REFERENCES User(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: carrier
#------------------------------------------------------------

CREATE TABLE carrier(
        id_carrier  Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        description Text NOT NULL ,
        price       Double NOT NULL ,
        id_address  Int NOT NULL ,
        id_order    Int NOT NULL
	,CONSTRAINT carrier_PK PRIMARY KEY (id_carrier)

	,CONSTRAINT carrier_Address_FK FOREIGN KEY (id_address) REFERENCES Address(id_address)
	,CONSTRAINT carrier_order0_FK FOREIGN KEY (id_order) REFERENCES order(id_order)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Product
#------------------------------------------------------------

CREATE TABLE Product(
        id_product   Int  Auto_increment  NOT NULL ,
        name         Varchar (50) NOT NULL ,
        slug         Varchar (50) NOT NULL ,
        illustration Varchar (50) NOT NULL ,
        updateAt     Datetime NOT NULL ,
        subtitle     Varchar (50) NOT NULL ,
        description  Text NOT NULL ,
        isbest       Bool NOT NULL
	,CONSTRAINT Product_PK PRIMARY KEY (id_product)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: catégory
#------------------------------------------------------------

CREATE TABLE category(
        id_category Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (id_category)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orderDetails
#------------------------------------------------------------

CREATE TABLE orderDetails(
        id_orderDetails Int  Auto_increment  NOT NULL ,
        product         Varchar (50) NOT NULL ,
        quantity        Int NOT NULL ,
        price           Double NOT NULL ,
        total           Double NOT NULL ,
        id_order        Int NOT NULL
	,CONSTRAINT orderDetails_PK PRIMARY KEY (id_orderDetails)

	,CONSTRAINT orderDetails_order_FK FOREIGN KEY (id_order) REFERENCES order(id_order)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: possède
#------------------------------------------------------------

CREATE TABLE possede(
        id_product Int NOT NULL ,
        id_order   Int NOT NULL
	,CONSTRAINT possede_PK PRIMARY KEY (id_product,id_order)

	,CONSTRAINT possede_Product_FK FOREIGN KEY (id_product) REFERENCES Product(id_product)
	,CONSTRAINT possede_order0_FK FOREIGN KEY (id_order) REFERENCES order(id_order)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartient
#------------------------------------------------------------

CREATE TABLE appartient(
        id_category Int NOT NULL ,
        id_product  Int NOT NULL
	,CONSTRAINT appartient_PK PRIMARY KEY (id_category,id_product)

	,CONSTRAINT appartient_category_FK FOREIGN KEY (id_category) REFERENCES category(id_category)
	,CONSTRAINT appartient_Product0_FK FOREIGN KEY (id_product) REFERENCES Product(id_product)
)ENGINE=InnoDB;

