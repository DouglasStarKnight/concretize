<?php namespace App\Helpers;

class urlPagination{
    public static function links(int $page = null, string $find = null, int $total_pages = null, string $pathURL, $querys = null){
        $next = null;
        $previous = null;

        if ($page) {
      if ($page < $total_pages) {
        $next = $next . '&page=' . ($page + 1);
      } else {
        $next = null;
      }
      if ($page > 1) {
        $previous = $previous . '&page=' . (--$page);
      } else {
        $previous = null;
      }
    } else {
      if ($total_pages > 1) {
        $next = 'page=2';
      }
    }

    $next = $next ? $pathURL.'?'.trim(preg_replace("/^&/i", "", $next)) : null;
    $previous = $previous ? $pathURL.'?'.trim(preg_replace("/^&/i", "", $previous)) : null;

    return [ 'next' => $next, 'previous' => $previous ];
  }
        
    }