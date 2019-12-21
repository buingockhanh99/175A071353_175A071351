<?php
namespace Vbt;
use Exception;
/**
 * Autoload class with namespace support.
 * 
 * @author Santiago Rincón <rincorpes@gmail.com>
 * @link https://twitter.com/rincorpes
 * @version 1.0.0
 */
class Autoload
{
    /**
     * Saves the namespace
     *
     * @var string
     */
    private $_namespace;
    /**
     * Saves the app path
     *
     * @var string
     */
    private $_includePath;
    /**
     * The class constructor.
     * 
     * Assign its relevant value to each property
     *
     * @param string $ns The namespace to use
     * @param string $includePath The path for the namespace
     */
    public function __construct($namespace = null, $includePath = null)
    {
        $this->_namespace = $namespace;
        $this->_includePath = $includePath;
        $this->register();
    }
    /**
     * Register this class loader ($this->loadClass) on the SPL autoload stack.
     *
     * @uses spl_autoload_register()
     */
    private function register(){
        spl_autoload_register(array($this, 'loadClass'));
    }
    /**
     * Load the given class.
     *
     * @param string $className The name for the class to load.
     * @return void
     */
    private function loadClass($className)
    {
        // Does the class uses namespace
        $len = strlen($this->_namespace);
        if (strncmp($this->_namespace, $className, $len) != 0) {
            // negative, move to the next registered autoloader
            throw new Exception('Class ' . $className . ' use not defined in ' . $this->_namespace, 1);
            return;
        }
        // get the relative class name
        $relativeClass = substr($className, $len);
        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $this->_includePath . str_replace('\\', '/', strtolower($relativeClass)) . '.php';
        // if the file exists, require it
        if (file_exists($file))
            require $file;
        else
             throw new Exception('The class ' . $className . ' does not exists.', 1);
    }
}
?>