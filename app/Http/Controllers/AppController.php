<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class AppController extends Controller
{
    private function zoopApi(){
        return Http::withToken(env('ZOOM_TOKEN'));
    }

    private function registerToWebinar($params){
        $this->zoopApi()->post('https://api.zoom.us/v2/webinars/91533104027/registrants', [
            'email' => $params['email'],
            'first_name' => $params['nom'],
            'last_name' => $params['prenom'],
            'city' => $params['wilaya'],
            'phone' => $params['telephone'],
            'custom_questions' => [
                [
                    'title' => "Spécialité",
                    'value' => $params['specialite']
                ],
                [
                    'title' => "Affiliation",
                    'value' => $params['affiliation']
                ]
            ]
        ]);
    }
    public function inscription(Request $request)
    {
        $this->registerToWebinar($request->all());
        return back()->with('message','Vous avez été correctement inscrits au webinaire .');
    }
}
