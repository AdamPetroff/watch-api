<?php
/**
 * Created by Adam The Great.
 * Date: 27. 12. 2016
 * Time: 18:06
 */

namespace AppBundle\Components;

use AppBundle\Exceptions\XmlLoaderException;

interface XmlWatchLoader {

    /**
     * @param string $watchIdentification
     * @return array|null
     * @throws XmlLoaderException May be thrown on a fatal error, such as
     *                            XML file containing data of watches
     *                            could not be loaded or parsed.
     */
    public function loadByIdFromXml(string $watchIdentification) : array;
}