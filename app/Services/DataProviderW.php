<?php

namespace App\Services;

use Illuminate\Http\Request;

class DataProviderW implements DataProviderInterface
{
    const DATA_PATH = 'providers/DataProviderW.json';
    const STATUS_CODE = [
            'paid' => 'done',
            'pending' => 'wait',
            'reject' => 'nope'
        ];
    private $collection;

    public function __construct()
    {
        $dataPath = database_path(self::DATA_PATH);
        $this->collection = collect(json_decode(file_get_contents($dataPath), true));
    }

    public function list(Request $request){
        $this->filters($request);
        return $this->collection;
    }

    private function filters(Request $request){
        $this->filterByStatus($request);
        $this->filterByAmount($request);
        $this->filterByCurrency($request);
    }

    private function filterByStatus($request){
        if($request->filled('statusCode') && array_key_exists($request->get('statusCode'), self::STATUS_CODE)){
            $this->collection = $this->collection->where('status', self::STATUS_CODE[$request->get('statusCode')]);
        }
    }

    private function filterByAmount($request){
        if($request->filled('amounteMin')){
            $this->collection = $this->collection->where('amount', '>=', $request->get('amounteMin'));
        }
        if($request->filled('amounteMax')){
            $this->collection = $this->collection->where('amount', '<=', $request->get('amounteMax'));
        }
    }

    private function filterByCurrency($request){
        if($request->filled('currency')){
            $this->collection = $this->collection->where('currency', $request->get('currency'));
        }
    }
}