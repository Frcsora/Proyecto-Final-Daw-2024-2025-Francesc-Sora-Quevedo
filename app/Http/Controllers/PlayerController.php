<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\TwitterHelper;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Player;
use App\Models\PlayersMedias;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Teams;
use App\Models\TeamsMedias;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(UserValidator::validateAdmin()){
            if(session()->has('teams')){
                $teams = session()->get('teams');
            }else{
                $teams = Teams::all();
                session()->put('teams', $teams);
            }
            if(session()->has('image')){
                $image = session()->get('image');
            }else{
                $image = Images::where('type', 'logo')
                    ->where('active', 'true')->first();
                session()->put('image', $image);
            }
            if(session()->has('socialmedia')){
                $socialmedias = session()->get('socialmedia');
            }else{
                $socialmedias = Socialmedia::with('medias')->get();
                $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
                session()->put('socialmedias', $socialmedias);
            }
            if(session()->has('imageFondo')){
                $imageFondo = session()->get('imageFondo');
            }else{
                $imageFondo = Images::where('type', 'fondo')
                    ->where('active', 'true')->first();
            }
            return view('players.create', ['teams'=>$teams, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255|nullable',
            'created_by' => 'required|int|exists:users,id',
            'surname1' => 'string|max:255|nullable',
            'surname2' => 'string|max:255|nullable',
            'nickname' => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
            'imagen' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $name = $request->name;
        $surname1 = $request->surname1;
        $surname2 = $request->surname2;
        $nickname = $request->nickname;
        $team_id = $request->team_id;
        $image = $request->image == null ? "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOYAAADmBAMAAAAzROSIAAAAJFBMVEXb29v5+fn9/f319fXx8fHz8/P////u7u7s7Ozj4+Pn5+ff399v5H3nAAAEsklEQVR42u3WO2/TUBjG8UcKCDueTLgzwScgChGXLqlwVQoLiEYCsTEwgygibEYUJWkXI0CNOgUBamCyBIjLp+NSiNWQnPdxeM8JF/86V3899vFpcdO9ojlUNKeE4+7hhnvFzqFiZ7Gz2Pk/7TwuKppFs2gWTatwzD3sde7ATHYecK7YmSl2FjuLncJ9a0uxc+jf2DntL+4Pne88nQLYvBM6a4ZXE2zzH4ZumqcTZD7P565OcW7PYKde9Vg+CPM6i1FBp1cNc8jdPIRx/Pkwo93cl2J8NFuq3owxwe4wo9u8jokuhxnN5kFMVgpDK82+oemHoY3mWZjM22hWUpg8sdGcg1FQVWxmMwUP1JtHIXmu3uxDElxWbh6CzFNuNkB4rtqsgOGpNg+DcluzGYNSUmxWwPEVm0dAmtdrngDpsV6zD9JutWYFrLJa8whoRLNKuQTauaoEFUoM2sOKhNyZgvaE2BkSP/vAKxE7axXZ4TxNeWc1rMrmwNtVEx4a+T4b+ZoCfJ0Zij8xeF7VXAzJnUmepryzwkCupvA6uZ116O1km6f/k+YZ5LBnBs1d/0mzVHHffKvW1Pz7qd98WHH/fd6Rd6o3a/LOGuEUeH5NRDXr4HlcU5aCVtJqJqC90GrGoJ3TajbACmpazTmwPLUm/4HuVmvW+duWbcr421ateQ2smlbzZApSoNY8A/fPtgHaW63mLdBKf3PzEtx/n3MKZ8jiuT2n1Tyt8GfF3v8Jnl6zD9IexeafvLNMNZuMhG42CagzcjTrsn9gp6e3s0E39XZeA2m33s6TID27oraz2Qfnkd7OOvtCm3W1nVeusp+K4s5mCsb7K9T7bHLWIQs2F5oMNEld4tA2m7pN4um+Um8mM2j2iY/TffPuDJpN981gBk1/Bs2yfjOGwKObEasBwZ6IhGXWEgS7omUOv/MqBO8W1HdGEDzV37mcwGxVf+dCLDUt7LwIs2hZf+cFGAWRhZ2LwjVkY+cCjDwbO6PEfCUsWPg+l/vC56m9U75xVyNWnqb54K5YaS4Kn4qNZhSbj62VpukmehlFVppLwqO10bxluoUyqmcodf9sl2DgR1aaiXAPWWguwahsobmYwmxVvyn/T003F0lLEK2ucNid51OIPOWdCQgbkeJOJslfDGBXklGtnXwS2NLZeT5BDr1IYWeW5Gz8/s4LKZA3+ps774PF3/a4Z9TFNLbuGWHFpIvpDO4tGhh3rmNawadBJ//O1usUv8nfbK+MM2nna6jYbNM7WwmU+FvkzlYKPVvUziypEyV2thLoass7+1Dmt6Wd61DnCTtbsGDDvLMPC4Idr3S0eR9WfDQ1E2RsnV0IM20cIwgzbQyFMNPGG4WjmQgmNFuwaGN8M4ZF5fHNFDa1xzXvw6oPw2YnE8Oq8s8OWpkEdnV+dJDNXINlvZ8720PrsMzr/LKzD8v8X99nCtt+3QnreqPvswvrvNGdMawrj77PPqwLOiM7U9g3uhMODL4PhXQLWTi4w2YXDng7m+twoLyzGcMBP2sKt621ZgIHghk0sd00XglFc0qDHU2M8y81B9vgRO9bDmvCFa/cXPu+c3voGzjR+5bD2vbQLpz4OPj6Rr8A7R20sqxo2BoAAAAASUVORK5CYII="
            : $request->image;
        $created_by = $request->created_by;
        Player::create(['created_by'=>$created_by,'name' => $name,'surname1' => $surname1, 'surname2' => $surname2,'nickname' => $nickname, 'image' => $image, 'team_id' => $team_id]);
        return redirect()->route('teams.show', $team_id)->with('status', 'Jugador creado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(session()->has('teams')){
            $teams = session()->get('teams');
        }else{
            $teams = Teams::all();
            session()->put('teams', $teams);
        }
        if(session()->has('image')){
            $image = session()->get('image');
        }else{
            $image = Images::where('type', 'logo')
                ->where('active', 'true')->first();
            session()->put('image', $image);
        }
        if(session()->has('socialmedia')){
            $socialmedias = session()->get('socialmedia');
        }else{
            $socialmedias = Socialmedia::with('medias')->get();
            $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
            session()->put('socialmedias', $socialmedias);
        }
        if(session()->has('imageFondo')){
            $imageFondo = session()->get('imageFondo');
        }else{
            $imageFondo = Images::where('type', 'fondo')
                ->where('active', 'true')->first();
        }
        if(session()->has('sponsors')){
            $sponsors = session()->get('sponsors');
        }else{
            $sponsors = Sponsor::orderBy('tier', 'desc')->get();
            session()->put('sponsors', $sponsors);
        }
        $player = Player::findOrFail($id);
        $medias = PlayersMedias::where('player_id', $id)->with('medias')->get();
        $medias = SanitizeSVG::sanitizeSVG($medias);
        $tweets = TwitterHelper::getTweets();

        return view('players.show', ['teams' => $teams,'sponsors'=>$sponsors, 'tweets'=>$tweets,'image' => $image->base64, 'imageFondo' =>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'player'=>$player, 'medias'=>$medias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(UserValidator::validateAdmin()){
            if(session()->has('teams')){
                $teams = session()->get('teams');
            }else{
                $teams = Teams::all();
                session()->put('teams', $teams);
            }
            if(session()->has('image')){
                $image = session()->get('image');
            }else{
                $image = Images::where('type', 'logo')
                    ->where('active', 'true')->first();
                session()->put('image', $image);
            }
            if(session()->has('socialmedia')){
                $socialmedias = session()->get('socialmedia');
            }else{
                $socialmedias = Socialmedia::with('medias')->get();
                $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
                session()->put('socialmedias', $socialmedias);
            }
            if(session()->has('imageFondo')){
                $imageFondo = session()->get('imageFondo');
            }else{
                $imageFondo = Images::where('type', 'fondo')
                    ->where('active', 'true')->first();
            }
            $player = Player::findOrFail($id);
            return view('players.edit', ['player' => $player, 'teams' => $teams, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'created_by' => 'required|int|exists:users,id',
            'surname1' => 'string|max:255',
            'surname2' => 'string|max:255|nullable',
            'nickname' => 'required|string|max:255',
            'team_id' => 'required|int|exists:teams,id',
            'imagen' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $name = $request->name;
        $created_by = $request->created_by;
        $surname1 = $request->surname1;
        $surname2 = $request->surname2;
        $nickname = $request->nickname;
        $team_id = $request->team;
        $image = $request->image;
        Player::findOrFail($id)->update(['created_by' => $created_by,'name' => $name,'surname1' => $surname1, 'surname2' => $surname2,'nickname' => $nickname, 'image' => $image, 'team_id' => $team_id]);
        return redirect()->route('players.show', $id)->with('status', 'Jugador actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team_id = Player::findOrFail($id)->team_id;
        Player::findOrFail($id)->delete();
        return redirect()->route('teams.show', $team_id)->with('status', 'Jugador eliminado');
    }
}
