<?php

namespace Models;

require_once __DIR__ . "/Model.php";

use Models\Model;

class Visitor extends Model
{
    protected $table = "visitors";

    public function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function visitor(): array
    {
        $visitorData = [
            'ip' => $this->getIPAddress(),
            'useragnt' => $_SERVER['HTTP_USER_AGENT'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $visitorData['host_of_ip'] = gethostbyaddr($visitorData['ip']);
        if (function_exists("geoip_asnum_by_name")) {
            $visitorData['asn'] = geoip_asnum_by_name($visitorData['host_of_ip']);
        } else {
            $visitorData['asn'] = "Please Install Pecl To Use geoip_asnum_by_name Function";
        }

        if (function_exists("geoip_country_name_by_name")) {
            $visitorData['country'] = geoip_country_name_by_name($visitorData['host_of_ip']);
        } else {
            $visitorData['country'] = "Please Install Pecl To Use geoip_country_name_by_name Function";
        }

        return $this->insert($visitorData);
    }
}