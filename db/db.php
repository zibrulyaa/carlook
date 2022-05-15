<?php
try{
    $dbhost = "localhost";
    $dbname = "f0650590_carlook";
    $username = "root";
    $password = "";

    $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);


    // Вывод на экран значений таблицы Drive
    function getDrive(){
        global $db;
        $drive = $db->query('SELECT * FROM drive');
        return $drive;
    }
    // Вывод на экран значений таблицы Body
    function getBody(){
        global $db;
        $body = $db->query('SELECT * FROM body');
        return $body;
    }
    // Вывод на экран значений таблицы Brand
    function getBrand(){
        global $db;
        $brand = $db->query('SELECT * FROM brand');
        return $brand;
    }
    // Вывод на экран значений таблицы Model
    function getModel(){
        global $db;
        $model = $db->query('SELECT * FROM model');
        return $model;
    }
    // Вывод на экран значений таблицы Gearbox
    function getGear(){
        global $db;
        $gear = $db->query('SELECT * FROM gearbox');
        return $gear;
    }
    // Вывод на экран значений таблицы Gearbox
    function getColor(){
        global $db;
        $color = $db->query('SELECT * FROM color');
        return $color;
    }
    // Вывод на экран значений таблицы Options
    function getOptions(){
        global $db;
        $options = $db->query('SELECT * FROM options');
        return $options;
    }
    // Вывод на экран значений таблицы Configuration
    function getСnf(){
        global $db;
        $cnf = $db->query('SELECT * FROM configuration');
        return $cnf;
    }
    // Вывод на экран значений таблицы Engine
    function getEngine(){
        global $db;
        $engine = $db->query('SELECT * FROM engine');
        return $engine;
    }
    // Вывод на экран значений таблицы Engine
    function getStock(){
        global $db;
        $var = $db->query('SELECT * FROM stock');
        return $var;
    }
    // Вывод на экран значений таблицы Car
    function getCar(){
        global $db;
        $var = $db->query('SELECT * FROM car');
        return $var;
    }
    // Вывод на экран значений таблицы Manager
    function getManager(){
        global $db;
        $var = $db->query('SELECT * FROM manager');
        return $var;
    }
    // Вывод на экран значений таблицы Post
    function getPost(){
        global $db;
        $var = $db->query('SELECT * FROM post');
        return $var;
    }
    // Вывод на экран значений таблицы Client
    function getClient(){
        global $db;
        $var = $db->query('SELECT * FROM client');
        return $var;
    }
    // Вывод на экран значений таблицы Status
    function getStatus(){
        global $db;
        $var = $db->query('SELECT * FROM status');
        return $var;
    }
    // Вывод на экран значений таблицы Status
    function  getRequest(){
        global $db;
        $var = $db->query('SELECT * FROM request');
        return $var;
    }


    // Вывод количества опций в данной Комплектации
    function getOptionsCount($id){
        global $db;
        $count = $db->query("SELECT COUNT(*) c FROM configuration_options WHERE configuration_id = $id");
        foreach ($count as $c){
            return $c['c'];
        }
    }



    // Получение наименования марки по id
    function getBrandById($id){
        global $db;
        $brands = $db->query("SELECT * FROM brand WHERE  id=$id");
        foreach ($brands as $brand){
            return $brand['name'];
        }
    }
    // Получение наименования модели по id
    function getModelById($id){
        global $db;
        $models = $db->query("SELECT * FROM model WHERE  id=$id");
        foreach ($models as $model){
            return $model['name'];
        }
    }
    // Получение наименования привода по id
    function getDriveById($id){
        global $db;
        $drives = $db->query("SELECT * FROM drive WHERE  id=$id");
        foreach ($drives as $drive){
            return $drive['name'];
        }
    }
    // Получение наименования кузова по id
    function getBodyById($id){
        global $db;
        $bodies = $db->query("SELECT * FROM body WHERE  id=$id");
        foreach ($bodies as $body){
            return $body['name'];
        }
    }
    // Получение наименования Двигателя по id
    function getEngineById($id){
        global $db;
        $engines = $db->query("SELECT * FROM engine WHERE  id=$id");
        foreach ($engines as $engine){
            return $engine['name'];
        }
    }
    // Получение наименования КПП по id
    function getGearById($id){
        global $db;
        $gears = $db->query("SELECT * FROM gearbox WHERE  id=$id");
        foreach ($gears as $gear){
            return $gear['name'];
        }
    }
    // Получение наименования Комплектации по id
    function getCnfById($id){
        global $db;
        $gears = $db->query("SELECT * FROM configuration WHERE  id=$id");
        foreach ($gears as $gear){
            return $gear['name'];
        }
    }
    // Получение наименования Цвета по id
    function getColorById($id){
        global $db;
        $gears = $db->query("SELECT * FROM color WHERE  id=$id");
        foreach ($gears as $gear){
            return $gear['name'];
        }
    }
    // Получение наименования Наличия по id
    function getStockById($id){
        global $db;
        $gears = $db->query("SELECT * FROM stock WHERE  id=$id");
        foreach ($gears as $gear){
            return $gear['name'];
        }
    }
    // Получение наименования Опций по id
    function getOptionsById($id){
        global $db;
        $options = $db->query("SELECT * FROM options WHERE  id=$id");
        foreach ($options as $option){
            return $option['name'];
        }

    }
    // Получение наименования Должности по id
    function getPostById($id){
        global $db;
        $vars = $db->query("SELECT * FROM post WHERE  id=$id");
        foreach ($vars as $var){
            return $var['name'];
        }

    }
    // Получение наименования Manager по id
    function getManagerById($id){
        global $db;
        $vars = $db->query("SELECT * FROM manager WHERE  id=$id");
        foreach ($vars as $var){
            return  $var['firstName'] . ' ' . $var['lastName'] . ' ' . $var['middleName'];
        }

    }
    // Получение наименования Client по id
    function getClientById($id){
        global $db;
        $vars = $db->query("SELECT * FROM client WHERE  id=$id");
        foreach ($vars as $var){
            return  $var['firstName'] . ' ' . $var['lastName'] . ' ' . $var['middleName'];
        }

    }
    // Получение наименования Car по id
    function getCarById($id){
        global $db;
        $vars = $db->query("SELECT * FROM car WHERE  id=$id");
        foreach ($vars as $var){
            $brand = getBrandById($var["brand_id"]);
            $model = getModelById($var["model_id"]);
            $cnf = getCnfById($var["cnf_id"]);
            return  $brand . ' ' . $model . ' ' . $cnf;
        }

    }
    // Получение наименования Status по id
    function getStatusById($id){
        global $db;
        $vars = $db->query("SELECT * FROM status WHERE  id=$id");
        foreach ($vars as $var){
            return $var['name'];
        }

    }

    function selectedOptions($option_id){
        global $arr;
        foreach ($arr as $a){
            if($a[0] == $option_id){
                return 'selected';
            }
        }
        return '';
    }

}
catch (PDOException $e){
    echo 'error'.$e->getMessage();
}
