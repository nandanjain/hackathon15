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
        // Convert the Object to arrary for Angular filters to work.
        $cursor = $this->db->sales->find(array('shop_id' => $shop_id));
        $cursor->sort(array('date' => -1));

        $salesJson = json_encode(iterator_to_array($cursor));
        return $salesJson;
    }

    function getSalesByDate($shop_id, $start_date, $end_date)
    {
        $cursor = $this->db->sales->find(array('shop_id' => $shop_id, 'state' => 'paid', '$and' => array(array('date' => array('$gt' => $start_date)), array('date' => array('$lt' => $end_date)))));
        $salesJson = json_encode(iterator_to_array($cursor));
        return $salesJson;
    }

    function getDailySalesByDate($shop_id)
    {
        $cursor = $this->db->sales->find(array('shop_id' => $shop_id, 'state' => 'paid'));
        $cursor->sort(array('date' => -1));

        foreach ($cursor as $c) {
            $d = split('T', $c['date']);
            if (!isset($data[$d[0]])) {
                $data[$d[0]] = 0;
            }
            $services = 0.00;
            foreach ($c['services'] as $s) {
                $services += $s['price'] * $s['quantity'];
            }
            $tires = 0.00;
            foreach ($c['tires'] as $t) {
                $tires += $t['price'] * $t['quantity'];
            }
            $total = $services + $tires;
            $data[$d[0]] += $total;
        }
    }

    function getInventory($shop_id)
    {
        // Convert the Object to array for Angular filters to work.
        $cursor = $this->db->inventory->find(array('shop_id' => $shop_id));
        $inventoryJson = json_encode(iterator_to_array($cursor));

        return $inventoryJson;
    }

    function getInventoryByQuality($shop_id, $quality)
    {
        $cursor = $this->db->inventory->find(array('shop_id' => $shop_id, 'quality' => $quality));
        $inventoryJson = json_encode(iterator_to_array($cursor));

        return $inventoryJson;
    }

    function getInventoryByTire($shop_id, $tire)
    {
        $cursor = $this->db->inventory->find(array('shop_id' => $shop_id, 'tire' => $tire));
        $inventoryJson = json_encode(iterator_to_array($cursor));

        return $inventoryJson;
    }

    function getHistory($shop_id)
    {
        // Convert the Object to arrary for Angular filters to work.
        $cursor = $this->db->history->find(array('shop_id' => $shop_id));
        $historyJson = json_encode(iterator_to_array($cursor));
        return $historyJson;
    }

    function getHistoryByDate($shop_id, $start_date, $end_date)
    {
        $cursor = $this->db->history->find(array('shop_id' => $shop_id, '$and' => array(array('date' => array('$gt' => $start_date)), array('date' => array('$lt' => $end_date)))));
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
