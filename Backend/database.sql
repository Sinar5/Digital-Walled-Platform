-- Create a new database called 'DatabaseName'
-- Connect to the 'master' database to run this snippet
USE master
GO
-- Create the new database if it does not exist already
IF NOT EXISTS (
    SELECT name
        FROM sys.databases
        WHERE name = N'DigitalWallet'
)
CREATE DATABASE DigitalWallet
GO

CREATE TABLE Users( 
    Username varchar(26),
    PhoneNumber VARCHAR(20),
    Address VARCHAR(255),
    Balance DECIMAL(10,2),
    Email VARCHAR (255) PRIMARY KEY,
    PASSWORD  VARCHAR (8)
)

CREATE TABLE Transactions(
    TransactionID INT IDENTITY(1,1) PRIMARY KEY,
    UserEmail VARCHAR(255), 
    TransactionDate DATE,
    TransactionType Boolean, -- true for deposit, false for withdraw
    Amount DECIMAL(10,2),
    Balance DECIMAL(10,2),
    FOREIGN KEY (UserEmail) REFERENCES users(Email),
    FOREIGN KEY (Balance) REFERENCES useres(Balance),
)