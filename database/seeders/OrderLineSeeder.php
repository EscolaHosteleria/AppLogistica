<?php

namespace Database\Seeders;

use App\Models\OrderLine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderLineSeeder extends Seeder
{
    private $arrayCategories = array(
        array(
            'name' => 'Fruites i verdures'
        ),
        array(
            'name' => 'Carns i formatges'
        ),
        array(
            'name' => 'Farines'
        ),
        array(
            'name' => 'Economat'
        ),
        array(
            'name' => 'Congelats'
        ),
        array(
            'name' => 'Peix fresc'
        ),
        array(
            'name' => 'Ous'
        ),
        array(
            'name' => 'SOSA'
        ),
        array(
            'name' => 'Fruits secs'
        ),
        array(
            'name' => 'Làctics i xocolates'
        ),
        array(
            'name' => 'Neteja'
        )
    );
    private $arrayObservations = array(
        array(
            'id' => '1',
            'name' => ''
        ),
        array(
            'id' => '2',
            'name' => 'Per a primera hora'
        ),
        array(
            'id' => '3',
            'name' => 'Poden ser menys'
        ),
        array(
            'id' => '4',
            'name' => 'Per a ultima hora'
        ),
        array(
            'id' => '5',
            'name' => 'Molt necessari'
        ),
    );
    private $arrayProductos = array(
        array(
            "name" => "Albercoc (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alberginia (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alfabrega fresca (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alfalç Germinats (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alls (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alls tendres (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alvocats (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Apit (BULB)",
            "category_id" => "1"
        ),
        array(
            "name" => "Aranja (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Berros (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Bledes fresques (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Boniato (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Bròquil (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Broquil verd (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Brots de cilantre (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Brots variats (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cabdells (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Calçots (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Carbassa (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Carbassó (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cargols (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Carxofes (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Castanyes (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Ceba figueres (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Ceba tendre (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cebes (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cebes vermelles (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cebetes (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Celeri/ Api-rabe (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cerfull (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Ciboulet (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cilantre (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cogombres (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Col (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Col d'hivern (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Coliflor (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cols de Brusel·les (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Coriandre (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Creixems (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Enciam llarg (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Enciam maravilla (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Enciam romana (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Endivies (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Escalunya (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Escarola fina (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Espàrrecs blancs (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Esparrecs verds (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Espinacs (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Farigola (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Faves (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Faves fresques (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Figues (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Fisalis (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Fonoll (BULB)",
            "category_id" => "1"
        ),
        array(
            "name" => "Fulla roure (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Fulles de salvia (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Gengibre (BULB)",
            "category_id" => "1"
        ),
        array(
            "name" => "Gerds (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Germinats (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Gingebre (BULB)",
            "category_id" => "1"
        ),
        array(
            "name" => "Girgoles (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Guindilla fresca (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Julivert (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Kiwi (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Kumkuat (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Llima (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Llimones (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Lollo rosso (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Maduixa (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Magrana (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mandarines (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mango (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Melo Bruño (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Menta fresca (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mesclum (CAIXA 500GR)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mini hortalisses ",
            "category_id" => "1"
        ),
        array(
            "name" => "Moixerno o bolet de cultiu (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mongeta del ganxet (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mongeta perona (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Mongeta verda fina (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Moniato (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Nap (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Nyores (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Papaia (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pastanagues (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Patata agria (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Patata canabek (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Patata gallega (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Patates monalisa (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pebrot verd italià (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pebrot vermell (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pebrots del padrò (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pera blanquilla (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pera conference (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pesols frescos (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Pinya (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Platan (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Platano macho (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Poma (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Porro (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Préssec (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Radiccio (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Raïm blanc de taula (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Remolatxa cuita (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Rossinyols (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Rucula (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Sajolida (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Taronges (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Taronja sanguina (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Tomata canari (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Tomata cherry (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Tomata cor de bou madur (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Tomata d'amanir (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Tomata de penjar (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Xampinyons (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Xirivia (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Escarola pais (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Yuca (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Remolatxa crua (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Fulla de llima kaffir (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Jalapeño (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Ají (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Col china (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Col lombarda (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Patata agria (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Apit (MANAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Shitaque (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Germinats Garús (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Jalapenyo Garús (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Alvocats (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Germinats de remolatxa (BOSSA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Anet fresc (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Ceba morada (KG)",
            "category_id" => "1"
        ),
        array(
            "name" => "Cúrcuma (SAFATA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Xalota (BOSSETA)",
            "category_id" => "1"
        ),
        array(
            "name" => "Enciam Iceberg (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Col pak choi (UNITAT)",
            "category_id" => "1"
        ),
        array(
            "name" => "Anec de pagés (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Bacon (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Bistec (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Botifarra (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Botifarra blanca prima (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Botifarra del perol (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Botifarra negre prima (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Bottifarra dolça (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Budells 'bulls' (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Budells mitjans (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Budells prims (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Bufetes (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Bull blanc (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Bull negre (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Butifarra blanca prima (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Senglar (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cansalada  (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cansalada amb pebre (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Canya de llom am cap (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cap de llom porc (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "cap i pota vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Careta de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn brotxeta pollastre (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn brotxeta vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn magre de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn per fer perol (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn picada barrejada (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn picada d'hamburguesa (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn picada de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn picada vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn picada ventresca (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn Picadad vedella halal (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Catalana (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cochinillo lechal (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Coll de xai (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Colomi (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Conills (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Costelló de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cua de vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cuixa de pollastre grossa (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cuixa de xai (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Culata de vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Falda vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Fetge d'ànec (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Fetge de pollastre (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Fetge de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Filet de porc (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Filet de vedella (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge blau (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge brie (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge cabra (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge compte (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge emmental barra (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge Feta (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge fresc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge Gruyer (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Sang (LITRES)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge Idiazabal (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge manxec sec (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge mascarpone (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge parmesà (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Formatge ratllat (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Fotmatge serrat d'ovella (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Frankfurts (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Gallina  (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Galtes de porc  (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Greix per fer greixons (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Greixots (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Jarret de vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llangonissa (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llard de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llata de vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llebre (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llengua de porc (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llom (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Salsitxon (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Llom baix porc os (UNITATS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Magret d'ànec (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Mantellina de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Moll d'os (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Morcilla (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Mozzarella bola fresca (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Mozzarella en barra  (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossobuco (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossos amb carn vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossos blancs (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossos d'espinada de vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossos d'esquena salatas (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossos de pernil salat (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ossos de pollastre (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Panxeta de sal i pebre (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Panxeta iberica (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Papada de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Parmesà ratllat (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Parmesà taco (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Patè (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Perdius (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pernil de porc enter cru 'petit' (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pernil Dolç (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pernil salat (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pernil Salat bo per montadito (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Peus de porc partits (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Peus de vedella partits (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Philadelphia (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Picantó 500gr (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pit de pollastre (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pollastre (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pollastre de pages (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Presa iberica (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ricotta (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Rodó de vedella lligat (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Ronyons de porc (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Rulo formatge de cabra (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Sagí (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Salsitxes (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Sobrassada (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Tapa plana vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Tripa blanca de vedella (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Vedella per brasejar (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Xuia per la brasa (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Xurrasco per la brasa (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn de perol (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pernil d'aglà (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pit de xai (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Coll de vedella picat (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn magre de vedella (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Os de pernil (UNITAT)",
            "category_id" => "2"
        ),
        array(
            "name" => "Xoriç (TALLS)",
            "category_id" => "2"
        ),
        array(
            "name" => "Pernil salat (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Cansalada Ibèrica (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Aletes de pollastre (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Carn de vedella per guisar daus (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Mozzarella ratllat (KG)",
            "category_id" => "2"
        ),
        array(
            "name" => "Farina nº1",
            "category_id" => "3"
        ),
        array(
            "name" => "Farina nº3",
            "category_id" => "3"
        ),
        array(
            "name" => "Farina nº5F",
            "category_id" => "3"
        ),
        array(
            "name" => "Farina nº6",
            "category_id" => "3"
        ),
        array(
            "name" => "Farina Sègol",
            "category_id" => "3"
        ),
        array(
            "name" => "Farina Sègol",
            "category_id" => "3"
        ),
        array(
            "name" => "Llevat premsat (CAIXA)",
            "category_id" => "3"
        ),
        array(
            "name" => "Margarina full (CAIXA)",
            "category_id" => "3"
        ),
        array(
            "name" => "Margarina croissant (CAIXA)",
            "category_id" => "3"
        ),
        array(
            "name" => "Aigua 1,5l plàstic (FARDO)",
            "category_id" => "4"
        ),
        array(
            "name" => "Aigua amb gas (CAIXA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Aigua mineralització baixa (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Aigua sense gas Veri (CAIXA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Alga Nori (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "All negre (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Amaretto Disarono (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Angostura (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Anís estrellat (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Anis sec (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Anxoves filet (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs Basmatí (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs Bomba (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs Carnaroli (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Olives negres morades (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs inflat (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs llarg (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arros sushi (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Barreja especes per adob (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Batida de coco (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Blat de moro (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Bourbon (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Brandy (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Brots de bambu (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cabell d'angel (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Café descafeinat sol·luble (SOBRE)",
            "category_id" => "4"
        ),
        array(
            "name" => "Caldo dashi (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Campari (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Canyella branca (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Canyella pols (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cardamom (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cava (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Caviar d'arengada (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cayena (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Ceba deshidratada (BOSSA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Ceps secs (BOSSA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cervesa (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cigrons bullits (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cigrons secs (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cireres al marrasquino (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Clau espècie (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cocacola 2L (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cogombrets en vinagre (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Comí en llavor (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Contreau (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Corn Flakes (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Crema de cacahuet (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Crema de cacao (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Crema de cassis (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cuajada  pols (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Curri (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Curri verd (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cuscús (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Espaguettis (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Espàrrec blanc (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Olivada negre  (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Estracta de vainilla (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fajitas de blat de moro (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fanta llimona 2L (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fanta Taronja 2L (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Farigola (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Farina 1 kg (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Farina blat negre (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Farina de cigrons (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fideus arròs (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Galetes maria (PAQUET)",
            "category_id" => "4"
        ),
        array(
            "name" => "Galets (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Garum (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Gelatina cua de peix (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Gelatina de poma (GALLEDA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Gengibre en vinagre (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Ginebra (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Glucosa (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Grand marnier (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli vegetal (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Guindilla seca (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Herbes provença (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Ketchup (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Licor de cafè (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Lima (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llaços tricolor pasta (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llavors de groselles (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llenties seques (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llet de coco (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llet desnatada en pols (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llet en pols (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llevat fresc (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Llorer (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Macarrons (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Maionesa HELLMANS (GALLEDA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Maizena (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Malibú (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Margarina de croissant (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Margarina de full (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Martini sec (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mel (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mermelada albercoc (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mill (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Moixernons secs (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mongeta bullida (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mongetes seques (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Moscatell (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mostassa (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mostassa antiga (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mostassa dijon (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Noodles (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Nou moscada (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Nyores seques (RISTRA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Obleas de gamba (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli de tofona (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli girasol (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli oliva (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli oliva suau (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli picant (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Olives verdes sense pinyol (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oporto (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Orenga (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pa d'espècies (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pa ratllat (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pasta fideu cabell angel (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pasta filo (PAQUET)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pasta Wanton (PAQUET)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pebre blanca (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pebre negre (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pebre verd (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pebre vermell (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pebrot piquillo (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Perrins (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Piemnton dolç (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pimenton de la vera dolç (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pimenton de la vera picant (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pimenton picant (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pinya Almivar (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pisco (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Plaques canelons (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pols de bolets sec (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pot anxova bruta - 100 unitats (GALLEDA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pressec almivar (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Quinoa (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Ratafia (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Rom bacardí (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Rom Pujol (AMPOLLA",
            "category_id" => "4"
        ),
        array(
            "name" => "Romaní (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Royal (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Safrà - gr.",
            "category_id" => "4"
        ),
        array(
            "name" => "Sal (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sal d'api (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sal fumada (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sal gruixuda 'per coure al forn' (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sal maldon (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Salsa Espinaler (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Salsa Miso (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Salsa peix tailandesa (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sesam (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sesam negre (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sesam torrat (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Shitake sec (BOSSA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Soja (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Suc d'aranyons (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Suc de poma (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Suc de tomata (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Suc pinya (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Suc pressec (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Suc taronja (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sucre (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sucre  moré (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sucre llustre (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Sucre Moscovado (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tabasco (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tahin (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tapares (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tio Pepe (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tofona (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tofu (PAQUET)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tomàquet triturat (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tonyina oli (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Torro de xixona (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Trametzzini 'pa motllo allargat' (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Triple sec (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vainilla (BAINA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vainilla estracte (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vermuth negre (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vi blanc cuina (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vi d'arròs (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vi de Marsala (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vi negre cuina (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vi ranci (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Viangre blanc (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre d'arròs (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre de poma (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre Forum 'Taules Restaurant' (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre jerez (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre Mòdena (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre vi negre (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vodka Moskovskaya (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Wasabi (GRAMS)",
            "category_id" => "4"
        ),
        array(
            "name" => "Whisky scotch (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "XIPS DE CEBA (BOSSA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Aigua de roses (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Armanyac (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Galets gegants (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Farina d'ametlla (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli d'oliva extra verge (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Olives negres sense pinyol (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pa panko (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Pernot (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tortitas (PAQUET)",
            "category_id" => "4"
        ),
        array(
            "name" => "Olives verdes manzanilla (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fideus nº 1 (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Moixernons en conserva (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Mongetes Michigan (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tandori Massala en pols (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oliva negre  s/os (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Curry de Madras (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli de cacauet (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Miso roig (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Brioix (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Alga Kombu (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Salsa Teriyaki (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli de sèsam (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Margarina de soja (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Formatge tofu (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Arròs integral (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vinagre blanc (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Vi xerès sec (AMPOLLA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli per fregir (LITRES)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fideus nº2 (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tapioca (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Espirals 'Fusillis' (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Olives verdes farcides (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Oli fregidora (BIDÓ)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tomata triturat natural (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tomata enter natural (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Niblets blat de moro (LLAUNA)",
            "category_id" => "4"
        ),
        array(
            "name" => "Càrregues Sifó ISI (UNITAT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Fava Tonka (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Cacao (KG)",
            "category_id" => "4"
        ),
        array(
            "name" => "Tomàquet sec amb oli (POT)",
            "category_id" => "4"
        ),
        array(
            "name" => "Bacallà esqueixat (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Bacallà penca barata (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Barreja bolets (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Barreta de cranc (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Calamar gros enter (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Calamar mitja (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Calamar per farcir (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Camarones (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Clavellada (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Escamarlà (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Espinacs (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Fardo de Gel (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Faves (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Faves baby (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Fruits vermells (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Fulles llima Keffir",
            "category_id" => "5"
        ),
        array(
            "name" => "Gamba (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Gamba pelada GROSSA (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Gules (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Llagostins (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Llenguadina (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Llenguado mitjà (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Llom o Morro de bacalla (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Lluç (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Mongeta verda (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Mongeta verda molt fina (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Morro de bacallà(KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Musclos bossa cuits (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Pasta wanton (PAQUET)",
            "category_id" => "5"
        ),
        array(
            "name" => "Pèsols (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Pop - peça 2,5 kg (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Rosada - de 2,5 kg (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Sepia bruta x arròs  (UNITAT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Tinta calamar (POT)",
            "category_id" => "5"
        ),
        array(
            "name" => "Gamba yeye (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Gamba petita paella (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Camarones (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Surimi (KG)",
            "category_id" => "5"
        ),
        array(
            "name" => "Anxova per dessalar (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Arangada (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Boquerons (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Cap de rap (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Caviar de truita (POT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Cloïses (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Corball - peça 2,5 kg (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Cranc sopa (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Fetge de rap (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Filets anxova (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Gamba economica (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Llagosti economic (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Llobarro 500 gr. (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Llobarro ració 200/300 (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Lluç 2 - 2,5 kg aprox (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Seitó (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Lluces (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Mantega (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Morralla per fumet (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Musclo de roca (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Orades 300/400 gr. (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Pa de gamba (BOSSA)",
            "category_id" => "6"
        ),
        array(
            "name" => "Pop - peça 1,5 kg  (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Rap gran amb cap (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Rogers (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Rosada (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Salmó - peça 2,5 kg  (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Salmó fumat (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Sardines grossa (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Sorell peça gran (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Tonyina vermella (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Tripa de bacallà (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Truites de riu (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Verat GRANS (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Gambeta arrossera (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Viera (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Ostres (UNITAT)",
            "category_id" => "6"
        ),
        array(
            "name" => "Escopinya (KG)",
            "category_id" => "6"
        ),
        array(
            "name" => "Clara d'ou pasteuritzat (LITRES)",
            "category_id" => "7"
        ),
        array(
            "name" => "Ou pasteuritzat (LITRES)",
            "category_id" => "7"
        ),
        array(
            "name" => "Ous (UNITAT)",
            "category_id" => "7"
        ),
        array(
            "name" => "Ous de guatlla (UNITAT)",
            "category_id" => "7"
        ),
        array(
            "name" => "OUS TALLA S (UNITAT)",
            "category_id" => "7"
        ),
        array(
            "name" => "Rovell d'ou pasteuritzat (LITRES)",
            "category_id" => "7"
        ),
        array(
            "name" => "Agar-agar (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Airbag porc (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Alga Kombu seca (PAQUET)",
            "category_id" => "8"
        ),
        array(
            "name" => "Alginat (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Aroma cafè (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Avellanes pelada (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Barreja de llavors (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Bubble (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Dextrosa (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Emulsionante en pasta (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Fulles de gelatina (UNITAT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Gelan (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Gelificant Vegetal (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Glicemul (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Gluconalactat (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Gelcrem calent (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Glucosa liquida (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Impulsor (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Instangel (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Kuzu (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Lamina pasta al huevo fresca (UNITAT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Lecitina de Soja (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Litxis en conserva (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Llet de coco (LITRES)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa mango (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Llevat sec (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Maltodextrina (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Maltosec (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Miso roig (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Naturmul (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Oli de cacauet - amp",
            "category_id" => "8"
        ),
        array(
            "name" => "Oli sèsam (LITRES)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pasta cacauet (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pasta Cafè economica (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pasta de festuc (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pasta de pinyó (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pasta pura d'ametlla (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pinyó economic (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pistatxo economic (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa de cirera (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa de coco (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa de gerds (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa de maduixa (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa fruita (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa gerds (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Polpa yuzu (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pro Espuma - Calent (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pro Espuma - Fred (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Procrema 100 calent (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Procrema 100 fred (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Prosorbet 100 fred (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pure de maduixa (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Regalesia en pols (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Sal maldon (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Salsa Teriyaki (LITRES)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pols d'oliva (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Salsa Yakisoba (LITRES)",
            "category_id" => "8"
        ),
        array(
            "name" => "Salsa Yakitori (LITRES)",
            "category_id" => "8"
        ),
        array(
            "name" => "Sorbitol (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Sucre antihumitat (KG)",
            "category_id" => "8"
        ),
        array(
            "name" => "Sucre invertit (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Tandori Massala (AMPOLLA)",
            "category_id" => "8"
        ),
        array(
            "name" => "Xantana (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Praliné ametlla (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Airbag de patata (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pasta de cacaue (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Gelburguer (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Inulina (GRAMS)",
            "category_id" => "8"
        ),
        array(
            "name" => "Pebre de Sechuan (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Colorant Blanc TITANI (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Gelcrem fred (POT)",
            "category_id" => "8"
        ),
        array(
            "name" => "Ametlla farina (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Ametlla granet (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Ametlla laminada (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Ametlla marcona (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Ametlla palet (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Ametlla torrada (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Anacards (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Cacauets pelats (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Cigrons Fruit sec (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Coco ratllat (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Nous pelades (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Orellanes (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Panses sense os (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Prunes seques (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Festucs pelats (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Avellana (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Pipes de carbassa (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Prunes s/os (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Pinyons (KG)",
            "category_id" => "9"
        ),
        array(
            "name" => "Barretes de xocolata vegetal (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Cacau - kg",
            "category_id" => "10"
        ),
        array(
            "name" => "Cobertura amb llet (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Cobertura blanca (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Cobertura negra Arriba 50% (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Crema de cacau (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Iogurt grec (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Iogurt natural (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Llet entera  (LITRES)",
            "category_id" => "10"
        ),
        array(
            "name" => "Mantega (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Mantega de cacau (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Margarina de croissant (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Margarina de full (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Mató (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Mozarela (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Nata 18% (LITRES)",
            "category_id" => "10"
        ),
        array(
            "name" => "Nata 35% (LITRES)",
            "category_id" => "10"
        ),
        array(
            "name" => "Nata UHT (LITRES)",
            "category_id" => "10"
        ),
        array(
            "name" => "Philadelphia (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Recuït (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Ricotta (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Kefir de cabra (KG)",
            "category_id" => "10"
        ),
        array(
            "name" => "Iogurt natural individual (UNITAT)",
            "category_id" => "10"
        ),
        array(
            "name" => "Vasos de plastic (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Blocs de comanda (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bobines paper (FARDO)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bol petit plastic (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses buit grans (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses buit mitjanes (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses buit petites (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses residu gran (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses residu petites (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Broquetes 20cm (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Brotxeta fusta de 15cm (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Camins (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Canyetes 'Palletes' (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Carregues de sifò(UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Paper WC industrial (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Cubell (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Cullera petita plàstic (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Detergent 'desatascador' (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Detergent amoniacal terra (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Escombres (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Escuradents (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Estovalles paper 120*80 (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Fil de bridar (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Forquilleta plàstic (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Fregall verd (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Fregones (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Guans làtex  talla M (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Mànigues plàstic (ROTLLE)",
            "category_id" => "11"
        ),
        array(
            "name" => "Motlles flam alumini (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Nanes (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Pals escombres Alumini (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Paper alumini (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Paper film (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Paper sulfuritzat (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Baietes microfibra Colors (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Drap negres cambrers (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "plat mandonguilla (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Platet fons petit (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Recollidor (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Guants negres T. L (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Rotlle draps de repassar (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Sabó - Neteja terres (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Guants negres T. M (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Safata cartro+blonda 30cm (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "T de goma (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Tovallons paper 10*10 (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Tovallons paper 20*20 1 capa (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Tovallons paper 40*40 2 capes (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Terrina plàstic Dynatrays 750ml (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Terrina plàstic Dynatrays 500ml (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Plàstic màquina envasar (ROTLLE)",
            "category_id" => "11"
        ),
        array(
            "name" => "Etiquetes per la DIMO (ROTLLE)",
            "category_id" => "11"
        ),
        array(
            "name" => "Sabò rentaplats garrafa 5l. (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Rotlles fregalls verd (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses escombraries reciclatge (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Lleixiu (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Drap rivet blau repassar (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Desengrassant fort (BIDÓ)",
            "category_id" => "11"
        ),
        array(
            "name" => "Manegues pastisseres (PAQUET)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bobines paper Industrial (FARDO)",
            "category_id" => "11"
        ),
        array(
            "name" => "Antical maquines office (AMPOLLA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Motlles rodons alumini 22cm (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Biberons plàstic (UNITATS)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bactericida (GARRAFA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Raspall BUQUE5X10",
            "category_id" => "11"
        ),
        array(
            "name" => "Raspall MANEC FUSTA 1,20x22",
            "category_id" => "11"
        ),
        array(
            "name" => "Bosses escombreries 70*85 negres (CAIXA)",
            "category_id" => "11"
        ),
        array(
            "name" => "Terrina plàstic Dynatrays 1000ml (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bossa paper marró 1 entrepà (UNITAT)",
            "category_id" => "11"
        ),
        array(
            "name" => "Bossa paper marró 1 croissant (UNITAT)",
            "category_id" => "11"
        )
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedOrderLine();
        $this->command->info('Tabla orders inicializada con datos!');
    }

    /**
     *
     * @return void
     */
    private function seedOrderLine()
    {
        DB::table('order_lines')->delete();
        for($i = 1 ; $i < 63 ; $i++){
            for ($j = 1 ; $j < rand(3,10) ; $j++){
                $nProducte = rand(0,782);
                $product = explode("(", $this->arrayProductos[$nProducte]['name']);
                $product_name = trim($product[0]);
                $category_name = $this->arrayCategories[$this->arrayProductos[$nProducte]['category_id']-1]['name'];
                if(count($product) == 1){
                    $format_name = "KG";
                }else{
                    $format_name = explode("(", $this->arrayProductos[$nProducte]['name'])[1];
                    $format_name = str_replace(")", "", $format_name);
                }
                
                $o = new OrderLine();
                $o->order_id = $i;
                $o->product_name = $product_name;
                $o->category_name = $category_name;
                $o->quantity = rand(1,10);
                $o->format_name = $format_name;
                $random = rand(0,4);
                if($random != 0){
                    $o->observation = $this->arrayObservations[$random]['name'];
                }
                $o->save();
            }
        }

        /* for($i = 1 ; $i < 109 ; $i++){
            for ($j = 1 ; $j < 4 ; $j++){
                $o = new OrderLine();
                $o->order_id = $i;
                $o->product_name = "product_name".$j;
                $o->category_name = "category_name".$j;
                $o->quantity = $j;
                $o->format_name = "format_name".$j;
                $o->observation = "observation".$j;
                $o->save();
            }
        } */
    }
}
