<?php
class PdoShipStorage implements ShipStorageInterface
{
	private $pdo;

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	/**
	 * @return PDO
	 */
	private function getPDO()
	{
		return $this->pdo;
	}

	/**
	 * @return array
	 */
	public function fetchAllShipsData()
	{
		$statement = $this->getPDO()->prepare('SELECT * FROM ship');
		$statement->execute();
		$shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $shipsArray;
	}

	/**
	 * @param $id
	 *
	 * @return array|null
	 */
	public function fetchSingleShipData($id)
	{
		$statement = $this->getPDO()->prepare('SELECT * FROM ship WHERE id = :id');
		$statement->execute(array('id' => $id));
		$shipArray = $statement->fetch(PDO::FETCH_ASSOC);

		if (!$shipArray) {
			return null;
		}

		return $shipArray;
	}
}