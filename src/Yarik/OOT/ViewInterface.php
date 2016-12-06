<?php

namespace Yarik\OOT;

interface ViewInterface
{
    public function render(array $parameters = []);

    public function display(array $parameters = []);
}