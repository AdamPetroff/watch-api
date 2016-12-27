<?php

namespace AppBundle\Components;

/**
 * Created by Adam The Great.
 * Date: 27. 12. 2016
 * Time: 18:00
 */
class MySqlWatchDTO
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var int
     */
    public $price;
    /**
     * @var string
     */
    public $description;

    /**
     * @param int $id
     * @param string $title
     * @param int $price
     * @param string $description
     */
    public function __construct(int $id, string $title, int $price, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }
}