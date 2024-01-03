<?php

use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\File;

// Handle file upload
function handleUpload($inputName, $model=null){

try {
    if (request()->hasFile($inputName)) {
        if ($model && File::exists(public_path($model->{$inputName}))) {
            File::delete(public_path($model->{$inputName}));
        }
        $file = request()->file($inputName);
        $fileName = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads'), $fileName);
        $filePath = "uploads/{$fileName}";
        return $filePath;
    }
} catch (\Exception $e) {
    throw $e;
}

}

function deleteFileIfExist($filePath){
    if (File::exists(public_path($filePath))) {
        File::delete(public_path($filePath));
    }
}


// get dynamic color
function getColor($index){
    $color=['#558bff', '#fecc90','#ff885e','#282828','#190844','#190844'];
    return$color[$index % count($color)];
}



// set side bar active

function setActive($route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}
