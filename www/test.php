<?php
class first {
    public $val = '654345';
}
class second {
    public $money;
    public function __construct () {
        $this->money = new first();
    }
}
$variable = new second();
echo $variable->money->val;
?>