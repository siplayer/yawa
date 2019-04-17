<?php

class Caracteristique extends ObjectModel {

	public 	    $id;
	public 	    $id_caracteristique;
	public	    $id_user;
    public		$deleted;
    public      $active;
	public      $id_lang;
	public      $name;
	public 	    $description;
	public 	    $date_add;
	public 	    $date_upd;

	protected   $table      = 'caracteristique';

	protected   $identifier = 'id_caracteristique';

    public function getFields(){
		
		parent::validateFields();
		
		if ( isset( $this->id ) ){

			$fields['id_caracteristique'] = intval( $this->id );

		}
		
		$fields['id_caracteristique'] = intval( $this->id_caracteristique );

        $fields['id_user'] 		      = intval( $this->id_user );
        
        $fields['active'] 		      = intval( $this->active );
						
		$fields['id_lang'] 		      = intval( $this->id_lang );
		
		$fields['name'] 		      = pSQL( $this->name );
		
		$fields['description'] 	      = pSQL( $this->description );
		
		$fields['date_add'] 	      = pSQL( $this->date_add );
		
		$fields['date_upd'] 	      = pSQL( $this->date_upd );
		
		$fields['deleted'] 	 	      = pSQL( $this->deleted );

		return $fields;
		
	}
    
    public static function getAllcaracteristics(){
				
				$id     = Cookie::read('id_employee');
                
				$result = Db::getInstance()->ExecuteS('
						
						SELECT *
						FROM `'._DB_PREFIX_.'caracteristique` 
						WHERE `id_user` = '.$id.' AND `deleted` = 0 ' );

				$listes = array();
				
				foreach ( $result AS &$caracteristic ){

					$attribute = Db::getInstance()->ExecuteS('
						
					SELECT count(*) as n
					FROM `'._DB_PREFIX_.'attribute` 
					WHERE `id_caracteristique` = '.$caracteristic['id_caracteristique'] );

					foreach( $attribute as $a ){

						$caracteristic["nbattr"] = $a["n"];

					}

					$listes[ $caracteristic['id_caracteristique'] ] = $caracteristic;

				}

				return $listes ;
		
		}

		public static function existeCaracteristic( $name ){
			
			if( isset( $name ) ){
			
				$result = Db::getInstance()->getRow('
						
						SELECT id_caracteristique
						FROM `'._DB_PREFIX_.'caracteristique` C WHERE C.name like "%'.$name.'%" ');
			
						return ( isset( $result['id_caracteristique']) && $result['id_caracteristique'] > 0 ) ? true : false;
				
			}
			
			else{
			
				return false;
			
			}
		
		}

		public static function getCategory( $id ){
			
				$result = Db::getInstance()->ExecuteS('
						SELECT *
						FROM '._DB_PREFIX_.'category
						WHERE md5(id_category)="'.$id.'"
						');		

				$listes = array();
				
				foreach ( $result AS &$category ){
				
					$listes[] = $category;
				
				}
				
				return $listes;
		
		}

		public static function deleteCategory( $id ){
			
			if( isset( $id ) && $id != '' ){
			
				if( Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.'category` set deleted = 1   WHERE md5(id_category)="'.$id.'"') ){
					
					return true;

				}

				else{

					return false;

				}
			
			}
			
			else{
			
				return false;
		
			}
		
		}
	
}