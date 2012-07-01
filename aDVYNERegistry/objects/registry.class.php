<?PHP 
/*
Registry.class.php
@name aDVYNE Framework
@verison 0.1
@author John Grissom Hybrid Web Design
*/

class advyneRegistry {
	
	/**
	 * Our array of objects
	 * @accress private
	 */
	 
	 private static $objects = array();
	 
	 /**
	  * Our Array of settings
	  * @access private
	  */
	  
	  private static $settings = array();
	  
	 /**
	  * The frameworks human readable name
	  * @acess private
	  */
	  
	  private static $frameworkName = 'aDVYNE Framework 0.1';
	  
	  /**
	   * The instance of the registry
	   * @access private
	   */
	   
	   private static $instance;
	   
	   /**
	    * Private constructor to prevent it being created directly
		* @access private
		*/
		
		private function __construct()
		{
			
		}
		
		/**
		 * method used to access the object
		 * @access public 
		 * @return
		 */
		 
		 public static function singleton()
		 {
			 if( !isset( self::$instance ) )
			 {
				 $obj = __CLASS__;
				 slef::$instance = new $obj;
			 }
			 
			 return self::$instance;
		 }
		 
		 /**
		  * prevent cloning of the object: issues and E_USER_ERROR if this is attempted
		  */
		  public function __clone()
		  {
			  trigger_error( 'Cloning the registry is not permitted', E_USER_ERROR );
		  }
		  
		  /**
		   * Stores an object in the registry 
		   * @param String @object the name of the object
		   * @param String $key the key for the array
		   * @return void
		   */
		   
		   public function storeObject( $object, $key )
		   {
			   require_once('objects/' . $object . '.class.php');
			   self::$objects[ $key ] = new $object( self::$instance ); 
		   }
		   
		   
		   /**
		    * gets the object from the registry
			* @param String $key the array key
			* @ return object
			*/
			public function getObject( $key )
			{
				if( is_object ( self::$objects[ $key ] ) )
				{
					return self::$objects[ $key ];
				}
			}
			
			/**
			 * Stores settings in the registry
			 * @param String $data
			 * @param String $key the key for the array
			 * @return void
			 */
			 
			 public function storeSetting( $data, $key )
			 {
				 self::$settings[ $key ] = $data;
			 }
			 
			 /** 
			  * Gets a settings from the registry
			  * @param String $key the key in the array
			  * @return void
			  */
			  
			  public function getSetting( $key )
			  {
				  return self::$settings[ $key ];
			  }
			  
			  /**
			   * Gets the Framework name
			   * @return String
			   */
			   
			   public function getFrameworkName()
			   {
				   return self::$frameworkName;
			   }
			   
}
?>