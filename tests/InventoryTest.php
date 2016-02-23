<?php

/**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */

    require_once "src/Inventory.php";

    $server = 'mysql:host=localhost;dbname=inventory_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class InventoryTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
           Inventory::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Silver dollar";
            $test_Inventory = new Inventory($name);

            //Act
            $test_Inventory->save();

            //Assert
            $result = Inventory::getAll();
            $this->assertEquals($test_Inventory, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Silver Dollar";
            $name2 = "Four Leaf Clover";
            $test_inventory = new Inventory($name);
            $test_inventory->save();
            $test_inventory2 = new Inventory($name2);
            $test_inventory2->save();

            //Act
            $result = Inventory::getAll();

            //Assert
            $this->assertEquals([$test_inventory, $test_inventory2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Silver Dollar";
            $name2 = "Four Leaf Clover";
            $test_inventory = new Inventory($name);
            $test_inventory->save();
            $test_inventory2 = new Inventory($name2);
            $test_inventory2->save();

            //Act
            Inventory::deleteAll();

            //Assert
            $result = Inventory::getAll();
            $this->assertEquals([], $result);
        }
    }

?>
