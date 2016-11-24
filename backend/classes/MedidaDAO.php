<?php


class MedidaDAO implements DefaultDAO
{

    public static function getInstance() {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    public function conecta(){

        $connection = new ConnectionFactory();

        return $connection->getConnection();
    }

    public function insert($object)
    {
        $connection = $this->conecta();

        $date = $object->getDate();
        $image = $object->getImage();
        $temperature = $object->getTemperature();
        $humidity = $object->getHumidity();
        $moisture = $object->getMoisture();

        $insert = "INSERT INTO medida (`date`,image,temperature,humidity,moisture) VALUES($date,'$image',$temperature,$humidity,$moisture)";

        if(!mysqli_query($connection,$insert)){
            echo("Error description: " . mysqli_error($connection))."<br/>";
        }

    }

    public function delete($object)
    {

    }

    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function getBy($data)
    {
        // TODO: Implement getBy() method.
    }

    public function getAll()
    {
        $connection = $this->conecta();
        $query = 'SELECT id,date,temperature,humidity,moisture FROM medida';

        $result = mysqli_query($connection,$query);


        while ($row = $result->fetch_assoc()){

            $data[] = $row;

        }

        return $data;
    }

    public function getAllComImagens()
    {
        $connection = $this->conecta();
        $query = 'SELECT * FROM medida';


        $result = mysqli_query($connection,$query);


        while ($row = $result->fetch_assoc()){

            $data[] = $row;

        }

        return $data;
    }

    public function getUltimaMedida(){

        $connection = $this->conecta();

        $query = "SELECT * FROM medida WHERE id = (SELECT MAX(id) FROM medida)";

        $result = mysqli_query($connection,$query);

        $data = mysqli_fetch_object($result);

        mysqli_close($connection);

        return $data;
    }

    public function getImage($object){

        $connection = $this->conecta();

        $id = $object->getId();

        $query = "SELECT image FROM medida WHERE id = $id";

        $result = mysqli_query($connection,$query);

        $data = mysqli_fetch_object($result);

        mysqli_close($connection);

        return $data;
    }
}