<?php

namespace App\DAO;

class EtuSemestreDAO extends DAO
{
    // Constructor to initialize the EtuSemestreDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "EtuSemestre" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "EtuSemestre" table
        $sql = "SELECT * FROM EtuSemestre";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "EtuSemestre" table
		$sql = "SELECT * FROM EtuSemestre WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}
}