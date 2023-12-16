<?php
namespace Kvash\Aaio;

class Create{
    private $merchant_id;
    private $orderid;
    private $amount;
    private $secret;
    private $currency;
    private $lang;

    public function __construct($merchant_id, $orderid, $amount, $secret, $currency = "RUB", $lang = "ru"){
        $this->merchant_id = $merchant_id;
        $this->orderid = $orderid;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->secret = $secret;
        $this->lang = $lang;
    }

    public function getUrl(){
        $sign = hash('sha256', implode(':', [$this->merchant_id, $this->amount, $this->currency, $this->secret, $this->orderid]));

        return 'https://aaio.io/merchant/pay?' . http_build_query([
            'merchant_id' => $this->merchant_id,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'order_id' => $this->orderid,
            'sign' => $sign,
            'lang' => $this->lang
        ], '&');
    }
}

?>