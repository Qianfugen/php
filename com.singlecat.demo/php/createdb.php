<?php
$config=parse_ini_file(realpath(dirname(__FILE__).'/config/datasource.ini'));
$host=$config["host"];
$username=$config["username"];
$password=$config["password"];
try{
    //连接数据库
    $conn=new PDO("mysql:host=$host",$username,$password);
    //php5
    // 设置 PDO 错误模式为异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //使用sql创建数据库 mytest
    $sql = "CREATE DATABASE db02";
    // 使用 exec() ，因为没有结果返回
    $conn->exec($sql);

    echo "数据库创建成功";
}catch (PDOException $e){
    $e->getMessage();
}