<?php

use Desafio\Commons\Http\Proxy\User\StoreUserControllerProxy;

return [
  /* '/category' =>         ListAllCategoriesControllerProxy::class,
  '/category/store' =>   StoreCategoryControllerProxy::class,
  '/category/find' =>    FindCategoryControllerProxy::class,
  '/category/delete' =>  DeleteCategoryControllerProxy::class,
  '/category/update' =>  UpdateCategoryControllerProxy::class,
  '/product' =>          ListAllProductsControllerProxy::class,
  '/product/store' =>    StoreProductControllerProxy::class,
  '/product/find' =>     FindProductControllerProxy::class,
  '/product/delete' =>   DeleteProductControllerProxy::class,
  '/product/update' =>   UpdateProductControllerProxy::class, */
  '/user/store'   => StoreUserControllerProxy::class,
];
