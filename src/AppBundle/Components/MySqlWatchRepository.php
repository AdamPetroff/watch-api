<?php
/**
 * Created by Adam The Great.
 * Date: 27. 12. 2016
 * Time: 17:53
 */

namespace AppBundle\Components;


interface MySqlWatchRepository
{
    /**
     * @param int $id
     * @return MySqlWatchDTO
     * @throw MySqlWatchNotFoundException  Is thrown when the watch could
     *                                     not be found in a mysql
     *                                     database, eg. watch with the
     *                                     associated id does not exist.
     * @throw MySqlRepositoryException     May be thrown on a fatal error,
     *                                     such as connection
     *                                     to a database failed.
     */
    public function getWatchById(int $id) : MySqlWatchDTO;
}
