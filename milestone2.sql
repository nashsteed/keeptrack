
CREATE TABLE databaseInfo (
   dbID int NOT NULL AUTO_INCREMENT,
   dbName varchar(30),
   locList varchar(100),
   PRIMARY KEY (dbID) );

CREATE TABLE users (
   uID int NOT NULL AUTO_INCREMENT,
   email varchar(30) NOT NULL,
   password varchar(30) NOT NULL, 
   street varchar(30) NOT NULL,
   dbID int NOT NULL,
   city varchar(30) NOT NULL,
   zipCode int NOT NULL,
   PRIMARY KEY (uID)
   );

CREATE TABLE names (
   email varchar(30) NOT NULL,
   firstName varchar(30) NOT NULL, 
   lastName varchar(30) NOT NULL,
   userName varchar(30) NOT NULL,
   PRIMARY KEY (email) ); 

CREATE TABLE stateInfo (
   zipCode int NOT NULL,
   state varchar(30) NOT NULL,
   PRIMARY KEY (zipCode) ); 


CREATE TABLE items (
   itemID int NOT NULL AUTO_INCREMENT,
   itemName varchar(30) NOT NULL,
   location varchar(30) NOT NULL,
   image varchar(400) NOT NULL,
   description varchar(300),
   dbID int NOT NULL,
   quantity int NOT NULL
   -- to ensure that the user only inserts items that they have 1 or more of so there are no empty items
   CHECK (quantity>=1),
   adjList varchar(100),
   PRIMARY KEY (itemID) );

CREATE TABLE friend (
   friendID int NOT NULL AUTO_INCREMENT,
   userID1 int NOT NULL,
   userID2 int NOT NULL,
   dbID int NOT NULL,
   PRIMARY KEY (friendID) );

CREATE TABLE borrow (
   borrowID int NOT NULL AUTO_INCREMENT,
   userID1 int NOT NULL,
   dbID int NOT NULL,
   itemID int NOT NULL,
   PRIMARY KEY (borrowID) );

CREATE TABLE loans (
   loanID int NOT NULL AUTO_INCREMENT,
   userID int NOT NULL,
   itemID int NOT NULL,
   PRIMARY KEY (loanID) );

CREATE TABLE templates (
   tempName varchar(100),
   tempdbID int NOT NULL,
   PRIMARY KEY (tempdbID) );

CREATE TABLE keysDB (
   userID int NOT NULL,
   itemID int NOT NULL,
   loanID int NOT NULL,
   PRIMARY KEY (loanID) );

-- this makes the user-created dbID's begin at 100
ALTER TABLE databaseInfo AUTO_INCREMENT=100;

-- to ensure that the template dbIDs dont overlap with the user-created IDs (user dbID's start at 100)
ALTER TABLE templates
ADD CONSTRAINT checkTempDBID
CHECK (tempdbID < 100);

INSERT INTO databaseInfo values(120,'testdb','locationslisttest');
INSERT INTO users(email,password,street,dbID,city,zipCode) values('test@test.com','password','guthrie avenue',120,'Richmond',23226);


DELIMITER //
-- this created the stored procedure for getting friends by ID
CREATE PROCEDURE `getFriendsByID`(IN `userID` int) 
BEGIN select * from friend where userID1 = userID OR userID2 = userID; 
END

DELIMITER ;


GRANT INSERT TO public;
GRANT UPDATE TO public;
GRANT SELECT TO public;
GRANT DELETE FROM TO public;
REVOKE DROP TABLE FROM public;
REVOKE ALTER FROM public;
REVOKE GRANT FROM public;




