<?php

class ApiReport extends Api
{
    public static function post(Request $request)
    {
        var_dump(__CLASS__.'::'.__FUNCTION__);
    }

    public static function get(Request $request)
    {
        if (!isset($request->url[1])) {
            $reports = DaoReport::getAllReports();
        }else {
            $reports = DaoReport::getReportById($request->url[1]);
        }

        header('Content-Type: application/json');
        echo json_encode($reports);
    }

    public static function delete(Request $request)
    {
        var_dump(__CLASS__.'::'.__FUNCTION__);
    }

    public static function put(Request $request)
    {
        var_dump(__CLASS__.'::'.__FUNCTION__);
    }
}
