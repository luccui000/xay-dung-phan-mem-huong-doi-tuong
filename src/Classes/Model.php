<?php

namespace Luccui\Classes;

use Illuminate\Support\Collection;
use Luccui\Core\Database;
use Illuminate\Database\Capsule\Manager as Capsule;

class Model extends Capsule
{
    protected $table = null;
    protected $primaryKey = 'id';
    protected $createdAt = false;
    protected $data = null;
    protected array $fillable = [];
    protected array $jsonFields = [];
    protected bool $autoIncremnent = true;
    protected $originalKeyVal = null;
    protected Database $db;
    protected array $withs = [];

    public function __construct()
    {
        parent::__construct();
        $this->db = new Database(app('config')->db);
        $modelNamespace = explode("\\", get_class($this));
        $this->table = !is_null($this->table) ? $this->table : strtolower(end($modelNamespace));
    }
    public static function all(): Collection
    {
        return static::getModel()->get();
    }
    public static function insert(array $values)
    {
        return static::getModel()->insert($values);
    }
    public static function insertGetId(array $values, $sequence = null)
    {
        return static::getModel()->insertGetId($values, $sequence);
    }
    public static function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        return static::getModel()->where($column, $operator, $value, $boolean);
    }
    public static function with($withModel)
    {
        $table = static::getTableStatic();
        if(is_string($withModel)) {
            if(in_array($withModel . "_id", static::getFillableStatic())) {
                return static::getModel()->join($withModel, function($join) use ($table, $withModel) {
                    return $join->on($table . "." . $withModel . "_id", "=", $withModel . ".id");
                });
            }
        }
        if(is_array($withModel)) {
            $staticModel = static::getModel();
            foreach($withModel as $model) {
                if(in_array($model . "_id", static::getFillableStatic())) {
                    $staticModel->join($model, function($join) use ($table, $model) {
                        return $join->on($table . "." . $model . "_id", "=", $model . ".id");
                    });
                }
            }
            return $staticModel;
        }
        return null;
    }
    public static function getModel($model = null)
    {
        return static::table($model ?? static::getTableStatic());
    }
    public function getTable()
    {
        return $this->table;
    }
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    public function isCreatedAt(): bool
    {
        return $this->createdAt;
    }

    public function getData()
    {
        return $this->data;
    }
    public function getFillable(): array
    {
        return $this->fillable;
    }

    public function getJsonFields(): array
    {
        return $this->jsonFields;
    }

    public function isAutoIncremnent(): bool
    {
        return $this->autoIncremnent;
    }

    public function getOriginalKeyVal()
    {
        return $this->originalKeyVal;
    }
    public static function getTableStatic()
    {
        $model = new static();
        return $model->table;
    }
    public static function getPrimaryKeyStatic(): string
    {
        $model = new static();
        return $model->primaryKey;
    }

    public static function isCreatedAtStatic(): bool
    {
        $model = new static();
        return $model->createdAt;
    }

    public static function getDataStatic()
    {
        $model = new static();
        return $model->data;
    }
    public static function getFillableStatic(): array
    {
        $model = new static();
        return $model->fillable;
    }

    public static function getJsonFieldsStatic(): array
    {
        $model = new static();
        return $model->jsonFields;
    }

    public static function isAutoIncremnentStatic(): bool
    {
        $model = new static();
        return $model->autoIncremnent;
    }

    public static function getOriginalKeyValStatic()
    {
        $model = new static();
        return $model->originalKeyVal;
    }
    public static function __callStatic($method, $parameters)
    {
        return call_user_func_array([static::getModel(), $method], $parameters);
    }
}
