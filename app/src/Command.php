<?php
namespace CMSApp\src;

abstract class Command{
    abstract function __construct($options = array());
    abstract function perform();
}