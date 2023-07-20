<?php

namespace app\core;

abstract class Model
{
	protected $db;

	public function __construct ()
	{
		$this->db = new Db();
	}

    /**
     * @param string $dataString
     *
     * Принимает строку очищщяет и возвращяет очищенную строку
     *
     * @return string
     */
    protected function clearString(string $dataString):string
	{
		$dataString = trim($dataString);
		$dataString = htmlspecialchars($dataString);
		return $dataString;
	}
}