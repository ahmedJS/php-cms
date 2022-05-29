<?php
namespace CMSApp\src;

use CMSApp\src\Exceptions\InvalidCommandExceptino;
use CMSApp\src\Command;

class CMS {

    function __construct()
    {
        
    }

    function performCommand( string $command){
        
        $command = $this->commandInterpret($command);
        $command->perform();
    }

    // reading command as well as return Instance of it
    // this is factory method
    function commandInterpret(string $command)
    {
        $command = explode(" ",$command);
        
        if(count($command) < 1){
            throw new InvalidCommandExceptino("enter command , you can run --help");
        }
        else
        {
            $first_command = array_shift($command);

            $options = $command;

                if($first_command == "create") return new RunCommand($options);
        }

        // dont stay it upward - it have to replace of null pattern object
        return NULL;
    }
}
    