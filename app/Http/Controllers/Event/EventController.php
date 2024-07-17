<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventCreateRequest;
use App\Http\Requests\Event\EventUpdateRequest;
use App\Http\Resources\Event\EventListResource;
use App\Models\Event;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    use ApiResponses;

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return EventListResource::collection(Event::paginate());
    }

    /**
     * @param Event $event
     *
     * @return EventListResource
     */
    public function show(Event $event): EventListResource
    {
        return new EventListResource($event);
    }

    /**
     * @param Event $event
     *
     * @return JsonResponse
     */
    public function destroy(Event $event): JsonResponse
    {
        $event->delete();

        return $this->sendSuccessResponse([], "Event successfully deleted.");
    }

    public function store(EventCreateRequest $request): EventListResource
    {
        return new EventListResource(Event::create($request->validated()));
    }

    public function update(EventUpdateRequest $request, Event $event): EventListResource
    {
        $event->update($request->validated());

        return new EventListResource($event);
    }
}
