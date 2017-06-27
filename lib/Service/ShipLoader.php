<?php

class ShipLoader
{
	private $shipStorage;

	public function __construct(ShipStorageInterface $shipStorage) {
		$this->shipStorage = $shipStorage;
	}

	/**
     * @return AbstractShip[]
     */
    public function getShips()
    {
        $ships = array();

        $shipsData = $this->queryForShips();

        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    public function getShipStorage()
    {
    	return $this->shipStorage;
    }

    /**
     * @param $id
     * @return AbstractShip
     */
    public function findOneById($id)
    {
    	$shipArray = $this->getShipStorage()->fetchSingleShipData($id);

        return $this->createShipFromData($shipArray);
    }

	/**
	 * @param array $shipData
	 *
	 * @return AbstractShip
	 */
    private function createShipFromData(array $shipData)
    {
        if ($shipData['team'] == 'rebel') {
            $ship = new RebelShip($shipData['name']);
        }
        else {
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }

    private function queryForShips()
    {
    	return $this->getShipStorage()->fetchAllShipsData();
    }
}

