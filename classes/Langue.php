<?php

class Langue extends ObjectModel {

	public 	    $id;
	public 	    $id_lang;
	public	    $iso_code;
	public      $active;
	public      $language_code;
	public      $name;
	public 	    $locale;
	public 	    $date_format_lite;
	public 	    $date_format_full;
    public      $is_rtl;

	protected   $table      = 'lang';

	protected   $identifier = 'id_lang';
    
    public function getFields(){
		
		parent::validateFields();
		
		if ( isset( $this->id ) ){

			$fields['id_lang'] = intval( $this->id );

		}
		
		$fields['iso_code'] 	     = intval( $this->iso_code );

		$fields['user_id'] 		     = intval( $this->user_id );
		
		$fields['active'] 		     = intval( $this->active );
		
		$fields['language_code'] 	 = intval( $this->language_code );
				
		$fields['name'] 			 = pSQL( $this->name );
		
		$fields['locale']            = pSQL( $this->locale );
		
		$fields['date_format_lite']  = pSQL( $this->date_format_lite );
		
		$fields['date_format_full']  = pSQL( $this->date_format_full );
        
        $fields['is_rtl'] 	         = pSQL( $this->is_rtl );

		return $fields;
		
	}
    
    public static function getAllLangs(){
				
				$result = Db::getInstance()->ExecuteS('
						
						SELECT *
						FROM `'._DB_PREFIX_.'lang` ' );

				$listes = array();
				
				foreach ( $result AS &$lang ){

					$listes[ $lang['id_lang'] ] = $lang;

				}

				return $listes;
		
		}

}