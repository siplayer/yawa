<?php

class CatalogueController extends AdminController {

    public $template;
    
    public $fieldsUnique = array();

    public function __construct( $action , $value ) {
    
        $this->name     = "catalogue";	
    
        $this->errors   = array();

        $this->succes   = array();
    
        $this->nberrors = 0;
        
        $this->nbsucces = 0;
    
        $this->action   = $action;
    
        $this->value    = ( isset( $value['id'] ) ) ? $value['id'] : 0 ;
    
        return $this->$action();		
    
    }	
    
    public function index(){
		
		$this->template="Catalogue.tpl";
    
    }
    
    public function categories(){
        
        $liste_categories = Categories::getAllcategories();
    
        $this->fieldsUnique['categories'] = $liste_categories;

        $this->fieldsUnique['parents']    = 1;
    
        $this->template="Categories.tpl";
    
    }

    public function categorieadd(){

        if( Tools::isSubmit('valider') ){
        
            $categorie              = new Categories();
        
            $categorie->name        = ( isset($_POST['nom'] ) && $_POST['nom']!='') ? $_POST['nom'] : '' ;
        
            $categorie->active      = ( isset($_POST['active'] ) && $_POST['active']=="on") ? 1 : 0;

            $categorie->description = ( isset($_POST['description'] ) && $_POST['description'] != '' ) ? $_POST['description'] : '' ;
            
            $categorie->id_lang     = ( isset($_POST['langue'] ) && $_POST['langue'] != '' ) ? $_POST['langue'] : 0 ;

            $categorie->id_parent   = ( isset($_POST['parente'] ) && $_POST['parente'] != '' ) ? $_POST['parente'] : 0 ;

            $categorie->user_id     = Cookie::read('id_employee');

            $categorie->deleted     = 0;

            $categorie->date_add    = date('Y-m-d H:i:s');
            
            $categorie->color       = ( isset($_POST['color'] ) && $_POST['color']!='') ? $_POST['color'] : '' ;

            if( $categorie->name == '' ){
        
                $this->errors[] = Tools::displayError('Merci de vérifier les champs obligatoires' , 1 );
            
            }
        
            elseif( Categories::existeCategory( $categorie->name ) ){
        
                $this->errors[] = Tools::displayError('Cette catégorie existe déjà ' , 1 );
        
            }
            
            else{

                if( !$categorie->add() ){
            
                    $this->errors[] = Tools::displayError( 'Erreur de Modification' , 1 );
            
                }
                
                else{
            
                    $this->succes[] = Tools::displayError( 'Enregistrement avec succes' , 1 );			
            
                }
            
            }
            
            $this->nberrors = count($this->errors);
        
            $this->nbsucces = count($this->succes);
        
        }
        
        $liste_categories                   = Categories::getAllcategories();

        $liste_employees                    = Employee::getAllEmployees();

        $liste_langs                        = Langue::getAllLangs();
    
        $this->fieldsUnique['employees']    = $liste_employees;

        $this->fieldsUnique['categories']   = $liste_categories;

        $this->fieldsUnique['langs']        = $liste_langs;

        $this->template                     = "Categorieadd.tpl";
        
        }

        public function categorieupdate(){

            if( isset( $this->value ) && $this->value != '' ){
                
                if( Tools::isSubmit('valider') ){
                    
                    $categorie              = new Categories();
                
                    $categorie->name        = ( isset($_POST['nom'] ) && $_POST['nom']!='') ? $_POST['nom'] : '' ;
                
                    $categorie->active      = ( isset($_POST['active'] ) && $_POST['active']=="on") ? 1 : 0;
        
                    $categorie->description = ( isset($_POST['description'] ) && $_POST['description'] != '' ) ? $_POST['description'] : '' ;
                    
                    $categorie->id_lang     = ( isset($_POST['langue'] ) && $_POST['langue'] != '' ) ? $_POST['langue'] : 0 ;
        
                    $categorie->id_parent   = ( isset($_POST['parente'] ) && $_POST['parente'] != '' ) ? $_POST['parente'] : 0 ;
        
                    $categorie->user_id     = Cookie::read('id_employee');
        
                    $categorie->date_upd    = date('Y-m-d H:i:s');

                    $categorie->color       = ( isset($_POST['color'] ) && $_POST['color']!='') ? $_POST['color'] : '' ;
                
                    if( $categorie->name == '' ){
                
                        $this->errors[] = Tools::displayError('Merci de vérifier les champs obligatoires' , 1 );
                    
                    }
                    
                    else{
        
                        if( !$categorie->update( $this->value ) ){
                    
                            $this->errors[] = Tools::displayError( 'Erreur de Modification' , 1 );
                    
                        }
                        
                        else{
                    
                            $this->succes[] = Tools::displayError( 'Enregistrement avec succes' , 1 );			
                    
                        }
                    
                    }
                    
                    $this->nberrors = count($this->errors);
                
                    $this->nbsucces = count($this->succes);
                
                }
                
                $category                           = Categories::getCategory( $this->value );
                
                $liste_categories                   = Categories::getAllcategories();

                $liste_employees                    = Employee::getAllEmployees();
        
                $liste_langs                        = Langue::getAllLangs();
            
                $this->fieldsUnique['employees']    = $liste_employees;
        
                $this->fieldsUnique['categories']   = $liste_categories;
        
                $this->fieldsUnique['langs']        = $liste_langs;

                $this->fieldsUnique['category']     = $category;

                $this->template                     = "Categorieupdate.tpl";

            }
            
            else{
            
                Tools::redirect('backend/catalogue');
            
            }

        }

        public function souscategories(){
            
            $liste_categories = Categories::getAllUnderCategories( $this->value );
            
            $this->fieldsUnique['categories'] = $liste_categories;
            
            $this->fieldsUnique['parents']    = 0;

            $this->template="Categories.tpl";
        
        }

        public function caracteristics(){
        
            $listes = Caracteristique::getAllcaracteristics();
            
            $this->fieldsUnique['caracs'] = $listes;
        
            $this->template="Caracteristiques.tpl";
        
        }

        public function attributs(){

            $liste_attributs                 = Attribut::getAttributesByCaracteristique( $this->value );
            
            $this->fieldsUnique['attributs'] = $liste_attributs;
        
            $this->template="Attribut.tpl";
        
        }

        public function caracteristicadd(){

            if( Tools::isSubmit('valider') ){
            
                $caracteristic              = new Caracteristique();
            
                $caracteristic->name        = ( isset($_POST['nom'] ) && $_POST['nom']!='') ? $_POST['nom'] : '' ;
            
                $caracteristic->active      = ( isset($_POST['active'] ) && $_POST['active']=="on") ? 1 : 0;
    
                $caracteristic->description = ( isset($_POST['description'] ) && $_POST['description'] != '' ) ? $_POST['description'] : '' ;
                
                $caracteristic->id_lang     = ( isset($_POST['langue'] ) && $_POST['langue'] != '' ) ? $_POST['langue'] : 0 ;
        
                $caracteristic->id_user     = Cookie::read('id_employee');
                
                $caracteristic->deleted     = 0;

                $caracteristic->date_add    = date('Y-m-d H:i:s');
                    
                if( $caracteristic->name == '' ){
            
                    $this->errors[] = Tools::displayError('Merci de vérifier les champs obligatoires' , 1 );
                
                }
            
                elseif( Caracteristique::existeCaracteristic( $caracteristic->name ) ){
            
                    $this->errors[] = Tools::displayError('Cette caractéristique existe déjà ' , 1 );
            
                }
                
                else{
    
                    if( !$caracteristic->add() ){
                
                        $this->errors[] = Tools::displayError( "Erreur d'ajout " , 1 );
                
                    }
                    
                    else{
                
                        $this->succes[] = Tools::displayError( 'Enregistrement avec succes' , 1 );			
                
                    }
                
                }
                
                $this->nberrors = count($this->errors);
            
                $this->nbsucces = count($this->succes);
            
            }
                    
            $liste_langs                        = Langue::getAllLangs();
            
            $this->fieldsUnique['langs']        = $liste_langs;
    
            $this->template                     = "Caracteristicadd.tpl";
            
            }
    
        public function caracteristicupdate(){

            if( Tools::isSubmit('valider') ){
            
                $caracteristic              = new Caracteristique();
            
                $caracteristic->name        = ( isset($_POST['nom'] ) && $_POST['nom']!='') ? $_POST['nom'] : '' ;
            
                $caracteristic->active      = ( isset($_POST['active'] ) && $_POST['active']=="on") ? 1 : 0;
    
                $caracteristic->description = ( isset($_POST['description'] ) && $_POST['description'] != '' ) ? $_POST['description'] : '' ;
                
                $caracteristic->id_lang     = ( isset($_POST['langue'] ) && $_POST['langue'] != '' ) ? $_POST['langue'] : 0 ;

                $caracteristic->id_user     = Cookie::read('id_employee');
                        
                $caracteristic->date_upd    = date('Y-m-d H:i:s');
                    
                if( $caracteristic->name == '' ){
            
                    $this->errors[] = Tools::displayError('Merci de vérifier les champs obligatoires' , 1 );
                
                }
                
                else{
    
                    if( !$caracteristic->update( $this->value ) ){
                
                        $this->errors[] = Tools::displayError( "Erreur de modification " , 1 );
                
                    }
                    
                    else{
                
                        $this->succes[] = Tools::displayError( 'Enregistrement avec succes' , 1 );			
                
                    }
                
                }
                
                $this->nberrors = count($this->errors);
            
                $this->nbsucces = count($this->succes);
            
            }
                    
            $liste_langs                            = Langue::getAllLangs();

            $caracteristic                          = Caracteristique::getCaracteristic( $this->value );
            
            $this->fieldsUnique['langs']            = $liste_langs;

            $this->fieldsUnique['caracteristic']    = $caracteristic;
    
            $this->template                         = "Caracteristicupdate.tpl";
            
            }

    public function activateattribute(){

        $params = explode( "0" , $this->value );

        return Attribut::activate( $params );

    }
    
    public function articles(){
		$this->template = "Articles.tpl";
	}
	public function articlesadd(){
		$this->template = "AddArticles.tpl";
	}
	public function articlesupdate(){
		$this->template = "Articles.tpl";
    }
    public function reduction(){
		$this->template = "Reduction.tpl";
	}
	public function reductionadd(){
		$this->template = "AddReduction.tpl";
	}
	public function reductionupdate(){
		$this->template = "UpdateReduction.tpl";
	}
}

?>