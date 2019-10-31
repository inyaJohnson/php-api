<?php
/**
 * Created by PhpStorm.
 * User: tujailer
 * Date: 10/23/19
 * Time: 3:14 PM
 */

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{

    public function apiException($request, $e)
    {
        if($request->expectsJson()){
            if($this->isModel($e)){
                return $this->modelResponse($e);
            }
        }

        if($this->isHttp($e)){
            return $this->httpResponse($e);
        }

        return parent::render($request, $e);

    }

    protected function isModel($e){
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e){
        return $e instanceof NotFoundHttpException;
    }

    protected function modelResponse($e){
        return response()->json([
            "error"=>'Product Model not Found'], Response::HTTP_NOT_FOUND);
    }

    protected function httpResponse($e){
        return response()->json([
            "error"=>'Incorrect Route'], Response::HTTP_NOT_FOUND);

    }






}