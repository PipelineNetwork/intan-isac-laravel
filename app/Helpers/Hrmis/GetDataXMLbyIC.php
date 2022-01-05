<?php

namespace App\Helpers\Hrmis;

use Exception;
use SimpleXMLElement;
use SoapClient;
use SoapHeader;
use SoapVar;

class GetDataXMLbyIC
{
    function AddWSSUsernameToken($client, $username, $password)
    {
        $wssNamespace = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";

        $username = new SoapVar(
            $username,
            XSD_STRING,
            null,
            null,
            'Username',
            $wssNamespace
        );

        $password = new SoapVar(
            $password,
            XSD_STRING,
            null,
            null,
            'Password',
            $wssNamespace
        );

        $usernameToken = new SoapVar(
            array($username, $password),
            SOAP_ENC_OBJECT,
            null,
            null,
            'UsernameToken',
            $wssNamespace
        );

        $usernameToken = new SoapVar(
            array($usernameToken),
            SOAP_ENC_OBJECT,
            null,
            null,
            null,
            $wssNamespace
        );

        $wssUsernameTokenHeader = new SoapHeader($wssNamespace, 'Security', $usernameToken);

        $client->__setSoapHeaders($wssUsernameTokenHeader);
    }

    public function getDataHrmis($ICNO = null)
    {
        $soapServer = "https://perkongsiandata.eghrmis.gov.my/wsintegrasi/dataservice.asmx?wsdl";
        $username = "761114145723";
        $password = "safian@123";
        $arrContextOptions = array("ssl" => array("verify_peer" => false, "verify_peer_name" => false));

        $options = array(
            'soap_version' => 'SOAP_1_2',
            'exceptions' => true,
            'trace' => 1,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'stream_context' => stream_context_create($arrContextOptions),
            'login' => $username,
            'password' => $password,
        );

        $params = array(
            "icno" => $ICNO,
            "datatypes" => [
                "NamaAgensi" => "INTAN"
            ]
        );

        try {
            // libxml_disable_entity_loader(false);
            $client = new SoapClient($soapServer, $options);
            $this->AddWSSUsernameToken($client, $username, $password);
            // libxml_disable_entity_loader(true);

            $response = $client->GetDataXMLbyIC($params);

            if ($response->GetDataXMLbyICResult) {
                // Convert xml to object
                $sxe = new SimpleXMLElement($client->__getLastResponse());
                $sxe->registerXPathNamespace('d', 'urn:schemas-microsoft-com:xml-diffgram-v1');

                $tables = $sxe->xpath('//Table[@d:id="Table1"]');

                if (count($tables) > 0) {
                    return $tables[0];
                } else {
                    return 'Tiada maklumat HRMIS dijumpai';
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
