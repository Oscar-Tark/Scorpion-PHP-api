<?php
class Servicegetset
{
    function set_user($uname, $passwd)
    {
        global $sql_user;
        $sql_user['USER'] = $uname;
        $sql_user['PASS'] = $passwd;
        return 1;
    }

    function set_url($host, $port, $db, $table, $ky)
    {
        global $service_elements;
        $service_elements['HOST'] = $host;
        $service_elements['PORT'] = $port;
        $service_elements['DB'] = $db;
        $service_elements['TABLE'] = $table;
        $service_elements['KY'] = $ky;
        return 1;
    }

    function get_url()
    {
        global $service_elements;
        return $service_elements['HOST'] . ":" . $service_elements['PORT'];
    }
}
?>