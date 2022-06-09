<?php

namespace Luccui\Classes;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Luccui\Core\Database;
use Illuminate\Database\Capsule\Manager as Capsule;
use Luccui\Helpers\Config;

class Model extends Capsule
{
    protected $table = '';
    protected $primaryKey = 'id';
    protected $createdAt = false;
    protected $data = null;
    protected array $fillable = [];
    protected array $jsonFields = [];
    protected bool $autoIncremnent = true;
    protected $originalKeyVal = null;
    protected Database $db;
    protected $output;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->resolveTableName();
        $this->db = new Database(app(Config::class)->db);
    }
    public function resolveTableName()
    {
        $modelNamespace = explode("\\", get_class($this));
        return !empty($this->table) ? $this->table : strtolower(end($modelNamespace));
    }
    public static function all(): Collection
    {
        return static::getModel()->get();
    }
    public static function select($columns = ['*'])
    {
        return static::getModel()->select($columns);
    }
    public static function findFirst($id)
    {
        return static::getModel()->where(static::getPrimaryKeyStatic(), '=', $id)->first();
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
    public static function whereIn($column, $values, $boolean = 'and', $not = false)
    {
        return static::getModel()->whereIn($column, $values, $boolean, $not);
    }
    public static function leftJoin($table, $first, $operator = null, $second = null)
    {
        return static::getModel()->leftJoin($table, $first, $operator, $second);
    }
    public static function selectRaw($expression, array $bindings = [])
    {
        return static::getModel()->selectRaw($expression, $bindings);
    }
    public static function join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
    {
        return static::getModel()->join($table, $first, $operator, $second, $type, $where);
    }
    public static function groupBy($groups)
    {
        return static::getModel()->groupBy(...$groups);
    }
    public static function query()
    {
        $database = new Database(app(Config::class)->db);
        return new Builder($database->getConnection());
    }
    public static function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return static::getModel()->paginate($perPage, $columns, $pageName, $page);
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
    public static function withRelation($where)
    {
        $output = static::getModel()->where('id', '=', $where)
            ->get()
            ->toArray();
        return array_map(function ($item) {
            return get_object_vars($item);
        }, $output);
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
