<?php

namespace App\DAO;
use Exception;

class EtuCompDAO extends DAO
{
    // Constructor to initialize the EtuCompDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "EtuComp" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "EtuComp" table
        $sql = "SELECT * FROM EtuComp";
        
        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();
        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "EtuComp" table
		$sql = "SELECT * FROM EtuComp WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(int $id_etu, int $id_comp, float $moyenne_comp, String $passage, float $bonus)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "INSERT INTO EtuComp (id_etu, id_comp, moyenne_comp, passage, bonus) VALUES (:id_etu, :id_comp, :moyenne_comp, :passage, :bonus)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_comp', $id_comp);
            $stmt->bindValue(':moyenne_comp', $moyenne_comp);
            $stmt->bindValue(':passage', $passage);
            $stmt->bindValue(':bonus', $bonus);


            // Execute the prepared query
            $stmt->execute();
            return "EtuComp added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update(int $id_etu, int $id_comp, float $moyenne_comp, String $passage, float $bonus)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "UPDATE EtuComp SET moyenne_comp=:moyenne_comp, bonus=:bonus, passage=:passage
                    WHERE id_etu=:id_etu AND id_comp=:id_comp";

            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_comp', $id_comp);
            $stmt->bindValue(':moyenne_comp', $moyenne_comp);
            $stmt->bindValue(':passage', $passage);
            $stmt->bindValue(':bonus', $bonus);


            // Execute the prepared query
            $stmt->execute();
            return "EtuComp updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function updatePassage(int $id_etu, int $id_comp, String $passage)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "UPDATE EtuComp SET passage=:passage
                    WHERE id_etu=:id_etu AND id_comp=:id_comp";

            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_comp', $id_comp);
            $stmt->bindValue(':passage', $passage);

            // Execute the prepared query
            $stmt->execute();
            return "EtuComp updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "EtuComp" table
		$sql = "DELETE FROM EtuComp WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll("EtuComp removed successfully!");
	}
}