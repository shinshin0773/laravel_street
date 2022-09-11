<?php

namespace App\Constants;

class Common
{
  const ORDER_RECOMMEND = '0';
  const ORDER_LATER = '1';
  const ORDER_OLDER = '2';
  const ORDER_NEAR = '3';

  const SORT_ORDER = [
    'recommend' => self::ORDER_RECOMMEND,
    'later' => self::ORDER_LATER,
    'older' => self::ORDER_OLDER,
    'near' => self::ORDER_NEAR,
  ];
}
