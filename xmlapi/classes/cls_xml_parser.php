<?php
class clsXMLParser
{
    /**
     * private static function ObjectToXml
     * method used to serialize the object, recursive
     * @Params (DomElement) xml : the current DomElement object
     * @Params (Object) objData : the object holding the data
     */
    public static function ObjectToXml($doc, $xml, $objData, $nodeName = null)
    {
        $isArray = is_array($objData);
        $arrProp = $isArray ? $objData : get_object_vars($objData);
        foreach ($arrProp as $clef => $val) {
            if (is_array($val)) {
                self :: ObjectToXml ($doc, $xml, $val, $clef);
                continue;
            }
            $xmlChild = $xml -> appendChild (new DOMElement(is_null($nodeName) ? $clef : $nodeName));
            if ($isArray) $xmlChild -> setAttribute('key', $clef);
            if (is_numeric($val) || is_null($val)){
                $xmlChild -> nodeValue = (string)$val;
            } else if(is_scalar($val)) {
                /* use this code if CData section is required */
                $xmlCData = $doc->createCDATASection($val);
                $xmlChild -> appendChild ($xmlCData);
                //$xmlChild -> nodeValue = $val;
            } else { /* object */
                $xmlChild -> setAttribute('type', get_class ($val));
                self :: ObjectToXml ($doc, $xmlChild, $val);
            }
        }
    }

    /**
     * public function Serialize
     * method used to serialize the object to xml data
     * @Params (Object) objData : the input data object
     */
    public static function Serialize ($objData)
    {
        $docXml = new DOMDocument('1.0', 'utf-8');
        $xml = $docXml->createElement('data');
        $xml = $docXml->appendChild($xml);
        if (is_array($objData)) {
            $xml->setAttribute('type', 'array');
        } else {
            $xml->setAttribute('type', get_class($objData));
        }
        self::ObjectToXml($docXml, $xml, $objData);
        return ($docXml->saveHTML());
    }

    /**
     * public static function XmlToObject
     * method used to unserialize xml data to an data object
     * @Param (DOMNode) xmlNode : xmlNode contains data
     * @Param (object) objData : the result object
     */
    private static function XmlToObject ($xmlNode, &$objData) {
        $xmlNode = $xmlNode->firstChild;

        while ($xmlNode!==null){
            $xPropName = $xmlNode->nodeName;
            $xArrayKey = $xmlNode->hasAttribute('key') ? $xmlNode->getAttribute('key') : null;
            $xType     = $xmlNode->hasAttribute('type') ? strtolower($xmlNode->getAttribute('type')) : 'string';
            $xObj      = &$objData->$xPropName;

            if (!is_null($xArrayKey) && !is_array($xObj)) {
                $xObj = array();
            }

            if (!is_null($xArrayKey)) $xObj = &$xObj[$xArrayKey];
            if (!in_array($xType,array('int','string','double','date','datetime','boolean'))){
                $xObj = new $xType();
                //- parse the next level xml
                self::XmlToObject($xmlNode, $xObj);
            } else {
                //- scalar type
                $xObj = $xmlNode->nodeValue;
            }
            $xmlNode = $xmlNode->nextSibling;
        }
        return(true);
    }

    /**
     * public static function Deserialize
     * method used to unserialize the object
     * @Param (string) xml : optional xml string (an already serialized object)
     */
    public static function Deserialize ($xml = '')
    {
        clearstatcache();
        $docXml = new DOMDocument();
        if ($docXml->loadXML($xml, LIBXML_NOBLANKS|LIBXML_NOCDATA) == false) return null;
        $xmlNode = $docXml->firstChild;

        $xmlDataType = $xmlNode->getAttribute('type');
        if ($xmlDataType != 'array')
            $objData = $xmlDataType();
        else $objData = array();
        self::XmlToObject($xmlNode, $objData);
        return ($objData);
    }
}