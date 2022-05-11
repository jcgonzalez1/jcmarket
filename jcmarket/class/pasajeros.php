<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //Muestra los datos en la tabla
    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute() > 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido']; ?></td>
                <td><?php echo $row['tipo_documento']; ?></td>
                <td><?php echo $row['num_documento']; ?></td>
                <td><?php echo $row['fecha_nacimiento']; ?></td>
                <td><?php echo $row['pais']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td>
                    <a class="btn btn-large btn-success" href="edit_pasajeros.php?edit_id=<?php echo $row['id'] ?>"> Editar</a>
                </td>
                <td>
                    <a class="btn btn-large btn-danger" href="eliminar_pasajeros.php?delete_id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>
            </tr>

<?php

        }
    }

    public function update($id, $nombre, $apellido, $tipo_documento, $num_documento, $fecha_nacimiento, $pais, $telefono)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pasajeros SET nombre=:nombre, apellido=:apellido, tipo_documento=:tipo_documento, 
            num_documento=:num_documento, fecha_nacimiento=:fecha_nacimiento, pais=:pais, telefono=:telefono
            WHERE id=:id");
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":tipo_documento", $tipo_documento);
            $stmt->bindparam(":num_documento", $num_documento);
            $stmt->bindparam(":fecha_nacimiento", $fecha_nacimiento);
            $stmt->bindparam(":pais", $pais);
            $stmt->bindparam(":telefono", $telefono);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pasajeros WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pasajeros WHERE id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }
}
