<?php

namespace Yarik\OOT;

abstract class View implements ViewInterface
{
    protected $params = [];

    abstract protected function doDisplay();

    public function display(array $parameters = [])
    {
        $this->set($parameters);
        $this->doDisplay();
    }

    public function render(array $parameters = [])
    {
        ob_start();

        $this->display($parameters);
        
        return ob_get_clean();
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function set($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $this->set($key, $value);
            }

            return $this;
        }

        $this->params[$name] = $value;

        return $this;
    }

    public function get($name)
    {
        if (!isset($this->params[$name])) {
            return null;
        }

        return $this->params[$name];
    }
}