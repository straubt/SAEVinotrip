<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Index;
use App\Models\Sejour;
use App\Models\Destination;
use App\Models\Categorie_Participant;
use App\Models\Theme;
use App\Models\Route_des_vins;
use App\Models\Panier;
use App\Models\Avis;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Cb;
use App\Models\Sejour_To_Cat_Participant;
use App\Models\Client_Possede_Adresse;
use Gloudemans\Shoppingcart\Facades\Cart;




class IndexController extends Controller
{
    public function index(){ //return homepage view
        return view("welcome", [
            "sejour" => Sejour::orderBy('id_sejour', 'asc')->get(),
            "sejourTri" => Sejour::orderBy('id_sejour', 'asc')->take(6)->get(),
            "client" => Auth::user(),
            "route_des_vins_Tri" => Route_des_vins::take(6)->get(),
            "destination" => Destination::all(),
            "categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(),
            "sejour_to_cat_participant" => Sejour_To_Cat_Participant::all()
        ]);    }

    public function sejour(){ //return all sejours iview
        return view("lessejours", ["sejour" => Sejour::orderBy('id_sejour', 'asc')->get(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(), "sejour_to_cat_participant" => Sejour_To_Cat_Participant::all()]);
    }

    public function unSejour(){ //return clicked sejour view
        $id = $_SERVER["QUERY_STRING"];

        $sejour = DB::table('sejour')->where('sejour.id_sejour', '=', $id)->select('*')->get()[0];
        $id_destination = $sejour->id_destination;

        $avis = DB::table('avis')
            ->join('sejour', 'sejour.id_sejour', '=', 'avis.id_sejour')
            ->join('client', 'client.id_client', '=', 'avis.id_client')
            ->where('avis.id_sejour', $id + 1)
            ->select('nom_client', 'prenom_client', 'note_avis', 'libelle_avis', 'texte_avis', 'date_avis')
            ->get();

        $avisData = DB::table('avis')
            ->where('avis.id_sejour', $id + 1)
            ->select(DB::raw('ROUND(AVG(CAST(note_avis as numeric)), 2) AS "average_note"'), DB::raw('COUNT(*) AS "count_avis"'))
            ->get();

        $etapes = DB::table('etape')
            ->join('sejour', 'sejour.id_sejour', '=', 'etape.id_sejour')
            ->where('etape.id_sejour', $id + 1)
            ->select('titre_etape', 'photo_etape', 'url_etape', 'url_video_etape', 'num_jour_etape')
            ->get();


        $elements_etapes = DB::table('contient_element_etape')
            ->join('etape', 'etape.id_etape', '=', 'contient_element_etape.id_etape')
            ->join('element_etape', 'element_etape.id_element_etape', '=', 'contient_element_etape.id_element_etape')
            ->join('partenaire', 'partenaire.id_partenaire', '=', 'element_etape.id_partenaire')
            ->where('etape.id_sejour', $id + 1)
            ->select('num_jour_etape', 'partenaire.id_partenaire', 'nom_partenaire', 'heure_rdv', 'is_restaurant', 'is_cave', 'is_hotel')
            ->get();

        $sejours_same_destination = DB::table('sejour')->where('sejour.id_destination', '=', $id_destination)->select('*')->get();
        
        if (Auth::check()) {
            $id_client = Auth::user()->id_client;
            $achat_effectue = Commande::where('code_etat_commande', '=', 2)
                            ->where('id_client', '=', $id_client)
                            ->where('id_sejour', '=', $sejour->id_sejour)
                            ->get();
        } else {
            $achat_effectue = null;
        }

        

        return view("sejour", ["achat_effectue"=>$achat_effectue, "id" => $id, "etapes" => $etapes, 'avisData' => $avisData, 'avis' => $avis, 'elements_etapes' => $elements_etapes, 'sejours_same_destination' => $sejours_same_destination, "sejour" => $sejour, "theme" => Theme::all()]);

    }

    public function sejours_data(){ //returns data about one or more sejour

        $whereQuery = '';
        foreach($_GET['IDs'] as $id)
        {
            $whereQuery .= 'id_sejour = ' . $id . ' OR ';
        }
        // on supprime les 3 derniers caractères 'OR '
        $whereQuery = substr($whereQuery, 0, -3);

        $sejours = DB::table('sejour')
            ->whereRaw($whereQuery)
            ->select('id_sejour', 'titre_sejour', 'photo_sejour')
            ->get();

        return $sejours;
    }

    // page partenaire avec nom, adresse, e-mail, numéro de téléphone
    public function partenaire()
    {
        $id_partenaire = $_GET["id_partenaire"];

        $partenaire = DB::table('partenaire')
        ->join(         'adresse',          'adresse.id_adresse',           '=',    'partenaire.id_adresse')
        ->leftJoin(     'restaurant',       'restaurant.id_partenaire',     '=',    'partenaire.id_partenaire')
        ->leftJoin(     'cave',             'cave.id_partenaire',           '=',    'partenaire.id_partenaire')
        ->leftJoin(     'hotel',            'hotel.id_partenaire',          '=',    'partenaire.id_partenaire')
        ->leftJoin(     'autre_societe',    'autre_societe.id_partenaire',  '=',    'partenaire.id_partenaire')
        ->where(        'partenaire.id_partenaire', $id_partenaire)
        ->select('nom_partenaire', 'mail_partenaire', 'tel_partenaire', 'num_rue_adresse', 'libelle_rue_adresse', 'code_postal_adresse', 'libelle_commune', 'nb_etoile_restaurant', 'type_cuisine', 'specialite_restaurant', 'type_degustation', 'nb_etoile_hotel', 'nb_chambre_hotel', 'type_activite', 'lieu_activite')
        ->get()[0];
        
        return view("partenaire", ["partenaire" => $partenaire]);

    }

    public function route_des_vins(){ //return route des vins view
        return view("route_des_vins", ["route_des_vins" => Route_des_vins::all()]);
    }
    public function panier(){ //return panier view
        return view("panier", ["panier" => Panier::all()]);
    }

    public function mentionsLegales(){ //return Mentions Legales view
        return view("mentionsLegales");
    }

    public function politiqueDeConfidentialite(){ //return politique de confidentialité view
        return view("politiqueDeConfidentialite");
    }

    public function register(){ //return register page
        return view("register");
    }

    public function addClient(Request $request){ //save a new client (on register page) NOT DONE YET
        $clients = Client::all(); // on récurpére la variables qui contient tous les clients
        $request->id_client = count($clients)+1; // on donne le dernier id + 1 de ce dernier tableau de client
        $request->mdp = password_hash($request->mdp, PASSWORD_DEFAULT); // on hash le password avec une fonction de hashage
        $ageCutoff = now()->subYears(18)->toDateString();
        //return ['ageCutoff' => $ageCutoff]; pour retourner une variable dans la vue
        $this->validate($request, [ //on vérifie les champs du formulaire
            'titre' => 'bail|required',
            'prenom' => 'bail|required|max:50',
            'nom' => 'bail|required|max:50',
            'mail_client' => 'bail|required|unique:client',
            'date_naissance' => 'bail|required|before_or_equal:'.$ageCutoff, //concatenation
            'mdp' => 'bail|required|max:500'
        ]);
        $client = new \App\Models\Client; //on créer un nouveau client vierge
        $client->id_client = $request->id_client; //on ajoute les champs et on affecte les valeurs
        $client->titre_client = $request->titre; //--------------------------------------------
        $client->prenom_client = $request->prenom; //--------------------------------------------
        $client->nom_client = $request->nom; //--------------------------------------------
        $client->mail_client = $request->mail_client; //--------------------------------------------
        $client->date_naiss_client = $request->date_naissance; //--------------------------------------------
        $client->mdp_client = $request->mdp; //--------------------------------------------
        $client->save(); // on enregistre le client dans la base.
        return view("connection"); // on retourne la page de connection !
    }

    public function connection(){ //return login page
        return view("connection");
    }

    public function authenticate(Request $request) //authenticate user and redirecting to homepage (from login page)
    {
        
        $credentials = $request->validate([ //fields verification on formular view
            'mail_client' => ['required'],
            'mdp_client' => ['required'],
        ]);

        unset($credentials["mdp_client"]); //transform mdp_client into password for auth laravel
        $credentials["password"] = $request->mdp_client;


        if (Auth::attempt($credentials)) { //server verification identity
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([ //sending errors (bad email or password)
            'email' => 'Mauvais identifiant ou mot de passe.',
        ]);
    }

    public function logout(){ //function logout when clicked redirecting homepage as guest
        Auth::logout();
        return view("connection");
    }

    public function profile(){ //return profile page
        return view("profile", ["client" => Auth::user()],["client_possede_adresse" => Client_Possede_Adresse::all()]);
    }

    public function updateProfile(Request $request){ // commit profile changes and redirect into profile get page
        $id_client = $request->input('id_client');
        $client = Client::find($id_client); // Récupère le client avec l'id spécifié dans la requête
        if (!$client) {
        // Si le client n'existe pas, renvoie une erreur
        return response()->json(['message' => 'Client not found'], 404);
        }
        // Met à jour les champs du client avec les valeurs spécifiées dans la requête
        if($request->titre_client != null){
            $client->titre_client = $request->titre_client;
        }
        if($request->prenom != null){
            $client->prenom_client = $request->prenom;
        }
        if($request->nom != null){
            $client->nom_client = $request->nom;
        }
        if($request->mail_client != null){
            $client->mail_client = $request->mail_client;
        }
        if($request->date_naissance != null){
        $client->date_naiss_client = $request->date_naissance;
        }
        if($request->mdp != null){
        $client->mdp_client = password_hash($request->mdp, PASSWORD_DEFAULT); // Hash le mot de passe avant de le mettre à jour
        }

        $client->save(); // Enregistre les modifications du client

        return view("profile", ["client" => Auth::user()]);
    }

    

    public function adminAide(){// page connection pour aide admin / chef
        return view("adminAide");
    }

    public function useraide(){// page connection pour aide user
        return view("userAide");
    }
    
    public function videPanier(){
        Cart::destroy();
        return view("panier");
    }

    public function adresseFacturation(){
        return view("adresseFacturation",["client" => Auth::user()],["client_possede_adresse" => Client_Possede_Adresse::all()]);
    }

    public function welcomeAdmin(){// page welcome compte admin
        return view("welcomeAdmin",["sejour" => Sejour::orderBy('id_sejour', 'asc')->get(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(), "sejour_to_cat_participant" => Sejour_To_Cat_Participant::all()]);
    }

    public function postAvis(){
        
        $avis = new Avis;
        $avis->id_sejour = $_POST["idSejour"];
        $avis->id_client = Auth::id();
        $avis->date_avis = date("Y-m-d");
        $avis->note_avis = $_POST["noteAvis"];
        $avis->libelle_avis = $_POST["libelleAvis"];
        $avis->texte_avis = $_POST["texteAvis"];

        $avis->save();
        
        /*
        //$libelle_avis = str_replace("'", "''", $libelle_avis);
        //$texte_avis = str_replace("'", "''", $texte_avis);
        DB::table('avis')->insertGetId([
            'id_sejour' => $idsejour,
            'id_client' => $userId,
            'date_avis' => "$date_avis",
            'note_avis' => $note_avis,
            'libelle_avis' => "$libelle_avis",
            'texte_avis' => "$texte_avis"
        ]);*/

        //DB::insert("INSERT INTO avis(id_sejour, id_client, date_avis, note_avis, libelle_avis, texte_avis) VALUES ($idsejour, $userId, '$date_avis', $note_avis, '$libelle_avis', '$texte_avis');");
        //return redirect()->to("/sejour?".$idsejour);
        return redirect()->route('unSejour', [(string)intval($_POST["idSejour"]) - 1]);
    }

    

    public function personnalisationCookie(){
        return view('cookiePerso');
    }
   
    public function unSejourCommercial(){ //return clicked sejour view
        $id = $_SERVER["QUERY_STRING"] - 1;
        $avis = DB::table('avis')
            ->join('sejour', 'sejour.id_sejour', '=', 'avis.id_sejour')
            ->join('client', 'client.id_client', '=', 'avis.id_client')
            ->where('avis.id_sejour', $id + 1)
            ->select('nom_client', 'prenom_client', 'note_avis', 'libelle_avis', 'texte_avis', 'date_avis')
            ->get();

        $avisData = DB::table('avis')
            ->where('avis.id_sejour', $id + 1)
            ->select(DB::raw('ROUND(AVG(CAST(note_avis as numeric)), 2) AS "average_note"'), DB::raw('COUNT(*) AS "count_avis"'))
            ->get();

        return view("sejourCommercial", ["id" => $id, 'avisData' => $avisData, 'avis' => $avis, "sejour" => Sejour::orderBy('id_sejour', 'asc')->get(), "theme" => Theme::all()]);

    }

    public function commandesEnAttente(){
        return view("commandesEnAttente", ["commande" => Commande::where('code_etat_commande', '=', 0)->get()]);
    }

    public function mesCommandes(){
        if(!Auth::check()){
            return redirect("/login");
          }
        $id_client = Auth::user()->id_client;
        $commandes = Commande::where('code_etat_commande', '=', 1)
                            ->where('id_client', '=', $id_client)
                            ->get();
        return view("mesCommandes", ["commande" => $commandes]);
    }
    
    public function historiqueCommandes(){
        $id_client = Auth::user()->id_client;
        $commandes = Commande::where('code_etat_commande', '=', 2)
                            ->where('id_client', '=', $id_client)
                            ->get();
        return view("historiqueCommandes", ["commande" => $commandes]);
    }

    public function selectionDatesCadeau(){
        return view("selectionDatesCadeau");
    }




}
