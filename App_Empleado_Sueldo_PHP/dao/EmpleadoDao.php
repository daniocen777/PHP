<?php 
	require_once 'ConexionDao.php';
	require_once '../modelo/m_Area.php';
	require_once '../modelo/m_Condicion.php';
    require_once '../modelo/m_Persona.php';
    require_once '../modelo/m_Empleado.php';

	class EmpleadoDao
	{
        private $empleado;

        public function __construct() {
            $this->empleado = array();
        }

    	public function InsertarEmpleado($area, $condicion, $persona, $empleado)
    	{
    		if(!Conexion::Conectar()->query("CALL Proc_Insertar_Empleado('{$persona->getNombre()}', '{$persona->getApPaterno()}', '{$persona->getApMaterno()}', '{$condicion->getNombreCondicion()}', '{$area->getNombreArea()}', '{$persona->getFechaNacimiento()}', '{$empleado->getTiempoDeServicio()}', '{$empleado->getSueldo()}', '{$empleado->getNumeroHijos()}')"))
    		{
    			echo "Falló la llamada: (" . $mysqli->errno . ") " . $mysqli->error;
    		}
            Conexion::Conectar()->close();
             echo '<script type="text/javascript">window.location="../vistas/Msj_Insertar.php";</script>';
    	}

        public function ListarEmpleado()
        {
            $query = "SELECT * FROM v_Empleados ORDER BY idEmpleado";
            $resultado = Conexion::Conectar()->query($query);
            while ($registro = $resultado->fetch_assoc()) 
            {
                $this->empleado[] = $registro;
                
            }
            return $this->empleado;
            $resultado->free();
             Conexion::Conectar()->close();
        } 

        public function EliminarEmpleado($id)
        {
            if(!Conexion::Conectar()->query("CALL Eliminar_Empleado('$id')"))
            {
                echo "Falló la llamada: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            Conexion::Conectar()->close();
            echo '<script type="text/javascript">window.location="../vistas/Msj_Eliminar.php";</script>';
        }

        public function CapturarEmpleado($id)
        {
            $query = "SELECT * FROM v_Empleados WHERE IdEmpleado = '$id'";
            $resultado = Conexion::Conectar()->query($query);
            if ($registro = $resultado->fetch_assoc())
            {
                $this->empleado[] = $registro;
                return $this->empleado;
            }
            else
            {
                echo '<script type="text/javascript">alert("Este código no existe"); window.location="../vistas/Lista_Empleados.php";</script>';
            }
            Conexion::Conectar()->close();
        }

            public function EditarEmpleado($id, $area, $condicion, $persona, $empleado)
        {
            if(!Conexion::Conectar()->query("CALL EditarEmpleado('$id','{$persona->getNombre()}', '{$persona->getApPaterno()}', '{$persona->getApMaterno()}', '{$condicion->getNombreCondicion()}', '{$area->getNombreArea()}', '{$persona->getFechaNacimiento()}', '{$empleado->getTiempoDeServicio()}', '{$empleado->getSueldo()}', '{$empleado->getNumeroHijos()}')"))
            {
                echo "Falló la llamada: (" . $mysqli->errno . ") " . $mysqli->error;
            }
            Conexion::Conectar()->close();
        }

        public function BuscarPorNombre($valor)
        {
            $query = $query = "SELECT * FROM v_Empleados WHERE apPaterno LIKE '%".$valor."%'";   
            $resultado = Conexion::Conectar()->query($query);
            while ($registro = $resultado->fetch_assoc()) 
            {
                $this->empleado[] = $registro;
                
            }
            return $this->empleado;
            Conexion::Conectar()->close();
        }

        public function CapturarEmpleadoJson($id)
        {
            $query = "SELECT * FROM v_Empleados WHERE IdEmpleado = '$id'";
            $resultado = Conexion::Conectar()->query($query);
            if ($registro = $resultado->fetch_assoc())
            {
                $this->empleado[] = $registro;
                return $this->empleado;
            }
            else
            {
                echo '<script type="text/javascript">alert("Este código no existe"); window.location="../vistas/Lista_Empleados.php";</script>';
            }
            Conexion::Conectar()->close();
        }

         public function ListarEmpleadoJson($valor)
        {
            $query = "SELECT * FROM v_Empleados WHERE apPaterno LIKE '%".$valor."%'";
            $resultado = Conexion::Conectar()->query($query);
            while ($registro = $resultado->fetch_assoc()) 
            {
                $this->empleado[] = $registro;
                
            }
            return $this->empleado;
            $resultado->free();
             Conexion::Conectar()->close();
        }

        // Listar todos los apellidos paternos
         public function ListarEmpleadoPorApellido()
        {
            $query = "SELECT apPaterno FROM v_Empleados ORDER BY idEmpleado";
            $resultado = Conexion::Conectar()->query($query);
            while ($registro = $resultado->fetch_assoc()) 
            {
                $this->empleado[] = $registro;
                
            }
            return $this->empleado;
            $resultado->free();
             Conexion::Conectar()->close();
        } 
	}
 ?>