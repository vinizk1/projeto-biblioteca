<?php

class DB{
    Static function getInstance(){
        return new PDO("mysql:host=localhost;dbname=projeto_biblioteca","root","");
    }
}

DB::getInstance();