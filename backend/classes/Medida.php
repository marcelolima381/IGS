<?php

class Medida
{
    private $id;
    private $date;
    private $image;
    private $temperature;
    private $humidity;
    private $moisture;

    /**
     * Medida constructor.
     */
    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->date = $data['date'];
        $this->image = $data['image'];
        $this->temperature = $data['temperature'];
        $this->humidity = $data['humidity'];
        $this->moisture = $data['moisture'];
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param mixed $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return mixed
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param mixed $humidity
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;
    }

    /**
     * @return mixed
     */
    public function getMoisture()
    {
        return $this->moisture;
    }

    /**
     * @param mixed $moisture
     */
    public function setMoisture($moisture)
    {
        $this->moisture = $moisture;
    }


}