<?php
/**
 * Custom Auth Adapter method
 *
 * @author          Lamari Alaa
 */
class Custom_Auth_Adapter implements Zend_Auth_Adapter_Interface
{
    /**
     * constructor  method
     *
     * @author          Lamari Alaa
     * @param           void
     * @return           void
     *
     */
    public function __construct($model , $hash, $data)
    {
        $this->model= $model;
        $this->hash = $hash;
        $this->data = $data;
    }

    /**
     * authentication method
     *
     * @author          Lamari Alaa
     * @param           void
     * @return           void
     *
     */
    public function authenticate() 
    {
        # attempt to authenticate
        $account = $this->model->authenticate($this->hash, $this->data);
    	 

        # check results
        if (count($account) > 0) {
            $status = Zend_Auth_Result::SUCCESS;
        } else {
            $status = Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND;
        }

        # return results
        $result = new Zend_Auth_Result($status, serialize($account));
        return $result;
    }

}