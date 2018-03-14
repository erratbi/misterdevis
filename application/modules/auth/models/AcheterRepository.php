<?php
/**
 * Account Repository
 */

use Doctrine\ORM\EntityRepository;
class Auth_Model_AcheterRepository extends EntityRepository
{
   public function saveAchat($artisan,$demande,$mode){
	   
	   $acheter  = new Auth_Model_Acheter;
	   
	   $acheter->id_artisan=$artisan->getId_artisan();
	   $acheter->id_demande=$demande->getId_demande();
	   $acheter->artisan=$artisan;
	   $acheter->demande=$demande;
	   $acheter->mode_paiement=$mode;
	   
	   
	   
	   $this->_em->persist( $acheter );
	   $this->_em->flush();
    
		return $acheter;
	   
   }

   public function getData($artisan,$mois,$annee){

   	 $emConfig = $this->_em->getConfiguration();
     $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
     $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
     $emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

   	return $this->createQueryBuilder( 'a' )
   				 ->innerJoin('a.demande','d')
                 ->select( 'd.id_demande,a.date_achat, a.mode_paiement,d.prix_mise_en_ligne' )
                 ->where('a.id_artisan =:id_artisan')
                 ->andWhere('YEAR(a.date_achat)=:year')
                 ->andWhere('MONTH(a.date_achat)=:month')
                 ->setParameter('id_artisan',$artisan)
                 ->setParameter('year',$annee)
                 ->setParameter('month',$mois)
                 ->getQuery()
                 ->getResult( 2 );


   }
}