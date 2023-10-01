<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
        // all sources
        public function index()
        {
            $sources = Source::all()->toArray();
            return array_reverse($sources);
        }
    
        // add source
        public function add(Request $request)
        {
            $source = new Source([
                'source_name' => $request->source_name,
                'api_key' => $request->api_key
            ]);
            $source->save();
    
            return response()->json('The source successfully added');
        }
    
        // edit source
        public function edit($id)
        {
            $source = Source::find($id);
            return response()->json($source);
        }
    
        // update source
        public function update($id, Request $request)
        {
            $source = Source::find($id);
            $source->update($request->all());
    
            return response()->json('The source successfully updated');
        }
    
        // delete source
        public function delete($id)
        {
            $source = Source::find($id);
            $source->delete();
    
            return response()->json('The source successfully deleted');
        }
}
