<?php

/**
 * MySQL class, MySQL.php
 * OBJECT
 *
 * @ l'auteur Younes ABOUTAIB
 * @version 1.0
 *
 */
abstract class ObjectModel
{
	
	public $id;

	
	protected $table = NULL;

	
	protected $identifier = NULL;

	
	protected $fieldsRequired = array();

	
	protected $fieldsSize = array();

	
	protected $fieldsValidate = array();

	
	protected $fieldsRequiredLang = array();

	
	protected $fieldsSizeLang = array();

	
	protected $fieldsValidateLang = array();

	
	protected $tables = array();
	
	public $template;
	public $contenu = array();
	public $topic = array();
	public $type = array();
	public $fieldsUnique = array();
	public $erreur = '';

	static public function getValidationRules($className = __CLASS__)
	{
		$object = new $className();
		return array(
				'required' => $object->fieldsRequired,
				'size' => $object->fieldsSize,
				'validate' => $object->fieldsValidate,
				'requiredLang' => $object->fieldsRequiredLang,
				'sizeLang' => $object->fieldsSizeLang,
				'validateLang' => $object->fieldsValidateLang);
	}


	public function getFields()	{
		return array();
	}


	public function __construct($id = NULL, $id_lang = NULL)
	{
		
		/*if (!Validate::isTableOrIdentifier($this->identifier) OR !Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());
		$this->identifier = $this->identifier;*/

		
		if ($id)
		{
			$result = Db::getInstance()->getRow('
					SELECT *
					FROM `'._DB_PREFIX_.$this->table.'` a '.
					($id_lang ? ('LEFT JOIN `'.pSQL($this->table).'_lang` b ON (a.`'.$this->identifier.'` = b.`'.$this->identifier).'` AND `id_lang` = '.intval($id_lang).')' : '')
					.' WHERE a.`'.$this->identifier.'` = '.intval($id));
			if (!$result) return false;
			$this->id = intval($id);
			foreach ($result AS $key => $value)
				if (key_exists($key, $this))
				$this->{$key} = stripslashes($value);

			if (!$id_lang AND method_exists($this, 'getTranslationsFieldsChild'))
			{
				$sql = 'SELECT * FROM `'.pSQL($this->table).'_lang` WHERE `'.$this->identifier.'` = '.intval($id);
				$result = Db::getInstance()->ExecuteS($sql);
				$defaultLang = intval(Configuration::get('PS_LANG_DEFAULT'));
				if ($result)
					foreach ($result as $row)
					foreach ($row AS $key => $value)
					if (key_exists($key, $this) AND $key != $this->identifier)
					$this->{$key}[$row['id_lang']] = stripslashes($value);
			}
		}
	}

	public function save($nullValues = false, $autodate = true)
	{
		return intval($this->id) > 0 ? $this->update($nullValues) : $this->add($autodate, $nullValues);
	}


	public function add($autodate = true, $nullValues = false)
	{
		if (!Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());


		$this->date_add = date('Y-m-d H:i:s');

		if ($nullValues)
			$result = Db::getInstance()->autoExecuteWithNullValues($this->table, $this->getFields(), 'INSERT');
		else
			$result = Db::getInstance()->autoExecute($this->table, $this->getFields(), 'INSERT');
			
		if (!$result)
			return false;


		$this->id = Db::getInstance()->Insert_ID();


		return $result;
	}
public function add2($autodate = true, $nullValues = false)
	{
		if (!Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());


		if ($autodate AND key_exists('date_add', $this))
			$this->date_add = date('Y-m-d H:i:s');
		if ($autodate AND key_exists('date_upp', $this))
			$this->date_upp = date('Y-m-d H:i:s');


		if ($nullValues)
			$result = Db::getInstance()->autoExecuteWithNullValues($this->table, $this->getFields(), 'INSERT');
		else
			$result = Db::getInstance()->autoExecute($this->table, $this->getFields(), 'INSERT');
			
		if (!$result)
			return false;


		$this->id = Db::getInstance()->Insert_ID();


		return $this->id;
	}

	public function update($code=null)
	{

		if (!Validate::isTableOrIdentifier($this->identifier) OR !Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());

		if (key_exists('date_upp', $this))
			$this->date_upp = date('Y-m-d H:i:s');

		if ($code)
			$result = Db::getInstance()->autoExecuteWithNullValues($this->table, $this->getFields(), 'UPDATE', 'md5(`'.pSQL($this->identifier).'`) = "'.$code.'"');
		else
			$result = Db::getInstance()->autoExecute($this->table, $this->getFields(), 'UPDATE', '`'.pSQL($this->identifier).'` = '.intval($this->id));
		if (!$result)
			return false;


		return $result;
	}


	public function delete()
	{
		if (!Validate::isTableOrIdentifier($this->identifier) OR !Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());

		$result = Db::getInstance()->Execute('DELETE FROM `'.pSQL($this->table).'` WHERE `'.pSQL($this->identifier).'` = '.intval($this->id));
		if (!$result)
			return false;

		if (method_exists($this, 'getTranslationsFieldsChild'))
			Db::getInstance()->Execute('DELETE FROM `'.pSQL($this->table).'_lang` WHERE `'.pSQL($this->identifier).'` = '.intval($this->id));
		return $result;
	}


	public function deleteSelection($selection)
	{
		if (!is_array($selection) OR !Validate::isTableOrIdentifier($this->identifier) OR !Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());
		$result = true;
		foreach ($selection AS $id)
		{
			$this->id = intval($id);
			$result = $result AND $this->delete();
		}
		return $result;
	}


	public function toggleStatus()
	{
		if (!Validate::isTableOrIdentifier($this->identifier) OR !Validate::isTableOrIdentifier($this->table))
			die(Tools::displayError());

		elseif (!key_exists('active', $this))
		die(Tools::displayError());

		return Db::getInstance()->Execute('
				UPDATE `'.pSQL(_DB_PREFIX_.$this->table).'`
				SET `active` = !`active`
				WHERE `'.pSQL($this->identifier).'` = '.intval($this->id));
	}


	protected function getTranslationsFields($fieldsArray)
	{
		if (!Validate::isTableOrIdentifier($this->identifier))
			die(Tools::displayError());

		$fields = array();
		$languages = Language::getLanguages();
		$defaultLanguage = Configuration::get('PS_LANG_DEFAULT');
		foreach ($languages as $language)
		{
			$fields[$language['id_lang']]['id_lang'] = $language['id_lang'];
			$fields[$language['id_lang']][$this->identifier] = intval($this->id);
			foreach ($fieldsArray as $field)
			{
				/* Check fields validity */
				if (!Validate::isTableOrIdentifier($field))
					die(Tools::displayError());

				/* Copy the field, or the default language field if it's both required and empty */
				if (isset($this->{$field}[$language['id_lang']]) AND !Tools::isEmpty($this->{$field}[$language['id_lang']]))
					$fields[$language['id_lang']][$field] = pSQL($this->{$field}[$language['id_lang']]);
				elseif (in_array($field, $this->fieldsRequiredLang))
				$fields[$language['id_lang']][$field] = pSQL($this->{$field}[$defaultLanguage]);
				else
					$fields[$language['id_lang']][$field] = '';
			}
		}

		return $fields;
	}


	public function validateFields($die = true)
	{
		foreach ($this->fieldsRequired as $field)
			if (Tools::isEmpty($this->{$field}) AND (!is_numeric($this->{$field})))
			{
				if ($die) die (Tools::displayError().' ('.get_class($this).' -> '.$field.' is empty)');
				return false;
			}
			foreach ($this->fieldsSize as $field => $size)
				if (isset($this->{$field}) AND Tools::strlen($this->{$field}) > $size)
				{
					if ($die) die (Tools::displayError().' ('.get_class($this).' -> '.$field.' length > '.$size.')');
					return false;
				}
				$validate = new Validate();
				foreach ($this->fieldsValidate as $field => $method)
					if (!method_exists($validate, $method))
					die (Tools::displayError('validation function not found').' '.$method);
				elseif (!Tools::isEmpty($this->{$field}) AND !call_user_func(array('Validate', $method), $this->{$field}))
				{
					if ($die) die (Tools::displayError().' ('.get_class($this).' -> '.$field.' = '.$this->{$field}.')');
					return false;
				}
				return true;
	}


	public function validateFieldsLang($die = true, $errorReturn = false)
	{
		$defaultLanguage = intval(Configuration::get('YS_LANG_DEFAULT'));
		foreach ($this->fieldsRequiredLang as $fieldArray)
		{
			if (!is_array($this->{$fieldArray}))
				continue ;
			if (!$this->{$fieldArray} OR !sizeof($this->{$fieldArray}) OR ($this->{$fieldArray}[$defaultLanguage] !== '0' AND empty($this->{$fieldArray}[$defaultLanguage])))
			{
				if ($die) die (Tools::displayError().' ('.get_class($this).'->'.$fieldArray.' '.Tools::displayError('is empty for default language').')');
				return $errorReturn ? get_class($this).'->'.$fieldArray.' '.Tools::displayError('is empty for default language') : false;
			}
		}
		foreach ($this->fieldsSizeLang as $fieldArray => $size)
		{
			if (!is_array($this->{$fieldArray}))
				continue ;
			foreach ($this->{$fieldArray} as $k => $value)
				if (Tools::strlen($value) > $size)
				{
					if ($die) die (Tools::displayError().' ('.get_class($this).'->'.$fieldArray.' '.Tools::displayError('length >').' '.$size.' '.Tools::displayError('for language').')');
					return $errorReturn ? get_class($this).'->'.$fieldArray.' '.Tools::displayError('length >').' '.$size.' '.Tools::displayError('for language') : false;
				}
		}
		$validate = new Validate();
		foreach ($this->fieldsValidateLang as $fieldArray => $method)
		{
			if (!is_array($this->{$fieldArray}))
				continue ;
			foreach ($this->{$fieldArray} as $k => $value)
				if (!method_exists($validate, $method))
				die (Tools::displayError('validation function not found').' '.$method);
			elseif (!Tools::isEmpty($value) AND !call_user_func(array('Validate', $method), $value))
			{
				if ($die) die (Tools::displayError().' ('.get_class($this).'->'.$fieldArray.' = '.$value.' '.Tools::displayError('for language').' '.$k.')');
				return $errorReturn ? get_class($this).'->'.$fieldArray.' = '.$value.' '.Tools::displayError('for language').' '.$k : false;
			}
		}
		return true;
	}

	static public function displayFieldName($field, $className = __CLASS__, $htmlentities = true)
	{
		global $_FIELDS;
		$key = $className.'_'.md5($field);
		return ((is_array($_FIELDS) AND array_key_exists($key, $_FIELDS)) ? ($htmlentities ? htmlentities($_FIELDS[$key], ENT_QUOTES, 'utf-8') : $_FIELDS[$key]) : $field);
	}

	public function validateControler($htmlentities = true)
	{
		$errors = array();

		/* Checking for required fields */
		foreach ($this->fieldsRequired AS $field)
			if (($value = Tools::getValue($field, $this->{$field})) == false AND (string)$value != '0')
			if (!$this->id OR $field != 'passwd')
			$errors[] = '<b>'.self::displayFieldName($field, get_class($this), $htmlentities).'</b> '.Tools::displayError('is required');


		/* Checking for maximum fields sizes */
		foreach ($this->fieldsSize AS $field => $maxLength)
			if (($value = Tools::getValue($field, $this->{$field})) AND Tools::strlen($value) > $maxLength)
			$errors[] = '<b>'.self::displayFieldName($field, get_class($this), $htmlentities).'</b> '.Tools::displayError('is too long').' ('.Tools::displayError('maximum length:').' '.$maxLength.')';

		/* Checking for fields validity */
		foreach ($this->fieldsValidate AS $field => $function)
		{
			// Hack for postcode required for country which does not have postcodes
			if ($value = Tools::getValue($field, $this->{$field}) OR ($field == 'postcode' AND $value == '0'))
			{
				if (!Validate::$function($value))
					$errors[] = '<b>'.self::displayFieldName($field, get_class($this), $htmlentities).'</b> '.Tools::displayError('is invalid');
				else
				{
					if ($field == 'passwd')
					{
						if ($value = Tools::getValue($field))
							$this->{$field} = Tools::encrypt($value);
					}
					else
						$this->{$field} = $value;
				}
			}
		}
		return $errors;
	}
	
}

?>
