<?php

/**
 * Created by PhpStorm.
 * User: Nandy
 * Date: 7/15/15
 * Time: 8:23 PM
 */
class MongoDBClient
{
    // connect
    private $m;
    // select a database
    private $db;
    private $instance;

    function __construct()
    {
        $this->m = new MongoClient();
        $this->db = $this->m->tires;
    }

    public function getInstance()
    {
        if (!isset($this->instance)) {
            $this->instance = new MongoDBClient();
        }
        return $this->instance;
    }

    function validateCredentials($email, $password)
    {
        $cursor = $this->db->users->findOne(array('username' => $email, 'password' => $password));
        if ($cursor == NULL) {
            return false;
        } else {
            return true;
        }
    }

    function getSales($shop_id)
    {
        $cursor = $this->db->sales->find(array('shop_id' => $shop_id));
        $salesJson = json_encode(iterator_to_array($cursor));
        return $salesJson;
    }

    function __destruct()
    {
        unset($this->db);
        unset($this->m);
    }
}

$MONGO_DB = (new MongoDBClient())->getInstance();
