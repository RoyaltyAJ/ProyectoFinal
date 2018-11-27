<?php
class ConexionSQL
{    
    private $Host = 'localhost';
    private $UserName = 'root';
    private $Password = '';
    private $Database = 'test';
    
    protected static $Instancia = null;
    
    function __construct()
    {
		self::$Instancia = new mysqli($this->Host, $this->UserName, $this->Password, $this->Database);
		if (!self::$Instancia) 
		{
			throw new Exception('No es posible conectase a la base de datos.', 1);
		} 
        
        return self::$Instancia;
	}
	
	public static function ObtenerInstancia()
	{
		if (self::$Instancia == null) 
		{
			new ConexionSQL();
		}
		return self::$Instancia;
	}
}
?>