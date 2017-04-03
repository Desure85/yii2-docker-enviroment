<?php
namespace common\lib\interfaces;

interface  Parser{
    public function load($file);
    public function parseBalance();
    public function parseCommision();
}