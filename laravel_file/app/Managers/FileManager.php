<?php

namespace App\Managers;

//use http\Client\Request;
use Illuminate\Http\Request;
use App\Models\File;

class FileManager
{
    /**
     * @param Request $request
     * @param string $field
     * @param string $path
     * @return File
     */
    /*   public function saveFile(Request $request, string $field, string $path): File
       {
                   // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
                   if ($request->hasFile($field) && $request->file($field)->isValid()) {
                       // Įkeliame failą į /tmp/ aplanką
                       $image = $request->file($field);

                       // Gaunamas paveikslelio pavadinimą
                       $clientOriginalName = $image->getClientOriginalName();

                       // Atlieka /tml/phpHG948fWRFG paveikslelio perkelima į public/img/products katalogą
                       $image->move(public_path($path), $clientOriginalName);

                       // Sukurti naują DB įrašą su paveikslelio pavadinimu ir kitai duomenimis į file_data lentele
                       // Gauta rezultatą gražiname
                       return File::create([
                           'path' => public_path($path) . '/' . $clientOriginalName,
                           'url' => '/'. $path . '/' . $clientOriginalName,
                           'name' => $clientOriginalName,
                           'size' => $image->getSize(),
                           'extension' => $image->getClientOriginalExtension(),
                       ]);
                   }
               }
       }*/

    public function saveFile(Request $request, $field, $path)
    {
        // Check if a file was uploaded and it is valid
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            $file = $request->file($field);

            // Generate a unique filename and save the file to the public disk
            $filename = $file->hashName();
            $file->storeAs($path, $filename, 'public');

            // Save the file metadata to the "files" table
            $savedFile = File::create([
                'path' => $path . '/' . $filename,
                'name' => $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
            ]);

            // Return the saved file object
            return $savedFile;
        }
        return null;
    }
}



