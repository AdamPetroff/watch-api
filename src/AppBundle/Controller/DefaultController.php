<?php

namespace AppBundle\Controller;

use AppBundle\Exceptions\MySqlRepositoryException;
use AppBundle\Exceptions\MySqlWatchNotFoundException;
use AppBundle\Service\WatchManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class WatchController extends Controller
{
    /**
     * @var WatchManager
     */
    private $watch_manager;

    public function __construct(WatchManager $watch_manager)
    {
        $this->watch_manager = $watch_manager;
    }

    /**
     * @param $id
     * @Route("/watch/{id}", methods={"GET"})
     * @return JsonResponse
     */
    public function getById($id)
    {
        if(!is_int($id) || $id < 1){
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Watch id must be a number bigger than 0',
                'data' => null
            ], 400);
        }
        else{
            try{
                $watch = $this->watch_manager->getWatchById($id);
            }
            catch (\RuntimeException $e){
                if($e instanceof MySqlWatchNotFoundException){
                    return new JsonResponse([
                        'status' => 'error',
                        'message' => 'Watch not found',
                        'data' => null
                    ], 404);
                }
                elseif($e instanceof MySqlRepositoryException){
                    return new JsonResponse([
                        'status' => 'error',
                        'message' => 'The retrieval of data has failed',
                        'data' => null
                    ], 500);
                }
                else{
                    return new JsonResponse([
                        'status' => 'error',
                        'message' => 'Internal server error',
                        'data' => null
                    ], 500);
                }
            }

            if(empty($watch)){
                return new JsonResponse([
                    'status' => 'error',
                    'message' => 'Watch not found',
                    'data' => null
                ], 404);
            }
            else{
                return new JsonResponse([
                    'status' => 'success',
                    'message' => null,
                    'data' => $watch
                ]);
            }
        }
    }
}
