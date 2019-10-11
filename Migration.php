<?php
/**
 * @author denis303
 * @license MIT
 * @link http://denis303.com
 */
namespace denis303\codeigniter4;

abstract class Migration extends BaseMigration
{

    CONST COLUMN_CLASS = MigrationColumn::class;

    public static function integer($constraint = null)
    {
        $class = static::COLUMN_CLASS;

        return $class::integer($constraint);
    }

    public static function created()
    {
        $class = static::COLUMN_CLASS;

        return $class::created();
    }

    public static function updated()
    {
        $class = static::COLUMN_CLASS;

        return $class::updated();
    }

    public static function date()
    {
        $class = static::COLUMN_CLASS;

        return $class::date();
    }

    public static function time()
    {
        $class = static::COLUMN_CLASS;

        return $class::time();
    }

    public static function datetime()
    {
        $class = static::COLUMN_CLASS;

        return $class::datetime();
    }

    public static function string($constraint = 255)
    {
        $class = static::COLUMN_CLASS;

        return $class::string($constraint);
    }

    public static function text($constraint = 65535)
    {
        $class = static::COLUMN_CLASS;

        return $class::text($constraint);
    }

    public static function boolean($default = 1)
    {
        $class = static::COLUMN_CLASS;

        return $class::boolean($default);
    }    

    public static function char($constraint)
    {
        $class = static::COLUMN_CLASS;

        return $class::char($constraint);
    }

    public static function decimal($constraint1, $constraint2)
    {
        $class = static::COLUMN_CLASS;

        return $class::decimal($constraint1, $constraint2);
    }

    public static function primaryKey($constraint = null, $autoIncrement = true)
    {
        $class = static::COLUMN_CLASS;

        return $class::primaryKey($constraint, $autoIncrement);
    }

    public static function foreignKey($constraint = null)
    {
        $class = static::COLUMN_CLASS;

        return $class::foreignKey($constraint);
    }    

}