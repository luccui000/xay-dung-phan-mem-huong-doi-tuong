<?php

namespace Luccui\Classes;

use PDO;

class DB
{
    public PDO $pdo;
    private static ?DB $instance = null;

    private function __construct(array $config)
    {
        $defaultOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];
        $dsn = $config['driver'] . ":dbname=" . $config['database'] . ";host=" . $config['host'];
        $this->pdo = new PDO(
            $dsn,
            $config['username'],
            $config['password'],
            $defaultOptions,
        );
    }
    public static function getInstance(array $config): DB
    {
        if(static::$instance == null)
            static::$instance = new DB($config);
        return static::$instance;
    }
    public function all($talbe, $clauses = [], $clauseData = []) {
        $queryStr = $this->getQueryStr($talbe, $clauses);
        $statement = $this->execute($queryStr, $clauseData, true);
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function insert($table, $parameters, $returnLastInsertId = false)
    {
        $sql = sprintf("insert into %s (%s) values (%s)",
            $table,
            implode(", ", array_keys($parameters)),
            ":" . implode(", :", array_keys($parameters))
        );

         $result = $this->execute($sql, $parameters);
        if($returnLastInsertId) {
            return $this->pdo->lastInsertId();
        }
        return $result;
    }
    public function update($table, $parameters, $clause = [], $clauseData = [])
    {
        $sql = "update {$table} set ";
        foreach ($parameters as $key => $value) {
            $sql .= "{$key}=:{$key},";
        }
        $sql = rtrim($sql, ",");
        if(isset($clause['where'])) {
            $sql .= " where " . $clause['where'];
        }
        return $this->execute($sql, array_merge($parameters, $clauseData));
    }
    public function delete($table, $clauses = [], $clauseData = [])
    {
        $sql = "delete from {$table}";
        if(isset($clauses['where']))
            $sql .= " where " . $clauses['where'];
        return $this->execute($sql, $clauseData);
    }
    public function execute(string $sql, $data = [], $returnStatement = false)
    {
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($data);
        if($returnStatement) return $statement;
        return $result;
    }
    public function raw($sql)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function paginate($table, $clauses = [], $clauseData = [])
    {

    }
    public function getPagination($table, $params, $clauses = [], $clauseData = [], $settings = [])
    {
        $page = $params['page'];
        if(isset($clauses['limit'])) unset($clauses['limit']);
        if(isset($clauses['offset'])) unset($clauses['offset']);
        if(isset($clauses['orderBy'])) unset($clauses['orderBy']);

        $totalElem = $this->count($table, $clauses, $clauseData);
        $totalPages = ceil($totalElem / $params['limit']);

        if($page > $totalPages) $page = $totalPages;

        return [
            'total_element' => $totalElem,
            'total_page'    => $totalPages,
            'current'       => $page,
            'next'          => ($page + 1) >= $totalPages ? $page + 1 : null,
            'previous'      => ($page - 1) > 0 ? $page - 1 : null,
            'links'         => ''
        ];
    }
    public function getQueryStr($table, $clauses = [])
    {
        $select = "*";
        if(isset($clauses['select'])) {
            $select = $clauses['select'];
        }
        $query = sprintf("select %s from %s ", $select, $table);
        if(isset($clauses['join'])) {
            $query .= $clauses['join'] . " ";
        }
        if(isset($clauses['where'])) {
            $query .= " where " . $clauses['where'] . " ";
        }
        if(isset($clauses['groupBy'])) {
            $query .= " group by " .  $clauses['groupBy'] . " ";
        }
        if(isset($clauses['orderBy'])) {
            $query .= " order by " . $clauses['orderBy'] . " ";
        }
        if(isset($clauses['limit'])) {
            $query .= " limit " . abs($clauses['limit']) . " ";
        }
        if(isset($clauses['offset'])) {
            $query .= " offset " . abs($clauses['offset']) . " ";
        }
        return $query;
    }
    public function select($table, $clauses = [], $clauseData = [], $settings = [])
    {
        $queryStr = $this->getQueryStr($table, $clauses);
        if(isset($settings['getQueryStr']) && $settings['getQueryStr']) {
            return $queryStr;
        }
        $statement = $this->execute($queryStr, $clauseData, true);

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectFirst($table, &$clauses = [], $clauseData = []) {
        $clauses['limit'] = 1;
        $result = $this->select($table, $clauses, $clauseData);

        if(isset($result[0]))
            return $result[0];
        return null;
    }
    public function count($table, &$clauses = [], $clauseData = [])
    {
        if(isset($clauses['orderBy'])) unset($clauses['orderBy']);
        if(isset($clauses['groupBy'])) unset($clauses['groupBy']);

        $clauses['select'] = 'count(*) as total_items';
        $result = $this->select($table, $clauses, $clauseData);
        if(isset($result[0]))
            return $result[0]->total_items;
        return null;
    }
}
