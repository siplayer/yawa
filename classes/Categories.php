<?php

class Categories extends ObjectModel {

	public 	    $id;
	public 	    $id_parent;
	public	    $user_id;
	public      $active;
	public			$deleted;
	public      $position;
	public      $id_lang;
	public      $name;
	public 	    $description;
	public 	    $date_add;
	public 	    $date_upd;
	public 			$color;

	protected   $table      = 'category';

	protected   $identifier = 'id_category';

    public function getFields(){
		
		parent::validateFields();
		
		if ( isset( $this->id ) ){

			$fields['id_category'] = intval( $this->id );

		}
		
		$fields['id_parent'] 	 = intval( $this->id_parent );

		$fields['user_id'] 		 = intval( $this->user_id );
		
		$fields['active'] 		 = intval( $this->active );
		
		$fields['position'] 	 = intval( $this->position );
		
		$fields['id_lang'] 		 = intval( $this->id_lang );
		
		$fields['name'] 		 = pSQL( $this->name );
		
		$fields['description'] 	 = pSQL( $this->description );
		
		$fields['date_add'] 	 = pSQL( $this->date_add );
		
		$fields['date_upd'] 	 = pSQL( $this->date_upd );
		
		$fields['color'] 	 	 = pSQL( $this->color );

		$fields['deleted'] 	 	 = pSQL( $this->deleted );

		return $fields;
		
	}
    
    public static function getAllcategories(){
				
				$id     = Cookie::read('id_employee');

				$result = Db::getInstance()->ExecuteS('
						
						SELECT *
						FROM `'._DB_PREFIX_.'category` 
						WHERE `user_id` = '.$id.' AND id_parent=0  AND `deleted` = 0 ' );

				$listes = array();
				
				foreach ( $result AS &$categorie ){
						$listes[ $categorie['id_category'] ] = $categorie;
				}

				return $listes;
		
		}

		public static function existeCategory( $name ){
			
			if( isset( $name ) ){
			
				$result = Db::getInstance()->getRow('
						
						SELECT pro_id
						FROM `'._DB_PREFIX_.'category` C WHERE C.name like "%'.$name.'%" ');
			
						return ( isset( $result['id_category']) && $result['id_category'] > 0 ) ? true : false;
				
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

		public static function getAllUnderCategories( $id ){
			if(isset($id) && $id!=''){
				$result = Db::getInstance()->ExecuteS('	
						SELECT *
						FROM `'._DB_PREFIX_.'category` 
						WHERE md5(id_parent) = "'.$id.'" AND `name`!="" AND `deleted` = 0 ' );

				$listes = array();
				
				foreach ( $result AS &$categorie ){

					$listes[ $categorie['id_category'] ] = $categorie;

				}

				return $listes;
			}else{
				return false;
			}
			
	
	}

}