<?php

use Desafio\Commons\Http\Proxy\User\FindUserControllerProxy;
use Desafio\Commons\Http\Proxy\User\StoreUserControllerProxy;

return [
  '/user/store'   => StoreUserControllerProxy::class,
  '/user/find'    => FindUserControllerProxy::class
];
