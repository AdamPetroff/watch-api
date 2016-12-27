<?php

namespace AppBundle\Exceptions;

/**
 * Created by Adam The Great.
 * Date: 27. 12. 2016
 * Time: 18:08
 */

class MySqlRepositoryException extends \RuntimeException { }
class MySqlWatchNotFoundException extends MySqlRepositoryException { } 
class XmlLoaderException extends \RuntimeException { }