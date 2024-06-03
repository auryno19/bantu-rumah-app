<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\CosineSimilarity;
use App\Models\Asistant;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd($request);    
        $results = [];
        $asistants = Asistant::gender(request('gender'))
            ->umur(request(['min_umur', 'max_umur']))
            ->ket(request('keterangan'))->get();


            // dd($asistants);
        if ($request->input('deskripsi') == null) {
            foreach ($asistants as $asistant){
                $results[] = [
                    'asistant' => $asistant,
                    'similarity' => 1,
                ];
            }

        } else {

            $query = $request->input('deskripsi');
            // dd($query = $request->input('search'));
            error_log("Query: " . $query); // Log query



            // dd($asistants);
            foreach ($asistants as $asistant) {
                $similarity = (new CosineSimilarity())->calculateSimilarity($query, $asistant->deskripsi);
                error_log("Asistant Description: " . $asistant->deskripsi); // Log description
                error_log("Similarity Score: " . $similarity); // Log similarity score

                if ($similarity > 0.0) {
                    $results[] = [
                        'asistant' => $asistant,
                        'similarity' => $similarity,
                    ];
                }
            }

            usort($results, function ($a, $b) {
                return $b['similarity'] <=> $a['similarity'];
            });
        }
        // dd($results);
        return view('index', compact('results'));
    }
}
