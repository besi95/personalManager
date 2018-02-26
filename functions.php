<?php

/**
 * application core functions
 */

/**
 * @return string
 * return base url of application
 */
function getBaseUrl()
{

    return "http://localhost/personalManager/";
}

function getActionUrl($action)
{

    return getBaseUrl() . 'src/' . $action . '.php';
}

function formatFileSize($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' Bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' Byte';
    } else {
        $bytes = '0 Bytes';
    }

    return $bytes;
}

/**
 * @param $userId
 * @param $conn
 * @return int|string
 * gjej totalin e hapesires se zene nga useri
 */
function getUserTotalFileSize($userId, $conn)
{

    $filesSql = "SELECT file.path FROM file
                  INNER JOIN perdorues ON perdorues.perdorues_id = file.perdorues_id
                  WHERE perdorues.perdorues_id = '{$userId}'";
    $result = $conn->query($filesSql);
    if ($result->num_rows < 1) {
        return 0;
    } else {
        $madhesia = 0;
        while ($file = $result->fetch_assoc()) {
            $madhesia += filesize('../dokumenta/' . $file['path']);
        }
        return $madhesia;
    }

}

/**
 * @param $userId
 * @param $conn
 * @return int
 * gjej nr e kartave bankare te ruajtura nga useri
 */
function nrKartaveBankare($userId, $conn)
{
    $kartaSql = "SELECT COUNT(karta_bankare.karta_id) as nr_kartave 
                 FROM karta_bankare
                 WHERE karta_bankare.perdorues_id = '{$userId}'";
    $result = $conn->query($kartaSql);
    if ($result->num_rows < 0) {
        return 0;
    } else {
        $nrKartave = $result->fetch_assoc();
        return $nrKartave['nr_kartave'];
    }
}


/**
 * @param $userId
 * @param $conn
 * @return int
 * gjej nr e kontakteve te ruajtura nga useri
 */
function nrKontakteveTelefonike($userId, $conn)
{
    $kontakteSql = "SELECT COUNT(nr_telefoni.nr_id) as nr_kontakteve
                    FROM nr_telefoni
                    WHERE nr_telefoni.perdorues_id= '{$userId}'";
    $result = $conn->query($kontakteSql);
    if ($result->num_rows < 0) {
        return 0;
    } else {
        $nrKartave = $result->fetch_assoc();
        return $nrKartave['nr_kontakteve'];
    }
}

/**
 * @param $userId
 * @param $conn
 * @return int
 * gjej totalin e mbetur te hapesires se perdoruesit
 */
function totaliMbetur($userId, $conn)
{
    $planet = array(
        'free' => 5368709120,
        'pro' => 10737418240,
        'premium' => 21474836480
    );
    $planSql = "SELECT plan.code FROM perdorues
                INNER JOIN plan ON perdorues.plan_id = plan.plan_id
                WHERE perdorues.perdorues_id ='{$userId}'";
    $plani = $conn->query($planSql);
    $planiAktual = $plani->fetch_assoc();
    $planiAktual = $planiAktual['code'];
    $madhesiaPlanit = $planet[$planiAktual];
    $totaliZene = getUserTotalFileSize($userId, $conn);
    $totaliMbetur = $madhesiaPlanit - $totaliZene;
    return $totaliMbetur;
}

/**
 * @param $userId
 * @param $conn
 * @return mixed
 * gjej kodin e planit te perdoruesit
 */
function getUserPlan($userId, $conn)
{

    $planSql = "SELECT plan.code FROM perdorues
                INNER JOIN plan ON perdorues.plan_id = plan.plan_id
                WHERE perdorues.perdorues_id ='{$userId}'";
    $plani = $conn->query($planSql);
    $plani = $plani->fetch_assoc();
    return $plani['code'];
}