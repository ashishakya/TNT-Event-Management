<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\Event\EventListResource;
use App\Models\Event;
use App\Traits\ApiResponses;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    use ApiResponses;

    public function index(): AnonymousResourceCollection
    {
        return EventListResource::collection(Event::paginate());
    }

    public function show(Event $event): EventListResource
    {
        return new EventListResource($event);
    }
}
