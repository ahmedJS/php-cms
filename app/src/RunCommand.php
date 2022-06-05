<?php
namespace CMSApp\src;


class RunCommand extends Command{

    function __construct(private $options = array())
    {
    }

    function perform()
    {
        $file = file_get_contents(__dir__."/../../cms-app-config.json");

        $this->json2class($file);
     
    }

    /**
     * @param string $file json text file
     * @return String[] contains php classes
     */
    function json2class(string $file){

        $classes = json_decode($file);
        
        $processedClasses = [];
        
        foreach($classes as $class => $properties) 
        {
            $propertiesMeta = "";

            foreach($properties as $property => $value)
            {
                $propertiesMeta .= 'public '.$property.' = "'.$value.'"; ';
            }

            
            $class_meta =  '
             <?php
                namespace CMSApp\generatedClasses;
                class '.$class.' {
                    '.$propertiesMeta.'
                }
            ';
            array_push($processedClasses,$class_meta);
        }
        return $processedClasses;
    }
}