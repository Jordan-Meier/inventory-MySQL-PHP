<?php
    class Inventory
    {
        private $name;
        private $id;

        function __construct($inventory_name, $inventory_id = null)
        {
            $this->name = $inventory_name;
            $this->id = $inventory_id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO items (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_inventory = $GLOBALS['DB']->query("SELECT * FROM items;");
            $inventory = array();
            foreach($returned_inventory as $inventory) {
                $name = $inventory['name'];
                $id = $inventory['id'];
                $new_inventory = new Inventory($name, $id);
                array_push($inventory, $new_inventory);
            }
            return $inventory;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM items;");
        }

    }
?>
