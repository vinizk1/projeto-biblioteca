<?php

class DB{
    Static function getInstance(){
        return new PDO("mysql:host=localhost;database=projeto_biblioteca","root","");
    }
}

DB::getInstance();