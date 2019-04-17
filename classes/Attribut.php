<?php

class Attribut extends ObjectModel {

	public 	    $id;
	public 	    $id_attribute;
	public 	    $active;
	public	    $id_caracteristique;
	public      $color;
    public      $position;
	public      $id_lang;
	public      $name;

	protected   $table      = 'attribute';

	protected   $identifier = 'id_attribute';

    public function getFields(){
		
		parent::validateFields();
		
		if ( isset( $this->id ) ){

			$fields['id_attribute'] = intval( $this->id );

		}
		
		$fields['id_attribute']         = intval( $this->id_attribute );

		$fields['id_caracteristique'] 	= intval( $this->id_caracteristique );
		
		$fields['color'] 		        = pSQL( $this->color );
		
		$fields['position'] 	        = intval( $this->position );
		
		$fields['active']    	        = intval( $this->active );

		$fields['id_lang'] 		        = intval( $this->id_lang );
		
		$fields['name'] 		        = pSQL( $this->name );

		return $fields;
		
	}
    
    public static function getAttributesByCaracteristique( $id ){
				
				$result = Db::getInstance()->ExecuteS('
						
						SELECT *
						FROM `'._DB_PREFIX_.'attribute` 
						WHERE md5(`id_caracteristique`) = "'.$id.'"' );

				$listes = array();
				
				foreach ( $result AS &$attribute ){

                    $listes[ $attribute['id_attribute'] ] = $attribute;

				}

				return $listes ;
		
	}

	public static function activate( $id ){

		$result = Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.'attribute` set active = 1 WHERE `id_attribute`="'.$id.'"');

	}

}