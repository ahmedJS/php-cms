<?php
namespace CMSApp\src;

use Exception;
use PhpParser\Node\Expr\Isset_;

// make generate class function and perform logic
class RunCommand extends Command{
    /**
     * @var String $default_webclass_distination
     * specifying the default distination of the classes file
     */
    private $default_webclass_distination = __DIR__."/../website_classes/";
    
    function __construct(private $options = array())
    {
        if(!isset($options["config"]["website_class_distination"])){
            $this->options["config"]["website_class_distination"]
            = $this->default_webclass_distination;
        };
    }

    function perform()
    {
        // fetch the file
        $file = file_get_contents(__dir__."/../../cms-app-config.json");

        // get the classes
        $classes = $this->json2class($file);
        
        foreach($classes as $class){
            foreach($class as $className => $script_text){
                $this->generateClass
                (
                    $script_text
                    ,$this->options["config"]["website_class_distination"]
                    .$className.".php"
                );
            }
        }
    }

    /**
     * 
     * @param String $file json text file
     * jsonFile Have to be of  " class " : {property : prop_value ... }
     * @return Array[][] contains php classes ( name && script )
     */
    function json2class(string $file){

        $classes = json_decode($file);
        
        $processedClasses = [];
        
        foreach($classes as $class => $properties) 
        {
            /**
             * @var $propertiesMeta the actual line of the property in class
             */
            $propertiesMeta = "";
            
            /**
             * @var Array $class_meta contains class details
             */
            $class_meta = [];

            foreach($properties as $property => $value)
            {
                $propertiesMeta .= 'public $'.$property.' = "'.$value.'"; ';
            }

            /**
             * @var String $script the final script of the class
             */

            $script =  '
            <?php
               namespace CMSApp\generatedClasses;
               class '.$class.' {
                   '.$propertiesMeta.'
               }
           ';
            $class_meta[$class] = $script;

            array_push($processedClasses,$class_meta);
        }
        return $processedClasses;
    }

    /**
     * generate php script file (Class)
     * @var string $script the script to store on
     * @var string $full_file_destination the path that is file stored on
     * @throws Exception when file is already exist
     */
    function generateClass($script , $full_file_destination ) {
        
        if(@file_get_contents($full_file_destination))
        {
            throw new Exception("one of the classes is already registered");
        }

        file_put_contents($full_file_destination ,$script );
    }
}