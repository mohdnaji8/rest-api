<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\SkillCollection;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\v1\SkillResource;

class SkillController extends Controller
{
    public function index()
    {
        //$skills =Skill::paginate(2);
        $skills =Skill::all();
        return SkillResource::collection($skills);
        //return new SkillCollection($skills);
    }
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }
    public function store(StoreSkillRequest $request)
    {
        Skill::create($request->validated() );
        return response()->json("Skill created");
    }
    public function update(StoreSkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return response()->json("Skill updated");
    }
    public function destroy( Skill $skill)
    {
        $skill->delete();
        return response()->json("Skill deleted");
    }
}
