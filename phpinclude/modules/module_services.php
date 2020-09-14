<?php
class Services
{
    function create_settings($session_service, $extension)
    {
        global $service_elements;
        $service_elements['SRV'] = $session_service;
        $service_elements['SRV_fix'] = $extension;
        return;
    }
}
?>