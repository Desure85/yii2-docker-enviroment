<?php
namespace common\lib\classes\parser;

use common\lib\interfaces\Parser;

Class ParseHtml extends AbstractParser implements Parser {

    public function parseBalance(){
        $xpdata = new \DOMXPath($this->dom);
        $xpathQuery = './/tr[td[1][sum(text()) > 0]]/td[last()]/text()';
        $result = [];
        $data = $xpdata->query($xpathQuery, $this->dom);
        for($i=0; $i < $data->length; $i++){
            $value = (float)trim(preg_replace('~\s+~s', '', $data->item($i)->textContent));
            if(!$result){
                $result[] = $value;
            }else{
                $result[] = $result[$i-1] + $value;
            }
        }
        return $result;
    }
    public function parseCommision(){
        $xpdata = new \DOMXPath($this->dom);
        $xpathQuery = './/tr[td[1][sum(text()) > 0]]/td[11]/text()';
        $result = [];
        $datacom = $xpdata->query($xpathQuery, $this->dom);
        for($i=0; $i < $datacom->length; $i++){
            $valuecom = (float)trim(preg_replace('~\s+~s', '', $datacom->item($i)->textContent));
            $result[] =  $valuecom;
        }
        return $result;
    }
}