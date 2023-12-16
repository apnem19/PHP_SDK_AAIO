<?php
namespace Kvash\Aaio;
class Webhook{
    private $merchant_id;
    private $orderid;
    private $amount;
    private $secret;
    private $currency;
    private $sign;
    public function __construct($merchant_id, $orderid, $amount, $secret, $sign, $currency = "RUB"){
        $this->merchant_id = $merchant_id;
        $this->orderid = $orderid;
        $this->amount = $amount;
        $this->secret = $secret;
        $this->currency = $currency;
        $this->sign = $sign;
    }

    public function check(){
        $sign = hash('sha256', implode(':', [$this->merchant_id, $this->amount, $this->currency, $this->secret, $this->orderid]));

        if (!hash_equals($this->sign, $sign)) {
            return false;
        }
        
        return true;
    }
}

?>