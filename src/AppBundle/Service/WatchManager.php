<?php
/**
 * Created by Adam The Great.
 * Date: 27. 12. 2016
 * Time: 18:17
 */

namespace AppBundle\Service;


use AppBundle\Components\MySqlWatchRepository;
use AppBundle\Components\XmlWatchLoader;

class WatchManager
{

    /**
     * @var MySqlWatchRepository|XmlWatchLoader
     */
    private $data_provider;

    public function __construct($data_provider)
    {
        $this->data_provider = $data_provider;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getWatchById(int $id)
    {
        if($this->data_provider instanceof MySqlWatchRepository){
            $object = $this->data_provider->getWatchById($id);
            return [
                'identification' => $object->id,
                'title' => $object->title,
                'price' => $object->price,
                'description' => $object->description
            ];
        }
        elseif($this->data_provider instanceof XmlWatchLoader)
        {
            $watch_array = $this->data_provider->loadByIdFromXml($id);
            if(empty($watch_array)){
                return null;
            }
            else{
                return [
                    'identification' => $watch_array['id'],
                    'title' => $watch_array['title'],
                    'price' => $watch_array['price'],
                    'description' => $watch_array['desc']
                ];
            }
        }
        else{
            throw new \RuntimeException();
        }
    }
}