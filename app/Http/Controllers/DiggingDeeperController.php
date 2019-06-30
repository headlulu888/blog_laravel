<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    public function collections()
    {
        $result = [];

        $eloquentCollection = BlogPost::withTrashed()->get();

        // dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        $collection = collect($eloquentCollection->toArray());

//        dd(
//            get_class($eloquentCollection),
//            get_class($collection),
//            $collection
//        );

//        $result['first'] = $collection->first();
//        $result['last'] = $collection->last();
//
        $result['where']['data'] = $collection
            ->where('category_id', 10)
            ->values() // показывает ключи по порядку
            ->keyBy('id'); // показывает ключи равные id
//
//        dd(__METHOD__, $result);

        $result['where']['count'] = $result['where']['data']->count();
        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

        // dd(__METHOD__, $result);

        // Первая запись где ...
//        $result['where_first'] = $collection
//            ->firstWhere('created_at', '>', '2019-06-23 08:12:41');
//        dd(__METHOD__, $result);

//        $result['map']['all'] = $collection->map(function (array $item) {
//            $newItem = new \stdClass();
//            $newItem->item_id = $item['id'];
//            $newItem->item_name = $item['title'];
//            $newItem->exists = is_null($item['deleted_at']);
//
//            return $newItem;
//        });

        // dd(__METHOD__, $result);

//        $result['map']['not_exists'] = $result['map']['all']
//            ->where('exists', '=', false);

        // dd(__METHOD__, $result);

        $collection->transform(function(array $item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);

            return $newItem;
        });

        dd($collection);
    }
}
