<?php
namespace CMSApp\src;


class RunCommand extends Command{

    function __construct(private $options = array())
    {
    }

    function perform()
    {
        $file = file_get_contents("../../cms-app-config.json");
        
    }
}