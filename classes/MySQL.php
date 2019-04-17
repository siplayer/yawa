<?php

/**
 * MySQL class, MySQL.php
 * MySQLs de gestion
 *
 * @ l'auteur Younes ABOUTAIB
 * @version 1.0
 *
 */

define('_CAT_DEBUG_', false);

class MySQL extends Db
{
	public function	connect()
	{
		if ($this->_link = @mysql_connect($this->_server, $this->_user, $this->_password))
		{
			if(!$this->set_db($this->_database))
				die(Tools::displayError('La selection de base de donnees non établie.'));
		}
		else
			die(Tools::displayError('Lien vers la base de données ne peut être établie.'));
		/* UTF-8 support */

		if (!mysql_query('SET NAMES \'utf8\'', $this->_link))
			die(Tools::displayError("Catalogue Fatal error: pas de support UTF-8. S'il vous pla?t v?rifier votre configuration de serveur."));
		/* D?sactiver certaines restrictions sont imposées MySQL */
		mysql_query('SET GLOBAL SQL_MODE=\'\'', $this->_link);
		return $this->_link;
	}

	/* ne pas enlever, utile pour certains modules */
	public function set_db($db_name) {
		return mysql_select_db($db_name, $this->_link);
	}

	public function	disconnect()
	{
		if ($this->_link)
			@mysql_close($this->_link);
		$this->_link = false;
	}

	public function	getRow($query)
	{
		$this->_result = false;
		if ($this->_link)
			if ($this->_result = mysql_query($query.' LIMIT 1', $this->_link))
			{
				$this->displayMySQLError($query);
				return mysql_fetch_assoc($this->_result);
			}
			$this->displayMySQLError($query);
			return false;
	}

	public function	getValue($query)
	{
		$this->_result = false;
		if ($this->_link AND $this->_result = mysql_query($query.' LIMIT 1', $this->_link) AND is_array($tmpArray = mysql_fetch_assoc($this->_result)))
			return array_shift($tmpArray);
		return false;
	}

	public function	Execute($query)
	{
		$this->_result = false;
		if ($this->_link)
		{
			$this->_result = mysql_query($query, $this->_link);
			$this->displayMySQLError($query);
			return $this->_result;
		}
		$this->displayMySQLError($query);
		return false;
	}

	public function	ExecuteS($query, $array = true)
	{
		$this->_result = false;
		if ($this->_link && $this->_result = mysql_query($query, $this->_link))
		{
			$this->displayMySQLError($query);
			if (!$array)
				return $this->_result;
			$resultArray = array();
			while ($row = mysql_fetch_assoc($this->_result))
				$resultArray[] = $row;
			return $resultArray;
		}
		$this->displayMySQLError($query);
		return false;
	}

	public function nextRow($result = false)
	{
		return mysql_fetch_assoc($result ? $result : $this->_result);
	}

	public function	delete($table, $where = false, $limit = false)
	{
		$this->_result = false;
		if ($this->_link)
			return mysql_query('DELETE FROM `'.pSQL($table).'`'.($where ? ' WHERE '.$where : '').($limit ? ' LIMIT '.intval($limit) : ''), $this->_link);
		return false;
	}

	public function	NumRows()
	{
		if ($this->_link AND $this->_result)
			return mysql_num_rows($this->_result);
	}
        
        public function	NumFields()
	{
		if ($this->_link AND $this->_result)
			return mysql_num_fields($this->_result);
	}
        public function	FieldName($Num)
	{
		if ($this->_link AND $this->_result)
			return mysql_field_name($this->_result,$Num);
	}
	public function	Insert_ID()
	{
		if ($this->_link)
			return mysql_insert_id($this->_link);
		return false;
	}

	public function	Affected_Rows()
	{
		if ($this->_link)
			return mysql_affected_rows($this->_link);
		return false;
	}

	protected function q($query)
	{
		$this->_result = false;
		if ($this->_link)
			return mysql_query($query, $this->_link);
		return false;
	}

	/**
	 * Retourne le texte du message d'erreur de la derni?re op?ration MySQL
	 *
	 * @acces public
	 * @return string error
	 */
	public function getMsgError($query = false)
	{
		return mysql_error();
	}

	public function getNumberError()
	{
		return mysql_errno();
	}

	public function displayMySQLError($query = false)
	{
		if (_CAT_DEBUG_ AND mysql_errno())
		{
			if ($query)
				die(Tools::displayError(mysql_error().'<br /><br /><pre>'.$query.'</pre>'));
			die(Tools::displayError((mysql_error())));
		}
	}

	static public function tryToConnect($server, $user, $pwd, $db)
	{
		if (!$link = @mysql_connect($server, $user, $pwd))
			return 1;
		if (!@mysql_select_db($db, $link))
			return 2;
		@mysql_close($link);
		return 0;
	}

	static public function tryUTF8($server, $user, $pwd)
	{
		$link = @mysql_connect($server, $user, $pwd);
		if (!mysql_query('SET NAMES \'utf8\'', $link))
			$ret = false;
		else
			$ret = true;
		@mysql_close($link);
		return $ret;
	}
}
