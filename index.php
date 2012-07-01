<?PHP
/**
 * aDVYNEFramework
 * Framework loader - acts as a single point of access to the framework
 *
 * @name aDVYNE Framework
 * @verison 0.1
 * @author John Grissom Hybrid Web Design
 */
 
// First start out session
session_start();

// set some definitions
// the applications root path, so we can easy get this path from files located in others
define( "APP_PATH", dirname( __FILE__ ) ."/" );
// we will use this to ensure scripts are not called from outside of the framework
define( "aDFW", true );

/**
 * Magic autoload function
 * used to include the appropriate -controller- files when they are needed
 *param String the name of the class
*/
function __autoload( $class_name )
{
	require_once('controllers/' . $class_name .'/' . $class_name . '.php' );
}

// require our registry
require_once('aDVYNEREGISTRY/registry.class.php');
$registry = advyneRegistry::singleton();

