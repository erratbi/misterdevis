<?php
/**
 * Event action helper
 *
 *
 * @author          Lamari Alaa
 * @package       Auth Module
 *
 */
class Auth_Controller_Helper_Convert extends Zend_Controller_Action_Helper_Abstract
{

    /**
     * Record event
     *
     * @author          Lamari Alaa
     * @param           string $event name of the event to record
     * @param           int $user_id id of the user generating the event
     * @param           \Doctrine\ORM\EntityManager $_em (optional) entity manager.
     * @return           void
     *
     */
	public function toClass($class, $data)
	{
		
		if(!is_object($class)){
			$object = new $class;
		} else {
		    $object = $class;
		}
		
		foreach($data as $key => $value){
			if (strpos($key, "Model_") !== false){
			  $_em = Zend_Registry::get('EntityManager');
			  $newObj = $_em->getRepository($key)->find($value);
			  
			  if(is_object($newObj)){
			  	if(method_exists($object,'set' . ucfirst(str_replace($key, "", "Model_")))){
			  		$object->{'set' . ucfirst(str_replace($key, "", "Model_"))}($value);
			  	}
			  }
			} else {
				if(method_exists($object,'set' . ucfirst($key))){
					$object->{'set' . ucfirst($key)}($value);
				} 
			}
		}
		return $object;
	}
	
}