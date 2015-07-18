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
        $cursor = $this->db->users->find(array('email' => $email, 'password' => $password));
        $cursor->fields(array("shop_id" => true));
        if ($cursor == NULL) {
            return false;
        } else {
            $shop_id = $cursor->getNext()['shop_id'];
            return $shop_id;
        }
    }

    function getShopDetails($shop_id)
    {
        $cursor = $this->db->shops->find(array('shop_id' => $shop_id));
        $shopJson = json_encode(iterator_to_array($cursor));
        return $shopJson;
    }

    function getSales($shop_id)
    {
        $cursor = $this->db->sales->find(array('shop_id' => $shop_id));
        $salesJson = json_encode(iterator_to_array($cursor));
        return $salesJson;
    }

    function getInventory($shop_id)
    {
        $cursor = $this->db->inventory->find(array('shop_id' => $shop_id));
        $inventoryJson = json_encode(iterator_to_array($cursor));
        return $inventoryJson;
    }

    function getHistory($shop_id)
    {
        $cursor = $this->db->history->find(array('shop_id' => $shop_id));
        $historyJson = json_encode(iterator_to_array($cursor));
        return $historyJson;
    }

    function __destruct()
    {
        unset($this->db);
        unset($this->m);
    }
}

$MONGO_DB = (new MongoDBClient())->getInstance();
