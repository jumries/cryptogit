<?php

try {

    CREATE TABLE resister(
        id int NOT NULL AUTO_INCREMENT,
        first_name varchar(255) NOT NULL,
        last_name varchar(255),
        email varchar(255),
        password varchar(255),
        birthday varchar(100),
        gender varchar(100),
        date varchar(100),
        PRIMARY KEY (id)
    );

    CREATE TABLE submitsignal(
        id int NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        buy varchar(255),
        target varchar(255),
        stop varchar(255),
        result varchar(100),
        date varchar(100),
        PRIMARY KEY (id)
    ); 
} catch (Exception $e) {
    var_dump($e);
}


?>