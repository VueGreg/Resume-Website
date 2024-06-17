<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\skill;
use App\Models\project;
use App\Models\experience;
use Illuminate\Http\Request;
use App\Http\Resources\SkillResource;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\InformationResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\TechnologyResource;
use App\Http\Resources\TypeModelResource;
use App\Models\Category;
use App\Models\information;
use App\Models\technology;
use App\Models\TypeModel;

class ResumeController extends Controller
{
    public function index()
    {
        $experiences = Experience::with(['projects' => function ($query) {
            $query->orderBy('created_date', 'desc');
        }, 'business', 'projects.skills', 'projects.technologies'])->get();
        $experiences = ExperienceResource::collection($experiences);

        $skillsCount = Skill::withCount('projects')->get();
        $skillsCount = SkillResource::collection($skillsCount);

        $projects = project::with(['experience', 'skills', 'types', 'technologies'])
            ->orderByDesc('created_date')
            ->get();
        $projects = ProjectResource::collection($projects);

        $countProject = project::count();
        $countSkills = Skill::count();

        $technologiesCount = technology::with('categories')->withCount('projects')->get();
        $technologiesCount = TechnologyResource::collection($technologiesCount);

        $categories = CategoryResource::collection(Category::all());

        $types = TypeModelResource::collection(TypeModel::all());

        $informations = InformationResource::collection(information::all());

        return Response::json(array(
            'experiences' => $experiences,
            'skills' => $skillsCount,
            'countProjects' => $countProject,
            'countSkills' => $countSkills,
            'technologies' => $technologiesCount,
            'categories' => $categories,
            'types' => $types,
            'informations' => $informations,
            'projects' => $projects
        ));
    }
}
