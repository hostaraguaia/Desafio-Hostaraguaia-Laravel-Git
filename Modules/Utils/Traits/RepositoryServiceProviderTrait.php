<?php

namespace Modules\Utils\Traits;

trait RepositoryServiceProviderTrait
{
    protected function registerRepository(string $path,string $folder)
    {
        $pathRepositories   = str_replace('/','\\', config('repository.generator.paths.repositories'));
        $pathInterfaces     = str_replace('/','\\', config('repository.generator.paths.interfaces'));
        $tempFiles          = glob( "{$pathInterfaces}/*php" );


        foreach($tempFiles as $file){

            $repository     = pathinfo($file)['filename'];
            $interface      = "{$folder}/{$pathInterfaces}/{$repository}";
            $eloquent       = "{$folder}/{$pathRepositories}/Eloquent/{$repository}Eloquent";
            
            app()->bind($interface, $eloquent);
        }
    }

    protected function registerLocalRepository($pathInterfaces)
    {
        $repositories = glob( "$pathInterfaces/*php" );
        $eloquents = glob( "{$pathInterfaces}/Eloquent/*php" );

        foreach($repositories as $repository)
        {
            $filename = pathinfo($repository)['filename'];
            $repository = $this->getClassesFromFile($repository);

            foreach($eloquents as $eloquent){

                $contains = str_contains($eloquent, $filename);
                if($contains)
                {
                    $eloquent = $this->getClassesFromFile($eloquent);
                    app()->bind($repository, $eloquent);
                }
            }
        }
    }

    /**
     * Get full class names declared in the specified file.
     *
     * @param string $filename
     * @return array an array of class names.
     */
    protected function getClassesFromFile(string $filename)
    {
        // Get namespace of class (if vary)
        $namespace = "";
        $lines = file($filename);
        $namespaceLines = preg_grep('/^namespace /', $lines);
        if (is_array($namespaceLines)) {
            $namespaceLine = array_shift($namespaceLines);
            $match = [];
            preg_match('/^namespace (.*);$/', $namespaceLine, $match);
            $namespace = array_pop($match);
        }

        $class_name = pathinfo($filename)['filename'];
        $class_name = $namespace . "\\$class_name";

      
        return $class_name;
    }
}
