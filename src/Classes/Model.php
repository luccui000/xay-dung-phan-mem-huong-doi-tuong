<?php

namespace Luccui\Classes;

use Luccui\Helpers\Config;

class Model
{
    protected DB $db;
    protected $table = null;
    protected $primaryKey = 'id';
    protected $createdAt = false;
    protected $data = null;
    protected array $fillable = [];
    protected array $jsonFields = [];
    protected bool $autoIncremnent = true;
    protected $originalKeyVal = null;

    public function __construct()
    {
        $config = new Config($_ENV);
        $this->db = DB::getInstance($config->db);
        $this->table = !is_null($this->table) ? $this->table : $this->setDefaultTableName();
    }
    public static function first($id)
    {
        return static::find($id);
    }
    public static function find($id)
    {
        $model = new static();
        return $model->getModelItem($id);
    }
    public static function create($data = [])
    {
        $data = static::prepareData($data);
        $cls = new static();
        $cls->db->insert(
            static::getTableStatic(),
            $data,
            true
        );
    }

    public static function update($parameter, $clause, $clauseData)
    {
        $cls = new static();
        return $cls->db->update(
            static::getTableStatic(),
            $parameter,
            $clause,
            $clauseData
        );
    }
    public static function all($clauses = [], $clauseData = []) {
        $model = new static();
        $table = static::getTableStatic();
        return $model->decodeObject($model->db->all($table, $clauses, $clauseData));
    }
    public static function count()
    {
        $model = new static();
        $table = static::getTableStatic();
        $clauses = [];
        return $model->db->count($table, $clauses, []);
    }
    public function getModelItem($id)
    {
        $this->data = null;
        $primaryKey = $this->primaryKey;
        $result = $this->select(
            [
                'where' => "{$this->table}.{$primaryKey} = :pk",
                'limit' => 1
            ],
            [
                'pk' => $id
            ], []
        );
        if(isset($result[0]))
            return $result[0];
        return null;
    }
    public function setDefaultTableName()
    {
        $namespace = strtolower(get_class($this));
        $splitedNamespace = explode("\\", $namespace);
        return $splitedNamespace[count($splitedNamespace) - 1];
    }

    public static function setDefaultClauses($clauses, string $table, string $primaryKey)
    {
        if(empty($clauses['orderBy'])) {
            $clauses['orderBy'] = "{$table}.{$primaryKey} DESC";
        }
        return $clauses;
    }
    public function save($data = null)
    {
        if(!is_null($this->data) && !is_null($data) && is_array($data)) {
            foreach ($this->data as $key => $value) {
                if(array_key_exists($key, $data)) {
                    $this->data->$key = $data[$key];
                }
            }
        }
        $this->saveModel();
    }
    public function saveModel()
    {
        if(!$this->data)
            return false;
        $parameters = $this->getData(true);
        $parameters = static::encodeJsonFields($parameters);
        $clauseData['orginal_id'] = $this->getKeyVal();
        return $this->db->update(
            $this->table,
            $parameters,
            [
                'where' => "{$this->table}.{$this->primaryKey} =:orginal_id"
            ],
            $clauseData
        );
    }
    public function select($clauses, $clauseData, $settings)
    {
        $settings = static::getDefaultSettings($settings);
        $table = static::getTableStatic();
        $primaryKey = static::getPrimaryKeyStatic();
        $clauses = static::setDefaultClauses($clauses, $table, $primaryKey);
        $cls = new static();
        $result = $cls->db->select($table, $clauses, $clauseData);
        if($settings['loadModel'])
            return static::loadModelData($result);
        return $result;
    }
    public static function loadModelData($result = []): array
    {
        $collections = [];
        foreach ($result as $value) {
            $collections[] = static::loadModelWithData($value);
        }
        return $collections;
    }
    public static function loadModelWithData($data) : static
    {
        $model = new static();
        $model->fillModeData($data);
        return $model;
    }
    public function fillModeData($data) {
        $this->data = $data;
        $this->setOriginaKeyValFromData();
        $this->decodeJsonFields();
    }
    public function decodeJsonFields()
    {
        if(is_array($this->jsonFields) && count($this->jsonFields)) {
            foreach ($this->jsonFields as $key) {
                if(isset($this->data->$key) && $this->data->$key) {
                    $this->data->$key = json_decode($this->data->$key, true);
                }
            }
        }
    }
    public function decodeObject($objStdClass)
    {
        return  json_decode(json_encode($objStdClass), true);
    }
    public static function getDefaultSettings(&$settings)
    {
        if(!array_key_exists('loadModel', $settings))
            $settings['loadModel'] = true;
        if(!array_key_exists('getQueryStr', $settings))
            $settings['getQueryStr'] = false;
        return $settings;
    }
    public static function prepareData($data = [])
    {
        $data = static::checkFillableData($data);
        $data = static::encodeJsonFields($data);
        return $data;
    }
    public static function checkFillableData(mixed $data)
    {
        $fillable = static::getFillabelStatic();
        if(count($fillable)) {
            foreach ($fillable as $key) {
                if(!array_key_exists($key, $data)) {
                    $data[$key] = null;
                }
            }
            foreach ($data as $key => $value) {
                if(!in_array($key, $fillable))
                    unset($data[$key]);
            }
            if(static::getIsAutoIncrementStatic()) {
                if(array_key_exists('id', $data)) {
                    unset($data['id']);
                }
            }
        }
        return $data;
    }

    protected static function encodeJsonFields(mixed $data)
    {
        $jsonFields = static::getJsonFieldsStatic();
        foreach ($jsonFields as $key) {
            if(array_key_exists($key, $data))
                $data[$key] = json_encode($data[$key]);
        }
        return $data;
    }
    public function getTable(): ?string
    {
        return $this->table;
    }
    public static function getTableStatic(): string
    {
        $cls = new static();
        return $cls->getTable();
    }
    public function getFillable(): array
    {
        return $this->fillable;
    }
    public static function getFillabelStatic()
    {
        $cls = new static;
        return $cls->getFillable();
    }

    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
    public static function getPrimaryKeyStatic()
    {
        $cls = new static();
        return $cls->getPrimaryKey();
    }

    public function getData($returnArray = false)
    {
        if($this->data && $returnArray)
            return json_decode(json_encode($this->data), true);
        return $this->data;
    }
    public static function getDataStatic()
    {
        $cls = new static();
        return $cls->getData();
    }
    public function getJsonFields(): array
    {
        return $this->jsonFields;
    }
    public static function getJsonFieldsStatic()
    {
        $cls = new static();
        return $cls->getJsonFields();
    }

    public function isAutoIncremnent(): bool
    {
        return $this->autoIncremnent;
    }
    public static function getIsAutoIncrementStatic()
    {
        $cls = new static();
        return $cls->isAutoIncremnent();
    }

    public function getKeyVal()
    {
        return $this->originalKeyVal;
    }
    private function setOriginaKeyValFromData()
    {
        $pk = $this->primaryKey;
        if($this->data && isset($this->data->$pk)) {
            $this->originalKeyVal = $this->data->$pk;
        }
    }
}
