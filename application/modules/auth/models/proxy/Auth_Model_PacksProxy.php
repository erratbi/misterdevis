<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Auth_Model_PacksProxy extends \Auth_Model_Packs implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function addArtisan(\Auth_Model_Artisan $artisan)
    {
        $this->__load();
        return parent::addArtisan($artisan);
    }

    public function removeArtisan(\Auth_Model_Artisan $artisan)
    {
        $this->__load();
        return parent::removeArtisan($artisan);
    }

    public function __set($attr, $val)
    {
        $this->__load();
        return parent::__set($attr, $val);
    }

    public function __get($attr)
    {
        $this->__load();
        return parent::__get($attr);
    }

    public function toArray()
    {
        $this->__load();
        return parent::toArray();
    }

    public function getId_pack()
    {
        $this->__load();
        return parent::getId_pack();
    }

    public function getLibelle()
    {
        $this->__load();
        return parent::getLibelle();
    }

    public function getPrix_pack()
    {
        $this->__load();
        return parent::getPrix_pack();
    }

    public function getNbre_credit()
    {
        $this->__load();
        return parent::getNbre_credit();
    }

    public function getEconomie()
    {
        $this->__load();
        return parent::getEconomie();
    }

    public function setId_pack($id_pack)
    {
        $this->__load();
        return parent::setId_pack($id_pack);
    }

    public function setLibelle($libelle)
    {
        $this->__load();
        return parent::setLibelle($libelle);
    }

    public function setPrix_pack($prix_pack)
    {
        $this->__load();
        return parent::setPrix_pack($prix_pack);
    }

    public function setNbre_credit($nbre_credit)
    {
        $this->__load();
        return parent::setNbre_credit($nbre_credit);
    }

    public function setEconomie($economie)
    {
        $this->__load();
        return parent::setEconomie($economie);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id_pack', 'libelle', 'prix_pack', 'nbre_credit', 'economie', 'artisans');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}