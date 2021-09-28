<?php

namespace App\Http\Controllers\API;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Films;
use App\Http\Resources\Films as FilmResource;

class FilmsController extends BaseController
{
    /**
     * @return Application|ResponseFactory|Response
     */
    public function index() : Response
    {
        $films = Films::all();
        return response([ 'films' => FilmResource::collection($films), 'message' => 'Filmes encontrados.'], 200);
    }


    /**
     * @param Request $request
     * @return Application|Response|ResponseFactory
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required|max:144',
            'synopsis' => 'required',
            'director' => 'required',
            'release_date' => 'required|date',
            'country' => 'required'
        ]);
        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação.'],400);
        }

        $film = Films::create($input);
        return response(['films' => new FilmResource($film), 'message' => 'Filme registrado com sucesso.'], 201);
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $film = Films::find($id);
        if (is_null($film)) {
            return $this->sendError('Filme não encontrado');
        }
        return $this->sendResponse(new FilmResource($film), 'Filme encontrado.',);
    }


    /**
     * @param Request $request
     * @param Films $film
     * @return JsonResponse
     */
    public function update(Request $request, Films $film): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|max:144',
            'synopsis' => 'required',
            'director' => 'required',
            'release_date' => 'required|date',
            'country' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $film->title = $input['title'];
        $film->synopsis = $input['synopsis'];
        $film->director = $input['director'];
        $film->release_date = $input['release_date'];
        $film->country = $input['country'];
        $film->save();

        return $this->sendResponse(new FilmResource($film), 'Filme atualizado.');
    }

    /**
     * @param Films $film
     * @return JsonResponse
     */
    public function destroy(Films $film): JsonResponse
    {
        $film->delete();
        return $this->sendResponse([], 'Filme deletado.');
    }
}
