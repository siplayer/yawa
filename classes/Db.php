<?php

/**
 * MySQL class, MySQL.php
 * DB
 *
 * @ l'auteur Younes ABOUTAIB
 * @version 1.0
 *
 */


if (file_exists(dirname(__FILE__).'/../config/settings.inc.php'))
	include_once(dirname(__FILE__).'/../config/settings.inc.php');
include_once('MySQL.php');
abstract class Db
{
	/** @var Server (localhost ou bien adresse ip serveur) */
	protected $_server;

	/** @var user base de donne (utilisateur) */
	protected $_user;

	/** @var string base de donn�e password (eg. ne peut pas �tre vide !) */
	protected $_password;

	/** @var string type de la base de donn�e (MySQL, PgSQL) */
	protected $_type;

	/** @var string nom de la base de donn�e */
	protected $_database;

	/** @var mixte lien Ressource */
	protected $_link;

	/** @var mixte r�sultat SQL en cache */
	protected $_result;

	/** @var mixte ? */
	protected static $_db;

	/** @var par exemple l'objet mixte pour singleton */
	private static $_instance;

	/**
	 * Obtenez instance de l'objet Db
	 *
	 * @return object Db instance
	 */
	public static function getInstance()
	{
		if(!isset(self::$_instance))
			self::$_instance = new MySQL();
		return self::$_instance;
	}

	public function __destruct()
	{
		$this->disconnect();
	}

	/**
	 * Construire un objet Db
	 */
	public function __construct()
	{
		$this->_server = _DB_SERVER_;
		$this->_user = _DB_USER_;
		$this->_password = _DB_PASSWD_;
		$this->_type = _DB_TYPE_;
		$this->_database = _DB_NAME_;
		$this->connect();
	}

	/**
	 * Filtre de requ�te SQL dans une liste noire
	 *
	 * @ Param string $ table Table o� insert / update des donn�es
	 * @ Param string $ data valeurs � ins�rer / mettre � jour
	 * @ Param string $ type INSERT ou UPDATE
	 * @ Param string $ lorsque la clause WHERE, seulement pour MISE � JOUR (facultatif)
	 * @ Param string $ clause LIMIT limite (en option)
	 * @ Return mixte | bool�en r�sultat de la requ�te SQL
	 */
	public function	autoExecute($table, $values, $type, $where = false, $limit = false)
	{

		if (!sizeof($values))
			return true;

		if (strtoupper($type) == 'INSERT')
		{
			$query = 'INSERT INTO `'._DB_PREFIX_.$table.'` (';
			foreach ($values AS $key => $value)
				$query .= '`'.$key.'`,';
			$query = rtrim($query, ',').') VALUES (';
			foreach ($values AS $key => $value)
				$query .= '\''.$value.'\',';
			$query = rtrim($query, ',').')';
			if ($limit)
				$query .= ' LIMIT '.intval($limit);
				//echo $query;
			return $this->q($query);
		}
		elseif (strtoupper($type) == 'UPDATE')
		{
			$query = 'UPDATE `'._DB_PREFIX_.$table.'` SET ';
			foreach ($values AS $key => $value)
			if($key!="date_add")
				$query .= '`'.$key.'` = \''.$value.'\',';
			$query = rtrim($query, ',');
			if ($where)
				$query .= ' WHERE '.$where;
			if ($limit)
				$query .= ' LIMIT '.intval($limit);
				//echo $query;
			return $this->q($query);
		}

		return false;
	}


	/**
	 * Filtre de requ�te SQL dans une liste noire
	 *
	 * @ Param string $ table Table o� insert / update des donn�es
	 * @ Param string $ data valeurs � ins�rer / mettre � jour
	 * @ Param string $ type INSERT ou UPDATE
	 * @ Param string $ lorsque la clause WHERE, seulement pour MISE � JOUR (facultatif)
	 * @ Param string $ clause LIMIT limite (en option)
	 * @ Return mixte | bool�en r�sultat de la requ�te SQL
	 */
	public function	autoExecuteWithNullValues($table, $values, $type, $where = false, $limit = false)
	{
		if (!sizeof($values))
			return true;

		if (strtoupper($type) == 'INSERT')
		{
			$query = 'INSERT INTO `'._DB_PREFIX_.$table.'` (';
			foreach ($values AS $key => $value)
				$query .= '`'.$key.'`,';
			$query = rtrim($query, ',').') VALUES (';
			foreach ($values AS $key => $value)
				$query .= (($value === '' OR $value === NULL) ? 'NULL' : '\''.$value.'\'').',';
			$query = rtrim($query, ',').')';
			if ($limit)
				$query .= ' LIMIT '.intval($limit);
				//echo $query;
			return $this->q($query);
		}
		elseif (strtoupper($type) == 'UPDATE')
		{
			$query = 'UPDATE `'._DB_PREFIX_.$table.'` SET ';
			foreach ($values AS $key => $value)
			if($key!="date_upd" && $key != "date_add" )
				$query .= '`'.$key.'` = '.(($value === '' OR $value === NULL) ? 'NULL' : '\''.$value.'\'').',';
			$query = rtrim($query, ',');
			
			if ($where)
				$query .= ' WHERE '.$where;
			if ($limit)
				$query .= ' LIMIT '.intval($limit);
			//echo $query;	
				
			return $this->q($query);
		}

		return false;
	}

	/*********************************************************
	 * ABSTRACT METHODS
	*********************************************************/

	/**
	 * Ouverture d'une connexion
	 */
	abstract public function connect();

	/**
	 * Obtenez l'ID g�n�r� par la derni�re requ�te INSERT
	 */
	abstract public function Insert_ID();

	/**
	 * Retourne le nombre de lignes affect�es par la databse pr�c�dente
	 */
	abstract public function Affected_Rows();

	/**
	 * Obtient le nombre de lignes dans un r�sultat
	 */
	abstract public function NumRows();

	/**
	 * effacer
	 */
	abstract public function delete ($table, $where = false, $limit = false);
	/**
	 * Lit une ligne dans un jeu de r�sultats
	 */
	abstract public function Execute ($query);

	/**
	 * R�cup�re un tableau contenant toutes les lignes � partir d'un jeu de r�sultats
	 */
	abstract public function ExecuteS($query, $array = true);

	/*
	 * Get next row for a query which doesn't return an array
	*/
	abstract public function nextRow($result = false);

	/**
	 * Les Alias ??de DB :: getInstance () -> Ex�cute
	 *
	 * @ Query string acc�s La requ�te � ex�cuter
	 * @ Return array tableau de la ligne retourn�e par MySQL
	 */
	static public function s($query)
	{
		return Db::getInstance()->ExecuteS($query);
	}

	static public function ps($query)
	{
		$ret = Db::s($query);
		p($ret);
		return $ret;
	}

	static public function ds($query)
	{
		Db::s($query);
		die();
	}

	/**
	 * Obtenir la ligne et d'obtenir la valeur
	 */
	abstract public function getRow($query);
	abstract public function getValue($query);

	/**
	 * Retourne le texte du message d'erreur de l'op�ration de base de donn�es pr�c�dente
	 */
	abstract public function getMsgError();
}

/**
 * D�sinfectez les donn�es qui seront inject�s dans la requ�te SQL
 *
 * @ Param string $ string de donn�es SQL qui sera inject� dans la requ�te SQL
 * @ Param boolean $ htmlok-t-donn�es contiennent du code HTML? (facultatif)
 * Les donn�es @ return string Sanitized
 */
function pSQL($string, $htmlOK = false)
{
	if (_YS_MAGIC_QUOTES_GPC_)
		$string = stripslashes($string);
	if (!is_numeric($string))
	{
		$string = _YS_MYSQL_REAL_ESCAPE_STRING_ ? mysql_real_escape_string($string) : addslashes($string);
		if (!$htmlOK)
			$string = strip_tags(nl2br2($string));
	}

	return $string;
}

/**
 * Convertir \ n pour /> <br
 *
 * @ Param string string $ pour transformer
 * @ Return string cha�ne de New
 */
function nl2br2($string)
{
	return str_replace(array("\r\n", "\r", "\n"), '<br />', $string);
}

?>
