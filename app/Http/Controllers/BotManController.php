<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use BotMan\BotMan\BotMan;
use App\Models\BotTextModel;
use Illuminate\Http\Request;
use Phpml\Association\Apriori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        //teste area
        $botman = app('botman');
        //área em PT
        //array de saudacoes
        $saudacoesPT = array('bom dia', 'boa tarde', 'boa noite', 'boas', 'olá', 'oi', 'ola', 'Olá');
        //array de perguntas do site
        $site_questionsPT = array('Qual o objetivo da aplicação?', 'para que serve', 'Para que serve?', 'Para que serve', 'qual o objetivo', 'qual o objetivo?', 'Qual o objectivo?', 'qual o objectivo', 'O que é esta aplicação?');
        //fim area em PT
        //area em ingles
        //fim area em Ingles

/* 
        $botman->hears($saudacoesPT, function (BotMan $bot) {
            $person = Auth::user()->name;
            if (!$person) {
                $person = "User";
            }
            $bot->typesAndWaits(2);

            $bot->reply('Olá', $person);
        }); */
        $botman->hears($site_questionsPT, function (BotMan $bot) {
            $bot->typesAndWaits(2);

            $bot->reply('AssetShizz é a primeira aplicação de gestão de assets que junta gestão de conteúdo geral com interação de objetos 3d
            ');
        });
        $botman->hears($saudacoesPT, function (BotMan $bot) {
            list($apriori) = $this->patterns();
         
            $bot->typesAndWaits(2);

            $bot->reply(json_encode($apriori));
        });
        $botman->fallback(function (BotMan $bot) {
            $bot->typesAndWaits(4);

            $bot->reply("Sorry, I didn't understand.");
        });

        $botman->listen();
    }
    public function patterns()
    {
        $associator = new Apriori($support = 0.5, $confidence = 0.5);
        $samples = [];
        $labels  = [];
        $uploads = Asset::select('upload')->take(5000)->get();
        if (count($uploads)) {
            foreach ($uploads as $upload) {
                $filextension[] = pathinfo($upload->upload, PATHINFO_EXTENSION);
            }
            array_push($samples, $filextension);
            $associator->train($samples, $labels);
            //dd($associator->getRules()) ;
            //dd($associator->apriori());
            return array($associator->apriori());
        }
    }
}
