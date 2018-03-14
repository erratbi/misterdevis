<?php


class Custom_LibraryAcl extends Zend_Acl {
  
  function __construct() {
    
    // >>>>>>>>>>>> Adding Roles <<<<<<<<<<<<<<<
    $this->addRole( new Zend_Acl_Role( 'guests' ) );
    $this->addRole( new Zend_Acl_Role( 'auth' ), 'guests' );
    
    // >>>>>>>>>>>> Adding Resources <<<<<<<<<<<<<<<
    
    // **** Resources for module Default *****
    $this->add( new Zend_Acl_Resource( 'default' ) );
    $this->add( new Zend_Acl_Resource( 'default:index' ), 'default' );
    $this->add( new Zend_Acl_Resource( 'default:error' ), 'default' );
    $this->add( new Zend_Acl_Resource( 'default:cron' ), 'default' );
    $this->add( new Zend_Acl_Resource( 'default:api' ), 'default' );
    
    // **** Resources for module Admin *****
    $this->add( new Zend_Acl_Resource( 'admin' ) );
    $this->add( new Zend_Acl_Resource( 'admin:index' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:devis' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:create' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:category' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:product' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:formula' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:contact' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:company' ), 'admin' );
    $this->add( new Zend_Acl_Resource( 'admin:estimate' ), 'admin' );
    
    // **** Resources for module Auth *****
    $this->add( new Zend_Acl_Resource( 'auth' ) );
    $this->add( new Zend_Acl_Resource( 'auth:index' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:api' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:login' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:logout' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:user' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:artisan' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:dashboard' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:climatisation' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:chauffage' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:fenetre' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:cuisine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:sallebain' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:sauna' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:spa' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:renovation' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:carrelage' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:isolation' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:veranda' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:abri-piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:abri-jardin' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:alarme-maison' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:anticalcaire' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:alarme-incendie' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:photovoltaique' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:construction' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:monte-escalier' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:traitement-humidite' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:traitement-nuisible' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:volets' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:station-epuration' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:etancheite' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:facade' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:charpente' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:chauffe-eau' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:traitement-charpente' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:diagnostic' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:porte-entree' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:porte-blindee' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:porte-garage' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:peinture' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:plombrie' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:geothermie' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:domotique' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:menuiserie' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:portail' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:eolienne' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:video-surveillance' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:visiophone' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:interphone' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:parquet' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:chauffage-inertie' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:chauffage-piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:cloture' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:escalier' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:ramonage' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:sol-plastique' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:demenagement-famille' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:demenagement-entreprise' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:demenagement-internationnal' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:cloison-platre' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:couverture-piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:electricite' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:entretien-piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:securite-piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:moquette' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:terrasse-piscine' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:calendar' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:poele-granule' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:terrassement' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:jardin-parc' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:architecte' ), 'auth' );
    $this->add( new Zend_Acl_Resource( 'auth:nettoyage' ), 'auth' );
    
    // >>>>>>>>>>>> Affecting Resources <<<<<<<<<<<<<<<
    
    // -------  >> module Default  << -------
    $this->allow( 'auth', 'default:index' );
    $this->allow( 'auth', 'default:error' );
    $this->allow( 'guests', 'default:cron' );
    $this->allow( 'guests', 'default:api' );
    
    // -------  >> module Auth  << -------
    $this->allow( 'auth', 'auth:index' );
    $this->allow( 'guests', 'auth:api' );
    $this->allow( 'guests', 'auth:login' );
    $this->allow( 'guests', 'auth:ramonage' );
    $this->allow( 'auth', 'auth:logout' );
    $this->allow( 'auth', 'auth:user' );
    $this->allow( 'auth', 'auth:artisan' );
    $this->allow( 'auth', 'auth:dashboard' );
    $this->allow( 'auth', 'auth:piscine' );
    $this->allow( 'auth', 'auth:climatisation' );
    $this->allow( 'auth', 'auth:chauffage' );
    $this->allow( 'auth', 'auth:fenetre' );
    $this->allow( 'auth', 'auth:cuisine' );
    $this->allow( 'auth', 'auth:sallebain' );
    $this->allow( 'auth', 'auth:sauna' );
    $this->allow( 'auth', 'auth:spa' );
    $this->allow( 'auth', 'auth:renovation' );
    $this->allow( 'auth', 'auth:carrelage' );
    $this->allow( 'auth', 'auth:isolation' );
    $this->allow( 'auth', 'auth:veranda' );
    $this->allow( 'auth', 'auth:abri-piscine' );
    $this->allow( 'auth', 'auth:abri-jardin' );
    $this->allow( 'auth', 'auth:alarme-maison' );
    $this->allow( 'auth', 'auth:alarme-incendie' );
    $this->allow( 'auth', 'auth:anticalcaire' );
    $this->allow( 'auth', 'auth:photovoltaique' );
    $this->allow( 'auth', 'auth:construction' );
    $this->allow( 'auth', 'auth:monte-escalier' );
    $this->allow( 'auth', 'auth:traitement-humidite' );
    $this->allow( 'auth', 'auth:traitement-nuisible' );
    $this->allow( 'auth', 'auth:volets' );
    $this->allow( 'auth', 'auth:station-epuration' );
    $this->allow( 'auth', 'auth:etancheite' );
    $this->allow( 'auth', 'auth:facade' );
    $this->allow( 'auth', 'auth:user' );
    $this->allow( 'auth', 'auth:charpente' );
    $this->allow( 'auth', 'auth:chauffe-eau' );
    $this->allow( 'auth', 'auth:traitement-charpente' );
    $this->allow( 'auth', 'auth:diagnostic' );
    $this->allow( 'auth', 'auth:porte-entree' );
    $this->allow( 'auth', 'auth:porte-blindee' );
    $this->allow( 'auth', 'auth:porte-garage' );
    $this->allow( 'auth', 'auth:peinture' );
    $this->allow( 'auth', 'auth:plombrie' );
    $this->allow( 'auth', 'auth:geothermie' );
    $this->allow( 'auth', 'auth:domotique' );
    $this->allow( 'auth', 'auth:menuiserie' );
    $this->allow( 'auth', 'auth:portail' );
    $this->allow( 'auth', 'auth:eolienne' );
    $this->allow( 'auth', 'auth:video-surveillance' );
    $this->allow( 'auth', 'auth:visiophone' );
    $this->allow( 'auth', 'auth:interphone' );
    $this->allow( 'auth', 'auth:parquet' );
    $this->allow( 'auth', 'auth:chauffage-inertie' );
    $this->allow( 'auth', 'auth:chauffage-piscine' );
    $this->allow( 'auth', 'auth:cloture' );
    $this->allow( 'auth', 'auth:escalier' );
    $this->allow( 'auth', 'auth:sol-plastique' );
    $this->allow( 'auth', 'auth:demenagement-famille' );
    $this->allow( 'auth', 'auth:demenagement-entreprise' );
    $this->allow( 'auth', 'auth:demenagement-internationnal' );
    $this->allow( 'auth', 'auth:cloison-platre' );
    $this->allow( 'auth', 'auth:couverture-piscine' );
    $this->allow( 'auth', 'auth:electricite' );
    $this->allow( 'auth', 'auth:moquette' );
    $this->allow( 'auth', 'auth:entretien-piscine' );
    $this->allow( 'auth', 'auth:securite-piscine' );
    $this->allow( 'auth', 'auth:terrasse-piscine' );
    $this->allow( 'auth', 'auth:calendar' );
    $this->allow( 'auth', 'auth:poele-granule' );
    $this->allow( 'auth', 'auth:terrassement' );
    $this->allow( 'auth', 'auth:jardin-parc' );
    $this->allow( 'auth', 'auth:architecte' );
    $this->allow( 'auth', 'auth:nettoyage' );
    
    // -------  >> module Admin  << -------
    $this->allow( 'auth', 'admin:index' );
    $this->allow( 'auth', 'admin:devis' );
    $this->allow( 'auth', 'admin:create' );
    $this->allow( 'auth', 'admin:category' );
    $this->allow( 'auth', 'admin:product' );
    $this->allow( 'auth', 'admin:formula' );
    $this->allow( 'auth', 'admin:contact' );
    $this->allow( 'auth', 'admin:company' );
    $this->allow( 'auth', 'admin:estimate' );
    
    // -------  >> For Custom Permissions  << -------
    $this->addResource( 'pdf' );
    $this->addResource( 'pdf facture' );
    $this->addResource( 'pdf devis' );
    $this->addResource( 'pdf bon de livraison' );
    $this->addResource( 'gestion des devis' );
    $this->addResource( 'solder' );
    $this->addResource( 'voir tous les devis' );
    $this->addResource( 'archives' );
    $this->addResource( 'devis' );
    $this->addResource( 'agenda' );
    $this->addResource( 'actions' );
    $this->addResource( 'formules' );
    $this->addResource( 'contacts' );
    $this->addResource( 'articles' );
    $this->addResource( 'catalogue' );
    $this->addResource( 'groupe' );
    $this->addResource( 'clientele' );
    $this->addResource( 'categories' );
    $this->addResource( 'permissions' );
    $this->addResource( 'entreprises' );
    $this->addResource( 'utilisateurs' );
    $this->addResource( 'catpermissions' );
    $this->addResource( 'configuration' );
    $this->addResource( 'fiche de production' );
    $this->addResource( 'remise de chèques' );
    $this->addResource( 'statistics' );
  }
  
  
}
