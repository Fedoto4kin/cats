<?php

namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

//TODO: Add auth check
class CatsController extends Controller
{
    protected $cat;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Generator $faker)
    {
        $strayCats = collect();
        foreach (range(0,8) as $i) {

            $strayCats[$i] = new Cat(
                [
                    'uuid' => $faker->uuid,
                    'name' => $faker->firstName(),
                    'pic_id' => rand(1, 9)
                ]
            );
        }

        return response($strayCats->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Generator $faker
     * @param Gat $cat
     * @return void
     */
    public function create(Generator $faker, Cat $cat)
    {
        $cat->uuid = $faker->uuid;
        $cat->name = $faker->firstName();
        $cat->pic_id = rand(1, 9);
        $cat->save();

        return response($cat->jsonSerialize(), Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Cat::findOrFail($id);
        $cat->name = $request->name;
        $cat->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cat::findOrFail($id);
        Cat::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
