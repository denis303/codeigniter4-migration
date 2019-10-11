<?php
/**
 * @author denis303
 * @license MIT
 * @link http://denis303.com
 */
namespace denis303\codeigniter4;

use ArrayAccess;

class MigrationColumn extends BaseMigrationColumn implements ArrayAccess
{

    protected $_data = [];

    const NULL = 'null';

    const TYPE = 'type';

    const CONSTRAINT = 'constraint';

    const UNSIGNED = 'unsigned';

    const AUTO_INCREMENT = 'auto_increment';

    const UNIQUE = 'unique';

    const DEFAULT = 'default';

    const TYPE_INT = 'INT';

    const TYPE_VARCHAR = 'VARCHAR';

    const TYPE_CHAR = 'CHAR';

    const TYPE_TEXT = 'TEXT';

    const TYPE_ENUM = 'ENUM';

    const TYPE_TIMESTAMP = 'TIMESTAMP';

    const TYPE_DATE = 'DATE';

    const TYPE_TIME = 'TIME';

    const TYPE_DATETIME = 'DATETIME';

    public function __construct($data = [])
    {
        parent::__construct();

        $this->_data = $data;
    }

    public function toArray()
    {
        return $this->_data;
    }

    public function offsetExists($offset) : bool
    {
        return array_key_exists($offset, $this->_data);
    }
    
    public function offsetGet($offset)
    {
        return $this->_data[$offset];
    }
    
    public function offsetSet($offset, $value)
    {
        $this->_data[$offset] = $value;
    }
    
    public function offsetUnset($offset)
    {
        unset($this->_data[$offset]);
    }

    public function type($type, $constraint = null)
    {
        $this->_data[static::TYPE] = $type;

        if ($constraint)
        {
            $this->_data[static::CONSTRAINT] = $constraint;
        }
    
        return $this;
    }

    public function constraint($constraint)
    {
        $this->_data[static::CONSTRAINT] = $constraint;

        return $this;
    }

    public function null()
    {
        $this->_data[static::NULL] = true;
    
        return $this;
    }

    public function notNull()
    {
        $this->_data[static::NULL] = false;
    
        return $this;
    }

    public function default($default)
    {
        $this->_data[static::DEFAULT] = $default;

        return $this;
    }

    public function unique()
    {
        $this->_data[static::UNIQUE] = true;
    
        return $this;
    }

    public function notUnique()
    {
        $this->_data[static::UNIQUE] = false;
    
        return $this;
    }

    public function autoIncrement()
    {
        $this->_data[static::AUTO_INCREMENT] = true;
    
        return $this;
    }

    public function notAutoIncrement()
    {
        $this->_data[static::AUTO_INCREMENT] = false;
    
        return $this;
    }

    public function unsigned()
    {
        $this->_data[static::UNSIGNED] = true;
    
        return $this;
    }

    public function notUnsigned()
    {
        $this->_data[static::UNSIGNED] = false;
    
        return $this;
    }

    public static function factory($type = null, $constraint = null)
    {
        $class = get_called_class();

        $return = new $class;

        if ($type)
        {
            $return->type($type);
        }

        if ($constraint)
        {
            $return->constraint($constraint);
        }

        return $return;
    }

    public static function integer($constraint = null)
    {
        return static::factory(static::TYPE_INT, $constraint);
    }

    public static function created()
    {
        return static::factory(static::TYPE_TIMESTAMP . ' NULL DEFAULT CURRENT_TIMESTAMP');
    }

    public static function updated()
    {
        return static::factory(static::TYPE_DATETIME);
    }

    public static function date()
    {
        return static::factory(static::TYPE_DATE);
    }

    public static function time()
    {
        return static::factory(static::TYPE_TIME);
    }

    public static function datetime()
    {
        return static::factory(static::TYPE_DATETIME);
    }

    public static function string($constraint = 255)
    {
        return static::factory(static::TYPE_VARCHAR, $constraint);
    }

    public static function text($constraint = 65535)
    {
        return static::factory(static::TYPE_TEXT, $constraint);
    }

    public static function boolean($default = 1)
    {
        return static::factory(static::TYPE_TINYINT, 1)->notNull()->unsigned()->default($default);
    }    

    public static function char($constraint)
    {
        return static::factory(static::TYPE_CHAR, $constraint);
    }

    public static function decimal($constraint1, $constraint2)
    {
        return static::factory(static::TYPE_DECIMAL, $constraint1 . ',' . $constraint2);
    }

    public static function primaryKey($constraint = null, $autoIncrement = true)
    {
        $return = static::integer($constraint);
    
        if ($autoIncrement)
        {
            $return->autoIncrement();
        }

        return $return;
    }

    public static function foreignKey($constraint = null)
    {
        $return = static::integer($constraint);

        return $return;
    }

}