<?php

/**
 * 
 *
 * @version 1.2.6.3 - generated: 11-06-2012 22:47
 */
class ColeccoesModel {
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='COLECCOES';
	const SQL_INSERT='INSERT INTO `COLECCOES` (`autoid`,`id`,`elem`,`sequence`,`path`,`bannerslideshow`) VALUES (?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `COLECCOES` SET `autoid`=?,`id`=?,`elem`=?,`sequence`=?,`path`=?,`bannerslideshow`=? WHERE `autoid`=?';
	const SQL_SELECT_PK='SELECT * FROM `COLECCOES` WHERE `autoid`=?';
	const SQL_DELETE_PK='DELETE FROM `COLECCOES` WHERE `autoid`=?';
	const FIELD_AUTOID=0;
	const FIELD_ID=1;
	const FIELD_ELEM=2;
	const FIELD_SEQUENCE=3;
	const FIELD_PATH=4;
	const FIELD_BANNERSLIDESHOW=5;
	private static $PRIMARY_KEYS=array(self::FIELD_AUTOID);
	private static $FIELD_NAMES=array(
		self::FIELD_AUTOID=>'autoid',
		self::FIELD_ID=>'id',
		self::FIELD_ELEM=>'elem',
		self::FIELD_SEQUENCE=>'sequence',
		self::FIELD_PATH=>'path',
		self::FIELD_BANNERSLIDESHOW=>'bannerslideshow');
	private static $DEFAULT_VALUES=array(
		'autoid'=>null,
		'id'=>'',
		'elem'=>'',
		'sequence'=>0,
		'path'=>'',
		'bannerslideshow'=>'');
	private $autoid;
	private $id;
	private $elem;
	private $sequence;
	private $path;
	private $bannerslideshow;

	/**
	 * store for old instance after object has been modified
	 *
	 * @var ColeccoesModel
	 */
	private $oldInstance=null;

	/**
	 * get old instance if this has been modified, otherwise return null
	 *
	 * @return ColeccoesModel
	 */
	public function getOldInstance() {
		return $this->oldInstance;
	}

	/**
	 * called when the field with the passed id has changed
	 *
	 * @param int $fieldId
	 */
	protected function notifyChanged($fieldId) {
		if (is_null($this->getOldInstance())) {
			$this->oldInstance=clone $this;
			$this->oldInstance->notifyPristine();
		}
	}

	/**
	 * return true if this instance has been modified since the last notifyPristine() call
	 *
	 * @return bool
	 */
	public function isChanged() {
		return !is_null($this->getOldInstance());
	}

	/**
	 * return array with the field ids of values which have been changed since the last notifyPristine call
	 *
	 * @return array
	 */
	public function getFieldsChanged() {
		$changed=array();
		if (!$this->isChanged()) {
			return $changed;
		}
		$old=$this->getOldInstance()->toArray();
		$new=$this->toArray();
		foreach ($old as $fieldId=>$value) {
			if ($new[$fieldId]!==$value) {
				$changed[]=$fieldId;
			}
		}
		return $changed;
	}

	/**
	 * set this instance into pristine state
	 */
	public function notifyPristine() {
		$this->oldInstance=null;
	}

	/**
	 * set value for autoid 
	 *
	 * type:INT UNSIGNED,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $autoid
	 * @return ColeccoesModel
	 */
	public function &setAutoid($autoid) {
		$this->notifyChanged(self::FIELD_AUTOID);
		$this->autoid=$autoid;
		return $this;
	}

	/**
	 * get value for autoid 
	 *
	 * type:INT UNSIGNED,size:10,default:null,primary,unique,autoincrement
	 *
	 * @return mixed
	 */
	public function getAutoid() {
		return $this->autoid;
	}

	/**
	 * set value for id 
	 *
	 * type:VARCHAR,size:15,default:null,index
	 *
	 * @param mixed $id
	 * @return ColeccoesModel
	 */
	public function &setId($id) {
		$this->notifyChanged(self::FIELD_ID);
		$this->id=$id;
		return $this;
	}

	/**
	 * get value for id 
	 *
	 * type:VARCHAR,size:15,default:null,index
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * set value for elem 
	 *
	 * type:VARCHAR,size:15,default:null,index
	 *
	 * @param mixed $elem
	 * @return ColeccoesModel
	 */
	public function &setElem($elem) {
		$this->notifyChanged(self::FIELD_ELEM);
		$this->elem=$elem;
		return $this;
	}

	/**
	 * get value for elem 
	 *
	 * type:VARCHAR,size:15,default:null,index
	 *
	 * @return mixed
	 */
	public function getElem() {
		return $this->elem;
	}

	/**
	 * set value for sequence 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @param mixed $sequence
	 * @return ColeccoesModel
	 */
	public function &setSequence($sequence) {
		$this->notifyChanged(self::FIELD_SEQUENCE);
		$this->sequence=$sequence;
		return $this;
	}

	/**
	 * get value for sequence 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getSequence() {
		return $this->sequence;
	}

	/**
	 * set value for path 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @param mixed $path
	 * @return ColeccoesModel
	 */
	public function &setPath($path) {
		$this->notifyChanged(self::FIELD_PATH);
		$this->path=$path;
		return $this;
	}

	/**
	 * get value for path 
	 *
	 * type:VARCHAR,size:255,default:null
	 *
	 * @return mixed
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * set value for bannerslideshow 
	 *
	 * type:VARCHAR,size:30,default:null
	 *
	 * @param mixed $bannerslideshow
	 * @return ColeccoesModel
	 */
	public function &setBannerslideshow($bannerslideshow) {
		$this->notifyChanged(self::FIELD_BANNERSLIDESHOW);
		$this->bannerslideshow=$bannerslideshow;
		return $this;
	}

	/**
	 * get value for bannerslideshow 
	 *
	 * type:VARCHAR,size:30,default:null
	 *
	 * @return mixed
	 */
	public function getBannerslideshow() {
		return $this->bannerslideshow;
	}

	/**
	 * Get array with field id as index and field name as value
	 *
	 * @return array
	 */
	public static function getFieldNames() {
		return self::$FIELD_NAMES;
	}

	/**
	 * Get array with field ids of identifiers
	 *
	 * @return array
	 */
	public static function getIdentifierFields() {
		return self::$PRIMARY_KEYS;
	}

	/**
	 * Assign default values according to table
	 * 
	 */
	public function assignDefaultValues() {
		$this->assignByHash(self::$DEFAULT_VALUES);
	}


	/**
	 * return hash with the field name as index and the field value as value.
	 *
	 * @return array
	 */
	public function toHash() {
		$array=$this->toArray();
		$hash=array();
		foreach ($array as $fieldId=>$value) {
			$hash[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		return $hash;
	}

	/**
	 * return array with the field id as index and the field value as value.
	 *
	 * @return array
	 */
	public function toArray() {
		return array(
			self::FIELD_AUTOID=>$this->getAutoid(),
			self::FIELD_ID=>$this->getId(),
			self::FIELD_ELEM=>$this->getElem(),
			self::FIELD_SEQUENCE=>$this->getSequence(),
			self::FIELD_PATH=>$this->getPath(),
			self::FIELD_BANNERSLIDESHOW=>$this->getBannerslideshow());
	}


	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues() {
		return array(
			self::FIELD_AUTOID=>$this->getAutoid());
	}

	/**
	 * cached insert statement
	 *
	 * @var PDOStatement
	 */
	private static $stmtInsert=null;
	/**
	 * cached update statement
	 *
	 * @var PDOStatement
	 */
	private static $stmtUpdate=null;
	/**
	 * cached delete statement
	 *
	 * @var PDOStatement
	 */
	private static $stmtDelete=null;
	/**
	 * cached select statement
	 *
	 * @var PDOStatement
	 */
	private static $stmtSelect=null;
	private static $cacheStatements=true;
	
	/**
	 * prepare passed string as statement or return cached if enabled and available
	 *
	 * @param PDO $db
	 * @param string $statement
	 * @return PDOStatement
	 */
	protected static function prepareStatement(PDO $db, $statement) {
		if(self::isCacheStatements()) {
			if ($statement==self::SQL_INSERT) {
				if (null==self::$stmtInsert) {
					self::$stmtInsert=$db->prepare($statement);
				}
				return self::$stmtInsert;
			} else if($statement==self::SQL_UPDATE) {
				if (null==self::$stmtUpdate) {
					self::$stmtUpdate=$db->prepare($statement);
				}
				return self::$stmtUpdate;
			} else if($statement==self::SQL_SELECT_PK) {
				if (null==self::$stmtSelect) {
					self::$stmtSelect=$db->prepare($statement);
				}
				return self::$stmtSelect;
			} else if($statement==self::SQL_DELETE_PK) {
				if (null==self::$stmtDelete) {
					self::$stmtDelete=$db->prepare($statement);
				}
				return self::$stmtDelete;
			}
		}
		return $db->prepare($statement);
	}

	/**
	 * Enable statement cache
	 *
	 * @param bool $cache
	 */
	public static function setCacheStatements($cache) {
		self::$cacheStatements=true==$cache;
	}

	/**
	 * Check if statement cache is enabled
	 *
	 * @return bool
	 */
	public static function isCacheStatements() {
		return self::$cacheStatements;
	}

	/**
	 * Query by Example.
	 *
	 * Match by attributes of passed example instance and return matched rows as an array of ColeccoesModel instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param ColeccoesModel $example an example instance
	 * @return ColeccoesModel[]
	 */
	public static function findByExample(PDO $db,ColeccoesModel $example, $and=true) {
		$exampleValues=$example->toArray();
		$filter=array();
		foreach ($exampleValues as $fieldId=>$value) {
			if (!is_null($value)) {
				$filter[$fieldId]=$value;
			}
		}
		return self::findByFilter($db, $filter, $and);
	}

	/**
	 * Query by filter.
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * Will return matched rows as an array of ColeccoesModel instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter
	 * @param boolean $and
	 * @return ColeccoesModel[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true) {
		if ($filter instanceof DFC) {
			$filter=array($filter);
		}
		$sql='SELECT * FROM `COLECCOES`'
		. self::getSqlWhere($filter, $and);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new ColeccoesModel();
			$o->assignByHash($result);
			$o->notifyPristine();
			$resultInstances[]=$o;
		}
		$stmt->closeCursor();
		return $resultInstances;
	}

	/**
	 * Get sql WHERE part from filter.
	 *
	 * @param array $filter
	 * @param bool $and
	 * @return string
	 */
	protected static function getSqlWhere($filter, $and) {
		$sql=null;
		$andString=$and ? ' AND ' : ' OR ';
		$first=true;
		foreach ($filter as $fieldId=>$value) {
			if ($first) {
				$sql.=' WHERE ';
				$first=false;
			} else {
				$sql.=$andString;
			}
			if ($value instanceof DFC) {
				/* @var $value DFC */
				$sql.=self::SQL_IDENTIFIER_QUOTE . self::$FIELD_NAMES[$value->getField()] . self::SQL_IDENTIFIER_QUOTE
				. $value->getSqlOperatorPrepared();

			} else {
				$sql.=self::SQL_IDENTIFIER_QUOTE . self::$FIELD_NAMES[$fieldId] . self::SQL_IDENTIFIER_QUOTE . '=?';
			}
		}
		return $sql;
	}

	/**
	 * bind values from filter to statement
	 *
	 * @param PDOStatement $stmt
	 * @param array $filter
	 */
	protected static function bindValuesForFilter(&$stmt, $filter) {
		$i=0;
		foreach ($filter as $value) {
			$dfc=$value instanceof DFC;
			if ($dfc && 0!=(DFC::IS_NULL&$value->getMode())) {
				continue;
			}
			$stmt->bindValue(++$i, $dfc ? $value->getSqlValue() : $value);
		}
	}

	/**
	 * Execute select query and return matched rows as an array of ColeccoesModel instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return ColeccoesModel[]
	 */
	public static function findBySql(PDO $db, $sql) {
		$stmt=$db->query($sql);
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new ColeccoesModel();
			$o->assignByHash($result);
			$o->notifyPristine();
			$resultInstances[]=$o;
		}
		$stmt->closeCursor();
		return $resultInstances;
	}

	/**
	 * Delete rows matching the filter
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * @param PDO $db
	 * @param array $filter
	 * @param bool $and
	 * @return mixed
	 */
	public static function deleteByFilter(PDO $db, $filter, $and=true) {
		if ($filter instanceof DFC) {
			$filter=array($filter);
		}
		if (0==count($filter)) {
			throw new InvalidArgumentException('refusing to delete without filter'); // just comment out this line if you are brave
		}
		$sql='DELETE FROM `COLECCOES`'
		. self::getSqlWhere($filter, $and);
		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Assign values from array with the field id as index and the value as value
	 *
	 * @param array $array
	 */
	public function assignByArray($array) {
		$result=array();
		foreach ($array as $fieldId=>$value) {
			$result[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		$this->assignByHash($result);
	}

	/**
	 * Assign values from hash where the indexes match the tables field names
	 *
	 * @param array $result
	 */
	public function assignByHash($result) {
		$this->setAutoid($result['autoid']);
		$this->setId($result['id']);
		$this->setElem($result['elem']);
		$this->setSequence($result['sequence']);
		$this->setPath($result['path']);
		$this->setBannerslideshow($result['bannerslideshow']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return ColeccoesModel
	 */
	public static function findById(PDO $db,$autoid) {
		$stmt=self::prepareStatement($db,self::SQL_SELECT_PK);
		$stmt->bindValue(1,$autoid);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		if(!$result) {
			return null;
		}
		$o=new ColeccoesModel();
		$o->assignByHash($result);
		$o->notifyPristine();
		return $o;
	}

	/**
	 * Bind all values to statement
	 *
	 * @param PDOStatement $stmt
	 */
	protected function bindValues(PDOStatement &$stmt) {
		$stmt->bindValue(1,$this->getAutoid());
		$stmt->bindValue(2,$this->getId());
		$stmt->bindValue(3,$this->getElem());
		$stmt->bindValue(4,$this->getSequence());
		$stmt->bindValue(5,$this->getPath());
		$stmt->bindValue(6,$this->getBannerslideshow());
	}


	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_INSERT);
		$this->bindValues($stmt);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$this->setAutoid($db->lastInsertId());
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Update this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateToDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_UPDATE);
		$this->bindValues($stmt);
		$stmt->bindValue(7,$this->getAutoid());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Delete this instance from the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function deleteFromDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_DELETE_PK);
		$stmt->bindValue(1,$this->getAutoid());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}


	/**
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM() {
		$doc=new DOMDocument();
		$root=$doc->createElement('ColeccoesModel');
		foreach ($this->toHash() as $fieldName=>$value) {
			$fElem=$doc->createElement($fieldName);
			$fElem->appendChild($doc->createTextNode($value));
			$root->appendChild($fElem);
		}
		$doc->appendChild($root);
		return $doc;
	}

	/**
	 * get single ColeccoesModel instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return ColeccoesModel
	 */
	public static function fromDOMElement(DOMElement $node) {
		if ('ColeccoesModel'!=$node->nodeName) {
			return new InvalidArgumentException('expected: ColeccoesModel, got: ' . $node->nodeName, 0);
		}
		$result=array();
		foreach (self::$FIELD_NAMES as $fieldName) {
			$n=$node->getElementsByTagName($fieldName)->item(0);
			if (!is_null($n)) {
				$result[$fieldName]=$n->nodeValue;
			}
		}
		$o=new ColeccoesModel();
		$o->assignByHash($result);
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of ColeccoesModel from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return ColeccoesModel[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('ColeccoesModel') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>