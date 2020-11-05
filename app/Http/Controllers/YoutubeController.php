<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class YoutubeController extends Controller
{

    /**
     * Muestra la vista del formulario.
     */
    public function index()
    {
        return view('video.index');
    }

    /**
     *  Realiza la búsqueda y la envía a la vista.
     */
    public function search(Request $request)
    {
        $word = $request->get('search');
        $youtube = new \Madcoda\Youtube\Youtube(array('key' => 'AIzaSyD7tst8nKTADpj0ZBdr-1VaTPx3RQQOpuo'));
        // Parametros
        $params = array(
            'q' => $word,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 20    //Número de resultados
        );
        // Hacer la busqueda con los parametros
        $videos = $youtube->searchAdvanced($params, true);

        // dd($videos);
        return view('video.index', compact('videos'));
    }
}
