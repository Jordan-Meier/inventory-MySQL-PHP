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

    }



?>
