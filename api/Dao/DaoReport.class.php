<?php

class DaoReport extends Dao
{
    static function getDb(){
        $dao = Dao::getInstance();
        return $dao->db;
    }

    static function getAllReports() {
        $db = self::getDb();
        $result = $db->prepare('SELECT * FROM reports WHERE 1');
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    static function getReportById($id) {
        $db = self::getDb();
        $result = $db->prepare('SELECT * FROM reports WHERE Id_reports=:id');
        $result->bindParam(":id",$id);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
}
