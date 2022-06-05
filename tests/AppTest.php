<?php
use PHPUnit\Framework\TestCase;
use CMSApp\src\RunCommand;

class AppTest extends TestCase{
    function testSomething(){
        $command = new RunCommand();
        $command->perform();
    }
}