<?php

// define classes in here
class ClientLocationInfo{

    var $country;
    var $state;
    var $areacode;
    var $found = false;
    function toString()
    {
        return sprintf("%s:%s:%s", $this->country, $this->state, $this->areacode);
    }
    function toHTML()
    {
        return sprintf("Country : %s<br>State : %s<br>Areacode : %s<br>", $this->country, $this->state, $this->areacode);
    }
    function isValid()
    {
        // we need to have values in country, state and areacode to be a valid "find"
        if(0 < strlen($this->country) && 0 < strlen($this->state) && 0 < strlen($this->areacode))
            $this->found = true;
        return $this->found;
    }

}








?>