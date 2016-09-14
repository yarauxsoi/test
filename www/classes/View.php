<?php
namespace App\classes;
use Countable;
use Iterator;
class View implements Countable, Iterator {
    protected $data = [];
    protected $position = 0;
    public function __set($k, $v) {
        $this->data[$k] = $v;
    }
    public function __get($k) {
        return $this->data[$k];
    }
    public function count() {
        return count($this->data);
    }
    public function current() {
        return current($this->data);
    }
    public function key() {
        return key($this->data);
    }
    public function next() {
        next($this->data);
    }
    public function rewind() {
        reset($this->data);
    }
    public function valid() {
        $key = key($this->data);
        return ($key !== false && $key !== NULL);
    }
    protected function render($template) {
        foreach ($this->data as $key=>$val) {
            $$key = $val;
        }
        ob_start();
        include __DIR__ . '/../view/' . $template . '.php';
        $template = ob_get_contents();
        ob_end_clean();
        return $template;
    }
    public function display($template) {
        echo $this->render($template);
    }
}
?>