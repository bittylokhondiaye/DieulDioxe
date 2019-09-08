<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Partenaire extends \App\Entity\Partenaire implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Prenom', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Nom', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'password', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Telephone', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'CNI', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'NINEA', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Adresse', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'RaisonSocial', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'UserPartenaire', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'superAdmin', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Email', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'users'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Prenom', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Nom', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'password', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Telephone', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'CNI', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'NINEA', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Adresse', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'RaisonSocial', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'UserPartenaire', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'superAdmin', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'Email', '' . "\0" . 'App\\Entity\\Partenaire' . "\0" . 'users'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Partenaire $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getPrenom(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrenom', []);

        return parent::getPrenom();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrenom(string $Prenom): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrenom', [$Prenom]);

        return parent::setPrenom($Prenom);
    }

    /**
     * {@inheritDoc}
     */
    public function getNom(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNom', []);

        return parent::getNom();
    }

    /**
     * {@inheritDoc}
     */
    public function setNom(string $Nom): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNom', [$Nom]);

        return parent::setNom($Nom);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(string $password): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelephone(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelephone', []);

        return parent::getTelephone();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelephone(int $Telephone): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelephone', [$Telephone]);

        return parent::setTelephone($Telephone);
    }

    /**
     * {@inheritDoc}
     */
    public function getCNI(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCNI', []);

        return parent::getCNI();
    }

    /**
     * {@inheritDoc}
     */
    public function setCNI(int $CNI): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCNI', [$CNI]);

        return parent::setCNI($CNI);
    }

    /**
     * {@inheritDoc}
     */
    public function getNINEA(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNINEA', []);

        return parent::getNINEA();
    }

    /**
     * {@inheritDoc}
     */
    public function setNINEA(int $NINEA): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNINEA', [$NINEA]);

        return parent::setNINEA($NINEA);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdresse(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdresse', []);

        return parent::getAdresse();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdresse(string $Adresse): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdresse', [$Adresse]);

        return parent::setAdresse($Adresse);
    }

    /**
     * {@inheritDoc}
     */
    public function getRaisonSocial(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRaisonSocial', []);

        return parent::getRaisonSocial();
    }

    /**
     * {@inheritDoc}
     */
    public function setRaisonSocial(string $RaisonSocial): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRaisonSocial', [$RaisonSocial]);

        return parent::setRaisonSocial($RaisonSocial);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserPartenaire(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserPartenaire', []);

        return parent::getUserPartenaire();
    }

    /**
     * {@inheritDoc}
     */
    public function addUserPartenaire(\App\Entity\UserPartenaire $userPartenaire): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUserPartenaire', [$userPartenaire]);

        return parent::addUserPartenaire($userPartenaire);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUserPartenaire(\App\Entity\UserPartenaire $userPartenaire): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUserPartenaire', [$userPartenaire]);

        return parent::removeUserPartenaire($userPartenaire);
    }

    /**
     * {@inheritDoc}
     */
    public function getSuperAdmin(): ?\App\Entity\SuperAdmin
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSuperAdmin', []);

        return parent::getSuperAdmin();
    }

    /**
     * {@inheritDoc}
     */
    public function setSuperAdmin(?\App\Entity\SuperAdmin $superAdmin): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSuperAdmin', [$superAdmin]);

        return parent::setSuperAdmin($superAdmin);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(string $Email): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$Email]);

        return parent::setEmail($Email);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsers', []);

        return parent::getUsers();
    }

    /**
     * {@inheritDoc}
     */
    public function addUser(\App\Entity\User $user): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUser', [$user]);

        return parent::addUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUser(\App\Entity\User $user): \App\Entity\Partenaire
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUser', [$user]);

        return parent::removeUser($user);
    }

}
